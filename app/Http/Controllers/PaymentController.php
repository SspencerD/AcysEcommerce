<?php

namespace App\Http\Controllers;

use App\Currency;
use App\PaymentPlatform;
use App\Resolvers\PaymentPlatformResolver;
use App\Services\PayPalService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    protected $paymentPlatformResolver;

    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        $this->middleware('auth');

        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }
    
    public function index()
    {
        $currencies = Currency::all();
        $payments = PaymentPlatform::all();

        return view('payments')->with([
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

    
}
