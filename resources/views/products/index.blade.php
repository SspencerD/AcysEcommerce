@extends('layouts.dashboard');

@section('title','Dashboard |' .config('app.name'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    @include('includes.flash-messages')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Listado de producto</h1>
    @can('products.create')
    <a href="{{ route('products.create')  }} " class=" btn btn-success bt-lg pull-right"><i
            class="far fa-plus-square"></i> Crear</a>
    @endcan
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Stock</th>
                            <th>provedor</th>
                            <th>ref provedor</th>
                            <th>lote</th>
                            <th>precio</th>
                            <th>prec venta</th>
                            <th>Categoria</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <th>{{ $product->id }}</th>
                            <th>{{ $product->code }}</th>
                            <th>{{ $product->name }}</th>
                            <th>{{ $product->stock }} unidades </th>
                            <th>{{ $product->provider }}</th>
                            <th>{{ $product->provider_code }}</th>
                            <th>{{ $product->lote }}</th>
                            <th> $ {{ $product->price }}</th>
                            <th> $ {{ $product->purchase_price }}</th>
                            <th>{{ $product->category_name }}</th>
                            <th>{{ $product->description }}</th>
                            <th>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                        <a href="{{ route('products.show', $product->id) }}"
                                            class="dropdown-item btn btn-primary" type="button"><i
                                                class="far fa-eye"></i>
                                            Ver</a>


                                        <a href="{{ route('products.images', $product->id) }}"
                                            class="dropdown-item btn btn-primary" type="button"><i
                                                class="far fa-image"></i>
                                            Imagenes</a>


                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="dropdown-item btn btn-warning" type="button"><i
                                                class="far fa-edit"></i>
                                            Editar</a>


                                        <form action=" {{ route('products.destroy', $product->id) }}" method="post">
                                            @csrf @method('DELETE')

                                            <button class="dropdown-item btn btn-danger" type="submit"><i
                                                    class="fas fa-trash"></i>
                                                Borrar</button>
                                        </form>

                                    </div>
                            </th>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
                <div class="align-content-md-center">
                    {{$products->links() }}
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
