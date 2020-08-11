@extends('layouts.dashboard')

@section('title','Dashboard |' .config('app.name'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    {{--  Mensajes flash  --}}
    @include('includes.flash-messages')

    {{--  fin mensajes flash  --}}
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Listado de Sliders</h1>

    <a href="{{ route('slideferreteria.create')  }} " class=" btn btn-success bt-lg pull-right"><i
            class="far fa-plus-square"></i> Crear</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">

            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Tamaño de las imagenes</h4>
                <p>Para que las imagenes tengan una mayor resolución y no haya problemas de tamaño favor subir todas
                    las imagenes con una resolución de 1200x720 pixeles
                </p>
                <hr>
            </div>
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
                        @foreach($sliderferrs as $slide)
                        <tr>
                            <th>{{ $slide->id }}</th>
                            <th><img src="{{ $slide->featured_image_url }}" alt="" width="50"> </th>
                            <th>{{ $slide->name }}</th>
                            <th>{{ $slide->description }} </th>

                            <th>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a href="{{ route('slideferreteria.show', $slide->id) }}"
                                            class="dropdown-item btn btn-primary" type="button"><i
                                                class="far fa-eye"></i>
                                            Ver</a>
                                        <a href="{{ route('slideferreteria.edit', $slide->id) }}"
                                            class="dropdown-item btn btn-warning" type="button"><i
                                                class="far fa-edit"></i>
                                            Editar</a>
                                        <form action=" {{ route('slideferreteria.destroy', $slide->id) }}" method="POST">
                                            @method('DELETE')
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
                    {{$sliderferrs->links() }}
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

