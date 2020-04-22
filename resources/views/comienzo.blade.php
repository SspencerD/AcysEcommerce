@extends('layouts.pay')

@section('title','Bienvenidos a |' .config('app.name'))

@section('content')
 @push('hoverprincipio')
     <style>

a:hover {
  background-color: #fff;
}
     </style>
 @endpush
<div class="content">

    <div class="jumbotron">
        <img src="{{ url('/images/logo.png') }}" alt="" width="100">
        <h1 class="display-4">Bienvenidos a Acys Limitada Servicios integrales</h1>
        <p class="lead">para una mejor atención para nuestros clientes , hemos dividido nuestra sección de servicios</p>
        <hr class="my-4">
        <p> por favor seleccione según lo que usted busca una de los 2 botones.</p>
    </div>
    <div class="row">
        <div class="card-group ">
            <div class=" ml-5">
                <div class="card ml-5"></div>
            </div>
            <div class=" ml-5">
                <div class="card ml-5"></div>
            </div>
            <div class=" ml-5">
                <div class="card ml-5"></div>
            </div>
            <div class="box-12">
                <div class="card ml-5">
                     <a href="{{ route('inicio') }}"><img class="card-img-top" src="{{ url('/images/ferreteria.jpg') }}" alt="Card image cap"></a>

                </div>
            </div>

            <div class="card ml-5">
                <a href="{{ route('principio') }}"><img class="card-img-top" src="{{ url('/images/soporte.jpg') }}" alt="Card image cap"></a>
            </div>
        </div>
    </div>
    @endsection
