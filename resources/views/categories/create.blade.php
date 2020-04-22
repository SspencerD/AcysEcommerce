@extends('layouts.dashboard')

@section('title','Creación de producto |' .config('app.name'))

@section('content')
@include('includes.flash-messages')
<div class="container-fluid">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Creación de categoria</h1>
        <a href="{{ route('categories.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left"></i>
            Volver a la lista </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{route('categories.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="nombre" class="">Nombre</label>
                            <input name="name" id="nombre" placeholder="demosle un nombre" type="text"
                                class="form-control" value="{{ old('name')  }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="descripcion" class="">Descripción</label>
                            <input name="description" id="descripcion" placeholder="¿de que trata?" type="text"
                                class="form-control" value="{{ old('description') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="descripcion" class="">Subir imagen</label>
                            <input name="image" type="file" class="form-control btn btn-primary">
                        </div>
                    </div>
                </div>
                <button class="mb-2 mr-2 btn btn-success" type="submit">Registrar categoria</button>
            </form>
            <a href="{{ route('categories.index') }}" class="mb-2 mr-2 btn btn-danger">Cancelar</a>
        </div>
    </div>
</div>
@endsection