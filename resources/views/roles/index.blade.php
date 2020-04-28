@extends('layouts.dashboard');

@section('title','Dashboard |' .config('app.name'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    @include('includes.flash-messages')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Listado de roles</h1>
    <!-- DataTales Example -->
    <a href="{{ route('roles.create')  }} " class=" btn btn-success bt-lg pull-right"><i class="far fa-plus-square"></i>
        Crear</a>
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
                            <th>Acceso total</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($roles as $role)
                        <tr>
                            <th>{{ $role->id }}</th>
                            <th>{{ $role->name }} </th>
                            <th>{{ $role->slug }}</th>
                            <th>{{ $role->description }} </th>
                            <th>{{ $role['full-access']}} </th>
                            <th>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                        <a href="{{ route('roles.show', $role->id) }}"
                                            class="dropdown-item btn btn-primary" type="button"><i
                                                class="far fa-eye"></i>
                                            Ver</a>


                                        <a href="{{ route('roles.edit', $role->id) }}"
                                            class="dropdown-item btn btn-warning" type="button"><i
                                                class="far fa-edit"></i>
                                            Editar</a>


                                        <form action=" {{ route('roles.destroy', $role->id) }}" method="POST">
                                            @csrf
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
                    {{$roles->links() }}
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
