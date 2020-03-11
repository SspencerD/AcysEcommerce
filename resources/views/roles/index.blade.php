@extends('layouts.dashboard');

@section('title','Dashboard |' .config('app.name'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    @include('includes.flash-messages')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Listado de roles</h1>
    @can('roles.create')
    <a href="{{ route('roles.create')  }} " class=" btn btn-success bt-lg pull-right"><i
            class="far fa-plus-square">&nbsp;</i>Crear</a>
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
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($roles as $rol)
                        <tr>
                            <th>{{ $rol->id }}</th>
                            <th>{{ $rol->name }} </th>
                            <th>{{ $rol->slug }}</th>
                            <th>{{ $rol->description }} </th>
                            <th>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        @can('roles.show')
                                        <a href="{{ route('roles.show', $rol->id) }}"
                                            class="dropdown-item btn btn-primary" type="button"><i
                                                class="far fa-eye"></i>
                                            Ver</a>
                                        @endcan
                                        @can('roles.edit')
                                        <a href="{{ route('roles.edit', $rol->id) }}"
                                            class="dropdown-item btn btn-warning" type="button"><i
                                                class="far fa-edit"></i>
                                            Editar</a>
                                        @endcan
                                        @can('roles.destroy')
                                        <form action=" {{ route('roles.destroy', $rol->id) }}" method="post">
                                            @csrf @method('DELETE')
                                            <button class="dropdown-item btn btn-danger" type="submit"><i
                                                    class="fas fa-trash"></i>
                                                Borrar</button>
                                            @endcan
                                    </div>
                            </th>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
                <div class="align-content-md-center">
                    {{$roles->links() }}
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection