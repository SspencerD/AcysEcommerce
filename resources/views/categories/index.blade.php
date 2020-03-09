@extends('layouts.dashboard')

@section('title','Dashboard |' .config('app.name'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    {{--  Mensajes flash  --}}
    @include('includes.flash-messages')

    {{--  fin mensajes flash  --}}
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Listado de categorias</h1>
    @can('products.create')
    <a href="{{ route('categories.create')  }} " class=" btn btn-success bt-lg pull-right"><i
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
                            <th>imagen</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <th><img src="{{ $category->featured_image_url }}" alt="" width="50"> </th>
                            <th>{{ $category->name }}</th>
                            <th>{{ $category->description }} </th>

                            <th>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        @can('categories.show')
                                        <a href="{{ route('categories.show', $category->id) }}"
                                            class="dropdown-item btn btn-primary" type="button"><i
                                                class="far fa-eye"></i>
                                            Ver</a>
                                        @endcan
                                        @can('categories.edit')
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="dropdown-item btn btn-warning" type="button"><i
                                                class="far fa-edit"></i>
                                            Editar</a>
                                        @endcan
                                        @can('categories.destroy')
                                        <form action=" {{ route('categories.destroy', $category->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button class="dropdown-item btn btn-danger" type="submit"><i
                                                    class="fas fa-trash"></i>
                                                Borrar</button>
                                        </form>
                                        @endcan
                                    </div>
                            </th>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
                <div class="align-content-md-center">
                    {{$categories->links() }}
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection