@extends('layouts.app')

@section('title','Uuuh aaah? no reconocemos esto... |' .config('app.name'))

@section('content')


<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Creo que te haz perdido... está acción no existe.</p>
        <p class="text-gray-500 mb-0">Tranquilo puedes volver al inicio</p>
        <a href="{{route('home')}}">&larr; Volver al inicio</a>
    </div>

</div>

@endsection