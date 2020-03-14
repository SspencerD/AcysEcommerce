<?php

namespace App\Http\Controllers;

use App\Currency;
use App\PaymentPlatform;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:roles:payments.index')->only('index');
        $this->middleware('can:roles:payments.store')->only('store');
    }

    public  function index()
    {
        $currencies = Currency::all();
        $payments = PaymentPlatform::all();
        return view('payments.index', compact('currencies', 'payments'));
    }
    public function store(Request $request)
    {
        $rules = [
            'value' => ['required', 'numeric', 'min:500'],
            'currency' => ['required ', 'exists:currencies,iso'],
            'payment_platforms' => ['required', 'exists:payment_platforms,id'],
        ];

        $messages = [
            'value.required' => 'Se requiere un valor minimo de 100',
            'value.numeric' =>'El valor debe ser numerico',
            'value.min' =>'el valor debe ser minimo de 500',
            'currency.required' => 'debe obligadamente seleccionar una divisa',
            'currency.exist' =>'debe seleccionar una divisa',
            'payment_platform.required' => 'debe seleccionar un tipo de pago',
            'payment_platform.exist' =>'debe seleccionar una plataforma de pago',
        ];

        $request->validate($rules, $messages);

        return $request->all();
    }
    public function aprroval()
    {
    }
    public function cancelled()
    {
    }
}
