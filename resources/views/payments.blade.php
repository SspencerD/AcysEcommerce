@extends('layouts.pay')

@section('title','Iniciar pago |' .config('app.name'))

@section('content')

@include('includes.flash-messages')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Make a payment</div>

                <div class="card-body">
                    <div class="form-group">
                        {{-- <table>
                            <thead>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </thead>
                            <tbody>
                                @forelse($cart->details as $detail)
                                <tr>
                                <td>{{$detail->product->name}}</td>
                                <td>{{$detail->quantity}}</td>
                                <td>{{$detail->product->price}}</td>
                                </tr>

                            </tbody>
                            <th>Total</th>
                            <tr>
                                <td>
                                    <p><strong>Total de la compra:</strong>{{ auth()->user()->cart->total }}</p>
                                </td>
                            </tr>
                            @empty
                            <p> No tienes detalles en tu carrito</p>

                            @endforelse
                        </table> --}}
                    </div>
                <form action="{{ route('pay') }}" method="POST" id="paymentForm">
                        @csrf

                        <div class="row">
                            <div class="col-auto">
                                <label>el valor total a pagar es</label>
                                <input type="number" min="5" step="0.01" class="form-control" name="value"
                                    value="{{ mt_rand(500, 100000) / 100 }}" required>
                                <small class="form-text text-muted">
                                   Recuerde que cada plataforma tiene su forma de pago.
                                </small>
                            </div>
                            <div class="col-auto">
                                <label>Currency</label>
                                <select class="custom-select" name="currency" required>
                                    @foreach ($currencies as $currency)
                                    <option value="{{ $currency->iso }}">
                                        {{ strtoupper($currency->iso) }}
                                    </option>
                                    @endforeach
                                </select>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
