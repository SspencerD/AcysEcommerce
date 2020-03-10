@extends('layouts.dashboard')

@section('title','Creación de producto |' .config('app.name'))

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Creación de categoria</h1>
        <a href="{{ route('categories.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left"></i>
            Volver a la lista </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{route('roles.store' )}}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="name" class="">Nombre</label>
                            <input name="name" id="nombre" placeholder="demosle un nombre" type="text"
                                class="form-control" value="{{ old('name')  }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="slug" class="">URl Amigable</label>
                            <input name="slug" id="descripcion" placeholder="vista.blabla" type="text"
                                class="form-control" value="{{ old('slug') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="description" class="">Descripción</label>
                            <input name="description" id="description" placeholder="vendedor..." type="text"
                                class="form-control" value="{{ old('description') }}">
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Permiso especial</h3>
                <div class="form-group">
                    <label>{{ Form::radio('special', 'all-access') }}Acceso total</label>
                    <label>{{ Form::radio('special', 'no-access') }}Ningún Acceso</label>

                    </label>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <h2>Lista de permisos</h2>
                            <div class="form-group">
                                <ul class="list-unstyled">

                                    @foreach ($permissions as $permission)
                                    <li>
                                        <label>
                                            @if($role->permissions->contains($permission->id)) checked=checked
                                            @endif
                                            <input type="checkbox" name="permissions[]"
                                                value="{{ old('id',$permission->id) }}">
                                            {{ $permission->name }}
                                            <em>({{ $permission->description  ?: 'Sin descripción' }})</em>

                                        </label>
                                    </li>

                                    @endforeach
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=" form-group col-sm-4">
                        <button class="mb-1 mr-1 btn btn-success" type="submit">Crear Rol</button>
                        <a href="{{ route('users.index') }}" class="mb-2 mr-2 btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection