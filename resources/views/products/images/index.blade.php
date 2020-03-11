@extends('layouts.dashboard')

@section('title','Creación de imagen producto |' .config('app.name'))

@section('content')

@include('includes.flash-messages')

@endif
@can('imageproducts.index')
<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="photo">{{$product->name }}</label>
        <input type="file" name="photo" class="form-control-file" id="photo" required>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-info">
                <i class="fas fa-upload"></i>Cargar imagen
            </button>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url('/products') }}" type="button" aria-haspopup="true" aria-expanded="false"
                class="btn btn-danger">
                <i class="fas fa-arrow-alt-circle-left"></i>
                Volver al listado
            </a>
        </div>
    </div>
</form>
<div class="card-deck">
    @forelse($images as $image)
    <div class="card">
        <img class="card-img-top" src="{{ $image->url }}" alt="Card image cap" class="img-responsive">
        <div class="card-body">
            <p class="card-text"><small class="text-muted">Creado:{{$image->created_at }}</small></p>
            <div class="card-footer">
                <form action="" method="post">
                    @csrf @method('DELETE')
                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                    @if($image->featured)
                    <button type="button" class="btn btn-success btn-sm btn-around" data-toggle="tooltip"
                        data-placement="top" title="Destacado">
                        <i class="fas fa-check-double"></i>
                    </button>
                    @else
                    <a href="{{ url('products/'.$product->id.'/images/select/'.$image->id) }}"
                        class="btn btn-warning btn-sm btn-round" data-toggle="tooltip" data-placement="top"
                        title="Destacar Imagen"> <i class="fas fa-star"></i>
                    </a>
                    @endif
                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                        title="Eliminar">
                        <i class="fas fa-ban"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div>
        <p>Vaya... aun no hay imagenes 😒😞</p>
    </div>
    @endforelse
</div>
@endcan


@endsection