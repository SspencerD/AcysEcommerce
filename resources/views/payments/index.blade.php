@extends('layouts.app')


@section('title','Producto |' .config('app.name'))


@section('content')
@include('includes.menu')
@include('includes.flash-messages')

<div class="section">
    <!-- container -->
    <div class="container">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- row -->
        <!-- Order Details -->
        <div class="col-md-5 order-details">
            <div class="section-title text-center">
                <h3 class="title">TU PEDIDO</h3>
            </div>
            <div class="order-summary">
                <div class="order-col">
                    <div><strong>PRODUCTO</strong></div>
                    <div><strong>TOTAL</strong></div>
                </div>
                <div class="order-products">
                    {{-- AQUI VA EL FOREACH --}}
                    <div class="order-col">
                        <div>1x Product Name Goes Here</div>
                        <div>
                        <form action="{{route('payments.store')}}" method="post" id="paymentForm">
                                @csrf
                                <input type="number" name="value" value="{{ mt_rand(800,120000) /200 }}" min="100"
                                    step="10,10" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Order Details -->

            {{-- <div class="order-col">
                        <div>ENVIO</div>
                        <div><strong>GRATIS</strong></div>
                    </div> --}}
            <div class="order-col">
                <div><strong>TOTAL</strong></div>
                <div><strong class="order-total">$2940.00</strong></div>
            </div>
            <div class="col-auto">
                <select name="currency" id="currency" class=" btn btn-sm btn-warning" required>
                    <option value="0" selected> Selecciónar divisa</option>
                    @foreach($currencies as $currency)
                    <option value="{{ $currency->iso }}"> {{$currency->iso }}</option>
                    @endforeach
                </select>
            </div>
            <small><b>Seleccione el metodo de pago </b></small>
            <br><br><br>
            <div class="col-md-auto">
                <div class="form-group" id="toggler">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        @foreach($payments as $payment)
                        <label class="btn btn-outline-secondary" data-target="#{{ $payment->name}}Collapse"
                            data-toggle="collapse">
                            <input type="radio" name="payment_platforms" id="option1" value="{{$payment->id }}"
                                required>
                            <img class="img-thumbnail" src="{{$payment->image}}" height="50">
                        </label>
                        @endforeach
                    </div>

                    @foreach($payments as $payment)
                    <div id="{{ $payment->name}}Collapse" class="collapse" data-parent="#toggler">
                        @includeIf('components.'.strtolower($payment->name).'-collapse')
                    </div>
                    @endforeach
                </div>
                <div class="input-checkbox">
                    <input type="checkbox" id="terms">
                    <label for="terms">
                        <span></span>
                        He leido y acepto los <a href="#">terminos y condiciones</a>
                    </label>
                </div>
            </div>
            <button type="submit" class="primary-btn order-submit">Pagar</button>
        </div>
        </form>
    </div> <!-- /row -->
</div>
<!-- /container -->
@endsection