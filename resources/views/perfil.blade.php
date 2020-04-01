@extends('layouts.app')


@section('title','Mi Perfil |' .config('app.name'))


@section('content')
@include('includes.menu')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        @if(isset($errors) && $errors->any())
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
                @foreach(session()->get('success') as $message)
                <li>{{$message}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <h1>Tus pedidos</h1>
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
                        <th scope="row"><img src="{{$detail->product->featured_image_url }}" alt="" height="50"></th>
                        <td><a href="{{ route('products.show',$detail->product->id) }}"></a>{{$detail->product->name}}
                        </td>
                        <td>{{$detail->quantity}}</td>
                        <td>$ <b>{{$detail->product->price}}</b></td>
                        <td><b>{{$detail->quantity*$detail->product->price }}</b></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a href="{{ route('products.show', $detail->product->id) }}"
                                        class="dropdown-item btn btn-primary" type="button"><i class="far fa-eye"></i>
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
            <hr>

            <form action="{{route('order.update')}}" method="post">
                @csrf
                <button class="btn btn-warning btn-lg btn-rnd text-center" type="submit"><i
                        class="fas fa-cart-arrow-down"></i> Realizar compra</button>
            </form>



        </div>
    </div>
</div>





@endsection