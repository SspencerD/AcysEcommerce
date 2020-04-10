<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\User;
use App\Order;
use Session;
use PSTPagoFacil\SignatureHelper;


class WebPayService
{
    private function createSignature($data, $secretKey) {
        $keys = array_keys($data);
        sort($keys);

        $toSign = "";
        foreach($keys as $key) {
            $toSign .= $key . $data[$key];
        };
        
        $signature = hash_hmac('sha256', $toSign , $secretKey);
        return $signature;
    }

    public function handlePayment($request) {
        $apiKey = env('WEBPAY_FLOW_PUBLIC');
        $secretKey = env('WEBPAY_FLOW_SECRET');
        $base_uri = "https://sandbox.flow.cl/api";
        $urlReturn = \URL::route('callback.webpay');
        $urlConfirmation = \URL::route('callback.webpay');
        
        $client = new \GuzzleHttp\Client([
            'headers' => [ 'Content-Type' => 'application/x-www-form-urlencoded' ]
        ]);

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->amount = $request->value;
        $order->status = 'pending';
        $order->payment_platform_id = 5;
        $order->save();

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
        
        $apiRequest = $client->post($base_uri.'/payment/create', [
            'form_params' => $data
        ]);
        
        $response = json_decode($apiRequest->getBody());
        
        $order->id_payment_merchant = $response->flowOrder;
        $order->token_webpay = $response->token;
        $order->save();

        $build_url = $response->url.'?token='.$response->token;
        
        return redirect()->away($build_url);
    }

    public function handleApproval($request) {
        $apiKey = env('WEBPAY_FLOW_PUBLIC');
        $secretKey = env('WEBPAY_FLOW_SECRET');
        $url = "https://sandbox.flow.cl/api";

        $data = array(
            "apiKey" => $apiKey,
            "token" => $request->token
        );
        
        $data["s"] = $this->createSignature($data, $secretKey);
        $client = new \GuzzleHttp\Client();
        $apiRequest = $client->get($url.'/payment/getStatus?apiKey='.$apiKey.'&token='.$data["token"]."&s=".$data["s"]);
        $response = json_decode($apiRequest->getBody());

        $order = Order::where('token_webpay', $request->token)->first();
        
        if($response->status == 1) {
            $order->status = 'pending';
        } else if($response->status == 2) {
            $order->status = 'completed';
        } else if($response->status == 3 || $response->status == 4) {
            $order->status = 'cancelled';
        }

        $order->save();

        return redirect()->route('perfil');
    }

}
