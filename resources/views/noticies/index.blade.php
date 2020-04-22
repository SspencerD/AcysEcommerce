@extends('layouts.dashboard');

@section('title','Dashboard |' .config('app.name'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    @include('includes.flash-messages')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Listado de noticias</h1>

    <a href="{{ route('news.create')  }} " class=" btn btn-success bt-lg pull-right"><i
            class="far fa-plus-square"></i> Crear</a>
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
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Descripción larga</th>
                            <th>Url (opcional) </th>
                            <th>Fecha de creación </th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notices as $notice)
                            
                      
                        <tr>
                            
                            <th>{{ $notice->id }}</th>
                            <th><img src="{{ $notice->featured_image_url}}" width="100"></th>
                            <th>{{ $notice->name }}</th>
                            <th>{{ $notice->description }}</th>
                            <th>{{ $notice->long_description }}</th>
                            <th>{{ $notice->url }}</th>
                            <th>{{ $notice->created_at}}</th>
                            <th>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                        <a href="#"
                                            class="dropdown-item btn btn-primary" type="button"><i
                                                class="far fa-eye"></i>
                                            Ver</a>

                                        <a href="{{ route('news.edit', $notice->id) }}"
                                            class="dropdown-item btn btn-warning" type="button"><i
                                                class="far fa-edit"></i>
                                            Editar</a>


                                        <form action="{{ route('news.destroy', $notice->id) }}" method="post">
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
                    
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection