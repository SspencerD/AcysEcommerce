@extends('layouts.dashboard')

@section('title','Dashboard |' .config('app.name'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    @include('includes.flash-messages')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Listado de usuarios</h1>
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
                            <th>Apellido</th>
                            <th>Rut</th>
                            <th>Telefonó</th>
                            <th>Dirección</th>
                            <th>Email</th>
                            <th>Role(s)</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <th>{{ $user->name }} </th>
                            <th>{{ $user->lastname }}</th>
                            <th>{{ $user->rut }} </th>
                            <th>{{ $user->phone }} </th>
                            <th>{{ $user->address }} </th>
                            <th>{{ $user->email }} </th>
                            <th>
                                @isset($user->roles[0]->name )
                                    {{ $user->roles[0]->name }}
                                @endisset
                            </th>
                            <th>{{ $user->created_at }} </th>
                            <th>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="dropdown-item btn btn-primary" type="button"><i
                                                class="far fa-eye"></i>
                                            Ver</a>


                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="dropdown-item btn btn-warning" type="button"><i
                                                class="far fa-edit"></i>
                                            Editar</a>


                                        <form action=" {{ route('users.destroy', $user->id) }}" method="POST">
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
                    {{$users->links() }}
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
