@extends('layouts.dashboard')

@section('title','Edición de producto |' .config('app.name'))

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a class="btn btn-primary" href="{{route('products.index')  }}"><i class="fas fa-arrow-left"></i> volver al
            listado</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0 text-gray-800">Edición de producto</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update',$product->id)}}" method="POST">
                @csrf @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Codigo</label>
                        <input type="text" name="code" class="form-control" id="inputEmail4" placeholder="2304-2"
                            value="{{ old('code',$product->code )}} " required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="inputname">Nombre</label>
                        <input name="name" type="text" class="form-control" id="inputPassword4"
                            placeholder="Llave 3/4 inox stanley" value="{{ old('name',$product->name )}} " required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputAddress">Descripción</label>
                        <input name="description" type="text" class="form-control" id="inputAddress"
                            placeholder="Llave 3/4 inox..." value="{{ old('description',$product->description )}} "
                            required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Stock</label>
                        <input name="stock" type="number" class="form-control" id="inputAddress2" placeholder="458222"
                            value="{{ old('stock',$product->stock )}} " required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCity">Provedor</label>
                        <input name="provider" type="text" class="form-control" id="provider" placeholder="O'higgins"
                            value="{{ old('provider',$product->provider )}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputZip">Codigo Provedoor</label>
                        <input name="provider_code" type="text" class="form-control" id="provider_code"
                            placeholder="SKU939232" value="{{ old('provider_code',$product->provider_code )}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputZip">Status</label>
                        <input name="status" type="text" class="form-control" id="status" placeholder="Oferta"
                            value="{{ old('status',$product->status )}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Categoria</label>
                        <select id="inputState" class="form-control" name="category_id">
                            <option selected value="0">Sin Categorizar</option>
                            @foreach( $categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name  }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputZip">Lote</label>
                        <input name="lote" type="number" class="form-control" id="lote" placeholder="34920875"
                            value="{{ old('lote',$product->lote )}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputZip">Precio</label>
                        <input name="price" type="number" step="00.000,00" class="form-control" id="price"
                            value="{{ old('price',$product->price )}}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputZip">Precio compra</label>
                        <input name="purchase_price" type="number" class="form-control" id="purchase_price"
                            value="{{ old('code',$product->purchase_price )}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <label for="Descripción detallada"></label>
                    <textarea name="long_description" id="long_description" cols="100"
                        rows="5">{{old ('long_description',$product->long_description) }}</textarea>
                </div>
                <br>
                <button name="" type="submit" class="btn btn-warning">Actualizar</button>
                <a href="{{ route('products.index') }}" class="mb-2 mr-2 btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>


@endsection