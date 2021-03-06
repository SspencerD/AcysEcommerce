@extends('layouts.app')


@section('title','Mi Perfil |' .config('app.name'))


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

        @if (session()->has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session()->get('success') }}</li>
            </ul>
        </div>
        @endif
        @if (session()->has('info'))
        <div class="alert alert-info">
            <ul>
                <li>{{ session()->get('info') }}</li>
            </ul>
        </div>
        @endif
        @if (session()->has('warning'))
        <div class="alert alert-warning">
            <ul>
                <li>{{ session()->get('warning') }}</li>
            </ul>
        </div>
        @endif
        <div class="row">

            <h1>Resumen de Tu cuenta</h1>
            <br><br>
            <hr>
            <br>
            <b>
                <p>Hola {{ auth()->user()->name }} {{ auth()->user()->lastname }} </p>
            </b>

            <p>Aquí tienes el resumen de tu cuenta. Puedes cambiar tu información personal y gestionar las opciones
                disponibles para tu
                cuenta</p>


            <div class="panel panel-default">
                <div class="panel-heading"><b>Información personal</b> </div>
                <div class="panel-body">
                    <table style="border: 1px">
                        <tbody>
                            <tr>
                                <th>Nombre:</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ auth()->user()->name}}
                                    {{ auth()->user()->lastname}}</td>
                            </tr>
                            <tr>
                                <th>RUT:</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ auth()->user()->rut}}</td>
                            </tr>
                            <tr>
                                <th>Dirección:</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ auth()->user()->address}}</td>
                            </tr>
                            <tr>
                                <th>Ciudad:</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ auth()->user()->rut}}</td>
                            </tr>
                            <tr>
                                <th>Correo:</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ auth()->user()->email}}</td>
                            </tr>
                        </tbody>

                    </table>
                    <tr></tr>

                    <tr><a class=" btn btn-circle btn-group-lg btn-info "
                            href="{{ route('edit-user',auth()->user()->id) }}">Editar</a></tr>
                </div>
            </div>

            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#carrito" data-toggle="tab">Tu Carrito</a>
                </li>
                <li>
                    <a href="#pedido" data-toggle="tab">Tus pedidos</a>
                </li>
            </ul>
            <div class="tab-content clearfix">
                <div class="tab-pane " id="carrito">
                    <h5>Tu carrito</h5>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">imagen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Sub Total</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse (auth()->user()->cart->details as $detail )
                            <tr>
                                <th scope="row"><img src="{{$detail->product->featured_image_url }}" alt="" height="50">
                                </th>
                                <td><a
                                        href="{{ route('products.show',$detail->product->id) }}"></a>{{$detail->product->name}}
                                </td>
                                <td>{{$detail->quantity}}</td>
                                <td>$ <b>{{number_format($detail->product->price,2)}}</b></td>
                                <td><b>{{ number_format($detail->quantity*$detail->product->price,2) }}</b></td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <a href="{{ route('products.show', $detail->product->id) }}"
                                                class="dropdown-item btn btn-primary" type="button"><i
                                                    class="far fa-eye"></i>
                                                Ver</a>

                                            <form action=" {{url('/cart')}}" method="post">
                                                <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                                @csrf @method('DELETE')

                                                <button class="dropdown-item btn btn-danger" type="submit"><i
                                                        class="fas fa-trash"></i>
                                                    Borrar</button>
                                            </form>

                                        </div>
                                </td>
                            </tr>
                        </tbody>
                        @empty
                        <span> Aun no tienes productos agregado a tu carrito</span>

                        @endforelse
                    </table>
                    <p><strong>Total de la compra:</strong>{{ auth()->user()->cart->total }}</p>

                    <a href="{{ route('payments') }}" class="btn btn-warning btn-lg btn-rnd text-center"><i
                        class="fas fa-cart-arrow-down"></i> Realizar compra</a>
                </div>
                <div class="tab-pane active" id="pedido">
                    <div class="row">
                        <div class="form-group-lg">
                            <h5>Tus pedidos realizados</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Id</td>
                                        <td>Fecha de compra</td>
                                        <td>fecha de Entrega</td>
                                        <td>Monto total</td>

                                        <td>Estado</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carts as $cart)
                                    <tr>

                                        <td>{{ $cart->id }}</td>
                                        <td>{{ $cart->order_date }}</td>
                                        <td>{{  $cart->arrived_order }}</td>
                                        <td> $ {{ $cart->order->amount }}</td>
                                        @if($cart->status == 'paid')
                                        <td class="alert alert-success" role="alert">Pagado</td>

                                        @elseif($cart->status =='pending')
                                        <td class="alert alert-warning" role="alert">Pendiente</td>
                                        @else
                                        <td class="alert alert-danger" role="alert">Cancelado</td>
                                        @endif

                                    </tr>
                                    @endforeach
                                    <br>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div> @endsection