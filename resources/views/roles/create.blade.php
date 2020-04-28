@extends('layouts.dashboard')

@section('title','Creación de Rol |' .config('app.name'))

@section('content')
<div class="container-fluid">
    @include('includes.flash-messages')

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        </ul>
        @endforeach
    </div>
    @endif


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Creación de Rol</h1>
        <a href="{{ route('roles.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left"></i>
            Volver a la lista </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{route('roles.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="name" id="inputEmail3"
                            placeholder="Algun nombre...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="slug" id="inputPassword3"
                            placeholder="ex: productos">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword4" class="col-sm-2 col-form-label">Descripción</label>
                    <div class="col-sm-4">
                        <input type="text" name="description" class="form-control" id="inputPassword4"
                            placeholder="Alguna Descripción">
                    </div>
                </div>
                <hr>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Acceso completo</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="full-access" id="FullAcessyes"
                                    value="yes" checked>
                                <label class="form-check-label" for="fullAccessyes">
                                    Si
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="full-access" id="gridRadios2"
                                    value="no" checked>
                                <label class="form-check-label" for="gridRadios2">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-2">Lista de Permisos</div>
                    <div class="col-sm-10">
                        @foreach ($permissions as $permisson)

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="permission_{{$permisson->id}}"
                                value="{{ $permisson->id }}" name="permission[]">
                            <label class="form-check-label" for="permission_{{$permisson->id}}">
                                {{$permisson->id}} - {{ $permisson->name }}
                                <em>[ {{ $permisson->description }} ]</em>
                            </label>
                        </div>
                        @endforeach
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