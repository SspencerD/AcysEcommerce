@extends('layouts.dashboard')

@section('title','Creación de Rol |' .config('app.name'))

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Creación de Rol</h1>
        <a href="{{ route('roles.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left"></i>
            Volver a la lista </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{route('roles.store')}}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="name" class="">Nombre</label>
                            <input name="name" id="nombre" placeholder="Nombre del rol" type="text"
                                class="form-control" value="{{ old('name')  }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="slug" class="">Slug</label>
                            <input name="slug" id="descripcion" placeholder="slug de tablas" type="text"
                                class="form-control" value="{{ old('slug') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="description" class="">Descripción</label>
                            <input name="description" id="description" placeholder="este da acceso a..." type="text" class="form-control"
                                value="{{ old('description') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="full-access" class="">Acceso Completo</label>
                            <input name="full-access" id="full-access" placeholder="acceso completo" type="text" class="form-control"
                                value="{{ old('full-access') }}">
                        </div>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class=" form-group col-sm-4">
                        <button class="mb-1 mr-1 btn btn-success" type="submit">Crear Rol</button>
                        <a href="{{ route('roles.index') }}" class="mb-2 mr-2 btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection