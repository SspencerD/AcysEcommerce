@extends('layouts.app')


@section('title','Tu Orden |' .config('app.name'))


@section('content')
@include('includes.menu')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        @if($errors->any() )
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h1>Esta es tu compra de la orden de compra{{ $order->id }}</h1>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imagen</th>
                <th scope="col">Fecha Orden</th>
                <th scope="col">Usuario</th>
                <th scope="col">Orden</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Monto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart_details as $cartdetail)
            <tr>
                <th scope="row">{{ $cartdetail->product->id }}</th>
                <td><img src="{{ $cartdetail->product->featured_image_url }}" alt="imagen no disponible" width="100"</td>
                <td>{{ $cartdetail->created_at->format('d/m/y h:m:s') }}</td>
                <td>{{ Auth::user()->name }}</td>
                <td>{{ $cartdetail->cart->order_id }}</td>
                <td>{{ $cartdetail->product->name }}</td>
                <td>{{ $cartdetail->quantity }}</td>
                <td>${{ number_format($cartdetail->product->price * $cartdetail->quantity, 2) }}</td> 
            </tr>
            @endforeach
        </tbody>
    </table>
    <span>Total de tu compra </span> <p>${{number_format($order->amount,2) }}</p>
    </div>
</div>


@endsection