<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartDetail;
use App\Currency;
use App\PaymentPlatform;
use App\Resolvers\PaymentPlatformResolver;
use App\Services\PayPalService;
use App\Services\WebPayService;
use App\User;
use Carbon\Carbon;
use App\Product;
use App\WebPay;
use Illuminate\Http\Request;
use PSTPagoFacil\SignatureHelper;
use Illuminate\Support\Facades\Log;


class PaymentController extends Controller
{

    public $user;
    public $cart;

    protected $paymentPlatformResolver;

    public function __construct(PaymentPlatformResolver $paymentPlatformResolver, User $user,Cart $cart)
    {
        $this->user = $user;
        $this->cart = $cart;
        $this->middleware('auth');

        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }

    private function getTotalPrice($cart_products) {
        $total_price = 0;
        foreach($cart_products as $item) {
            $product = Product::find($item->product_id);
            $total = $product->price * $item->quantity;
            $total_price += $total;
        }
        
        return $total_price;
    }

    public function index()
    {
        $currencies = Currency::all();
        $payments = PaymentPlatform::Where('name', 'Webpay')->get();
        $products_id = auth()->user()->cart->details;
        
        $total = $this->getTotalPrice($products_id);
        $iva = $total * 0.19;
        $totalIva = $total + $iva;
        
        //dd($total, $totalIva);
        return view('payments')->with([
            'totalProducts' => round($total), 
            'totalIva' => round($totalIva),
            'iva'=> round($iva),
            'currencies' => $currencies,
            'payments' => $payments,
        ]);
    }


    public function pay(Request $request)
    {
        $rules = [
            'value' => ['required', 'numeric', 'min:5'],
            'currency' => ['required', 'exists:currencies,iso'],
            'payment_platform' => ['required', 'exists:payment_platforms,id'],
        ];
        $mensaje = [
            'value.required' => 'El valor es requerido',
            'value.numeric' => 'El valor debe ser numerico',
            'value.min' => 'El valor debe ser minimo de 5',

            'currency.required' => 'la moneda es requerida',
            'currency.exists' => 'La moneda debe existir',

            'payment_platform.required' => 'Es necesario una plataforma de pago',
            'payment_platform.exists' =>'la plataforma de pago debe existir..',
        ];

        $request->validate($rules,$mensaje);

        $paymentPlatform = $this->paymentPlatformResolver
            ->resolveService($request->payment_platform);

        session()->put('paymentPlatformId', $request->payment_platform);

        return $paymentPlatform->handlePayment($request);
        
    }

    public function approval()
    {

        if (session()->has('paymentPlatformId')) {
            $paymentPlatform = $this->paymentPlatformResolver
                ->resolveService(session()->get('paymentPlatformId'));

            return $paymentPlatform->handleApproval();
        }

        return redirect()
            ->route('perfil')
            ->withErrors('No hemos recibido la plataforma de pago , favor intentalo de nuevo mas tarde.');
    }

    public function cancelled()
    {
        return redirect()
            ->route('perfil')
            ->withErrors('Haz cancelado el pago.');
    }

    public function callbackWebpay(Request $request) {
        $paymentPlatform = $this->paymentPlatformResolver
            ->resolveService(1);
        
        return $paymentPlatform->handleApproval($request);
    }
}


