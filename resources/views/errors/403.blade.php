@extends('layouts.dashboard')

@section('title','No tienes autorización |' .config('app.name'))

@section('content')


<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="403">403</div>
        <p class="lead text-gray-800 mb-5">No tienes autorización</p>
        <p class="text-gray-500 mb-0">No seas pillo , pide permisos antes👀👀🤷‍♂️</p>
        <a href="{{route('admin.dashboard')}}">&larr; Volver al panel</a>
    </div>

</div>

@endsection