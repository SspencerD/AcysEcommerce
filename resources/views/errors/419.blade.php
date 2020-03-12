@extends('layouts.app')

@section('title','Tu sitio expiró |' .config('app.name'))

@section('content')


<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="419">419</div>
        <p class="lead text-gray-800 mb-5">Tu pagina o Link expiro!</p>
        <p class="text-gray-500 mb-0">Vaya, paso el tiempo y ya no existe este link</p>
        <a href="{{route('welcome.index')}}">&larr; Volver al inicio</a>
    </div>

</div>

@endsection