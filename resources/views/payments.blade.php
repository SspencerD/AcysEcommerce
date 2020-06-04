@extends('layouts.pay')

@section('title','Iniciar pago |' .config('app.name'))

@section('content')

@include('includes.flash-messages')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Completar Compra</strong></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col"></th>
                            <th scope="col" style="width: 23%">Nombre</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->cart->details as $detail )
                                <tr>
                                    <th scope="row"><img src="{{$detail->product->featured_image_url }}" alt="" height="90"></th>
                                    <td><h6>{{ $detail->product->name }}</h6></td>
                                    <td class="text-center"><h6>{{ $detail->quantity }}</h6></td>
                                    <td><h6>$ {{ number_format($detail->quantity * $detail->product->price,2)}}</h6></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                      
                    <hr>
                    @if(auth()->user()->cart)
                        <form action="{{ route('pay') }}" method="POST" id="paymentForm">
                            @csrf
                            <div class="row">
                                <div class="col-sm">
                                    <h5>Subtotal</h5>
                                    <h5>IVA</h5>
                                    <br>
                                    <h5>Total a pagar</h5>
                                </div>
                                <div class="col-sm offset-sm-5">
                                    <h6 class="mt-2">$ {{ number_format($totalProducts,2) }}</h6>
                                    <h6 class="mt-2">$ {{ number_format($iva,2) }}</h6>
                                    <br>
                                    <h6 class="mt-2">$ {{ number_format($totalIva,2) }}</p></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <input type="hidden" name="value" value="{{ $totalIva }}">
                                    <input type="hidden" name="currency" value="CLP">
                                    {{-- <small class="form-text text-muted">
                                        Recuerde que cada plataforma tiene su forma de pago.
                                    </small> --}}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Seleccione plataforma de pago</label>
                                    <div class="form-group" id="toggler">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            @foreach ($payments as $payment)
                                            <label class="btn btn-outline-primary rounded m-2 p-1"
                                                data-target="#{{ $payment->name }}Collapse" data-toggle="collapse">
                                                <input type="radio" name="payment_platform"
                                                    value="{{ $payment->id }}" required>
                                                <img class="img-thumbnail" src="{{ asset($payment->image) }}">
                                            </label>
                                            @endforeach
                                        </div>
                                        @foreach ($payments as $payment)
                                        <div id="{{ $payment->name }}Collapse" class="collapse"
                                            data-parent="#toggler">
                                            @includeIf('components.' . strtolower($payment->name) . '-collapse')
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" id="payButton" class="btn btn-primary btn-lg">Pagar</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
