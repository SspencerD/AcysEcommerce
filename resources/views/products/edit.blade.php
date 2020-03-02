@extends('layouts.dashboard')

@section('title','Edición de producto |' .config('app.name'))

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edición de producto</h1>
        <a class="btn btn-warning" href="{{route('products.index')  }}"><i class="fas fa-arrow-left"></i> volver al
            listado</a>
    </div>
    <form action="" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Codigo</label>
                <input type="code" class="form-control" id="inputEmail4" placeholder="2304-2"
                    value="{{ old('code',$code )}}">
            </div>
            <div class="form-group col-md-8">
                <label for="inputname">Nombre</label>
                <input type="name" class="form-control" id="inputPassword4" placeholder="Llave 3/4 inox stanley"
                    value="{{ old('name',$name )}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="inputAddress">Descripción</label>
                <input type="description" class="form-control" id="inputAddress" placeholder="Llave 3/4 inox..."
                    value="{{ old('description',$description )}}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputAddress2">Stock</label>
                <input type="number" class="form-control" id="inputAddress2" placeholder="458222"
                    value="{{ old('stock',$stock )}}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputCity">Provedor</label>
                <input type="provider" class="form-control" id="provider" placeholder="O'higgins"
                    value="{{ old('provider',$provider )}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputZip">Codigo Provedoor</label>
                <input type="provider_code" class="form-control" id="provider_code" placeholder="SKU939232"
                    value="{{ old('provider_code',$provider_code )}}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Categoria</label>
                <select id="inputState" class="form-control" name="category_id">
                    <option selected value="0">Sin Categorizar</option>
                    @foreach( $categories as $category)
                    <option value="{{ $category->id }}">{{$category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputZip">Lote</label>
                <input type="lote" class="form-control" id="lote" placeholder="34920875"
                    value="{{ old('lote',$lote )}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputZip">Precio</label>
                <input type="price" class="form-control" id="price" value="{{ old('price',$price )}}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputZip">Precio compra</label>
                <input type="purchase_price" class="form-control" id="purchase_price" value="{{ old('code',$code )}}">
            </div>
        </div>
        <div class="form-row">
            <label for="Descripción detallada"></label>
            <textarea name="long_description" id="long_description" cols="100"
                rows="5">{{old ('long_description',$long_description) }}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>



@endsection