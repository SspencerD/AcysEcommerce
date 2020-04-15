@extends('layouts.dashboard')

@section('title','Edición de usuario |' .config('app.name'))

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edición de usuario</h1>
        <a href="{{ route('categories.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left"></i>
            Volver a la lista </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{route('users.update',$user->id )}}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="name" class="">Nombre</label>
                            <input name="name" id="nombre" placeholder="demosle un nombre" type="text"
                                class="form-control" value="{{ old('name',$user->name)  }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="lastname" class="">Apellido</label>
                            <input name="lastname" id="descripcion" placeholder="heightbord" type="text"
                                class="form-control" value="{{ old('lastname',$user->lastname) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="rut" class="">RUT</label>
                            <input name="rut" id="rut" placeholder="18524652-5" type="text" class="form-control"
                                value="{{ old('rut',$user->rut) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="phone" class="">Telefonó</label>
                            <input name="phone" id="phone" placeholder="¿de que trata?" type="text" class="form-control"
                                value="{{ old('phone',$user->phone) }}">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="address" class="">Dirección</label>
                            <input name="address" id="address" placeholder="¿de que trata?" type="text"
                                class="form-control" value="{{ old('address',$user->address) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="email" class="">Correo</label>
                            <input name="email" id="email" placeholder="¿de que trata?" type="email"
                                class="form-control" value="{{ old('email',$user->email) }}">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class=" form-group col-sm-4">
                        <button class="mb-1 mr-1 btn btn-warning" type="submit">Editar Usuario</button>
                        <a href="{{ route('users.index') }}" class="mb-2 mr-2 btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
