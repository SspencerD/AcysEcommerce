<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\User;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Mail;
use PSTPagoFacil\SignatureHelper;
use App\Cart;
use App\Mail\NewOrder;

class WebPayService
{
    private function createSignature($data, $secretKey)
    {
        $keys = array_keys($data);
        sort($keys);

        $toSign = "";
        foreach ($keys as $key) {
            $toSign .= $key . $data[$key];
        };

        $signature = hash_hmac('sha256', $toSign, $secretKey);
        return $signature;
    }

    public function handlePayment($request)
    {
        $apiKey = env('WEBPAY_FLOW_PUBLIC');
        $secretKey = env('WEBPAY_FLOW_SECRET');
        $base_uri = "https://sandbox.flow.cl/api";
        $urlReturn = \URL::route('callback.webpay');
        $urlConfirmation = \URL::route('callback.webpay');

        $client = new \GuzzleHttp\Client([
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded']
        ]);

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->amount = $request->value;
        $order->status = 'pending';
        $order->payment_platform_id = 1;
        $order->cart_id = auth()->user()->cart->id;
        $order->save();

        $cart = Cart::where("id", Auth::user()->cart->id)->first();
        $cart->order_id = $order->id;
        $cart->save();



        $data = array(
            "apiKey" => $apiKey,
            "commerceOrder" => $order->id,
            "subject" => "Pago de prueba",
            "currency" => strtoupper($request->currency),
            "amount" => $request->value,
            "email" => Auth::user()->email,
            "paymentMethod" => 1,
            "urlConfirmation" => $urlConfirmation,
            "urlReturn" => $urlReturn,
        );


        $data["s"] = $this->createSignature($data, $secretKey);
        $apiRequest = $client->post($base_uri . '/payment/create', [
            'form_params' => $data
        ]);

        $response = json_decode($apiRequest->getBody());

        $order->id_payment_merchant = $response->flowOrder;
        $order->token_webpay = $response->token;
        $order->save();

        $build_url = $response->url . '?token=' . $response->token;

        return redirect()->away($build_url);
    }

    public function handleApproval($request)
    {
        $apiKey = env('WEBPAY_FLOW_PUBLIC');
        $secretKey = env('WEBPAY_FLOW_SECRET');
        $url = "https://sandbox.flow.cl/api";

        $data = array(
            "apiKey" => $apiKey,
            "token" => $request->token
        );

        $data["s"] = $this->createSignature($data, $secretKey);
        $client = new \GuzzleHttp\Client();
        $apiRequest = $client->get($url . '/payment/getStatus?apiKey=' . $apiKey . '&token=' . $data["token"] . "&s=" . $data["s"]);
        $response = json_decode($apiRequest->getBody());

        $order = Order::where('token_webpay', $request->token)->first();

        if ($response->status == 1) {
            $order->status = 'pending';
            $user = auth()->user();
            $cart = $user->cart;
            $cart->order_date = Carbon::now();
            $cart->save();
        } else if ($response->status == 2) {
            $order->status = 'completed';
            //Cambiamos el estado del carro de compras
            $this->productStock();
            $user = auth()->user();
            $cart = $user->cart;
            $cart->status = 'paid';
            $cart->order_date = Carbon::now();
            $cart->save();
        } else if ($response->status == 3 || $response->status == 4) {
            $order->status = 'cancelled';

            //Cambiamos el estado del carro de compras
            $user = auth()->user();
            $cart = $user->cart;
            $cart->status = 'pending';
            $cart->order_date = Carbon::now();
            $cart->save();
        }

        $order->save();

        $message = null;
        $type = null;

        if ($order->stauts == 'pending') {
            $message = 'Tu orden sigue en estado de pendiente,
                por lo que entedemos que has abandonado el proceso
                de pago o el pago aún está en proceso para ser completado.';

            $type = 'info';
        } else if ($order->status == 'cancelled') {
            $message = 'Tu orden ha sido cancelada. El pago no se efectuó';
            $type = 'warning';
        } else if ($order->status == 'completed') {
            $message = 'Tu orden ha sido completada con éxito.';
            $type = 'success';

            $cart_paid = Cart::where('user_id', Auth::user()->id)->where('status', 'paid')->latest()->first();

            Mail::to(Auth::user()->email)->send(new NewOrder(Auth::user(), $cart_paid));
        }
         
        return redirect()->route('perfil')->with($type, $message);
    }


    private function productStock()
    {
        if (auth()->user()->cart) {
            foreach (auth()->user()->cart->details as $detail) {
                $product = Product::find($detail->product_id);
                $product->stock -= $detail->quantity;
                $product->save();
            }
        }

        return;
    }
}
