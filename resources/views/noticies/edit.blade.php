@extends('layouts.dashboard')

@section('title','Edición de Noticia |' .config('app.name'))

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
        <h1 class="h3 mb-0 text-gray-800">Edición de Noticias</h1>
        <a href="{{ route('news') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left"></i>
            Volver a la lista </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{route('news.update',$notice->id )}}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="nombre" class="">Nombre</label>
                            <input name="name" placeholder="demosle un nombre" type="text"
                                class="form-control" value="{{ old('name',$notice->name)  }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="descripcion" class="">Descripción</label>
                            <input name="description" id="descripcion" placeholder="¿de que trata?" type="text"
                                class="form-control" value="{{ old('description',$notice->description) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="descripcion" class="">Subir imagen</label>
                            <input name="image" type="file" class="form-control btn btn-primary">
                            @if($notice->image)
                            <br>
                            <p class="help-block alert alert-danger">Subir una imagen solo si desea remplazar la
                                <a href="{{ asset('/images/notices/'.$notice->image) }}" target="_blank"> imagen
                                    actual</a>
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label for="descripcion" class="">Descripción detallada</label>
                            <textarea name="long_description" id="" cols="100"
                                rows="5">{{ old('long_description',$notice->long_description) }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=" form-group col-sm-4">
                        <button class="mb-1 mr-1 btn btn-warning" type="submit">Editar categoria</button>
                        <a href="{{ route('news') }}" class="mb-2 mr-2 btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection