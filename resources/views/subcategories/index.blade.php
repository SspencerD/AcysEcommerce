@extends('layouts.dashboard')

@section('title','Dashboard |' .config('app.name'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    {{--  Mensajes flash  --}}
    @include('includes.flash-messages')

    {{--  fin mensajes flash  --}}
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Listado de Sub Categorias</h1>
    @can('products.create')
    <a href="{{ route('subcategories.create')  }} " class=" btn btn-success bt-lg pull-right"><i
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
                        @foreach($subcategories as $subcategory)
                        <tr>
                            <th>{{ $subcategory->id }}</th>
                            <th><img src="{{ $subcategory->featured_image_url }}" alt="" width="50"> </th>
                            <th>{{ $subcategory->name }}</th>
                            <th>{{ $subcategory->description }} </th>

                            <th>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        @can('subcategories.show')
                                        <a href="{{ route('subcategories.show', $subcategory->id) }}"
                                            class="dropdown-item btn btn-primary" type="button"><i
                                                class="far fa-eye"></i>
                                            Ver</a>
                                        @endcan
                                        @can('subcategories.edit')
                                        <a href="{{ route('subcategories.edit', $subcategory->id) }}"
                                            class="dropdown-item btn btn-warning" type="button"><i
                                                class="far fa-edit"></i>
                                            Editar</a>
                                        @endcan
                                        @can('subcategories.destroy')
                                        <form action=" {{ route('subcategories.destroy', $subcategory->id) }}" method="POST">
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
                    {{$subcategories->links() }}
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
