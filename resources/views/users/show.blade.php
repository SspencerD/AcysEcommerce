@extends('layouts.dashboard');

@section('title','Dashboard |' .config('app.name'))

@section('content')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block ">
                            <img src="{{ asset('/img/userdefault.png')}}" alt="" width="500">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ $user->name }} {{$user->lastname}}</h1>
                                    <hr>
                                    <ul class="text-pull-right" style="list-style:none; width:auto;">
                                        <li>RUT: {{$user->rut }}</li>
                                        <li>Dirección: {{$user->address }}</li>
                                        <li>Telefonó: {{$user->phone }}</li>
                                        <li>Correo: {{$user->email }}</li>
                                        <li>Registrado: {{$user->created_at}}</li>
                                    </ul>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class=" float-md-right form-group">
                                                <label for="Roles"></label>
                                                <select disabled class="form-control" name="roles" id="roles">
                                                    @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" @isset($user->roles[0]->name)
                                                        @if($role->name == $user->roles[0]->name)
                                                        selected
                                                        @endif
                                                        @endisset
                                                        >{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="">
                                <a href="{{ route('users.index')}}" class="btn btn-info btn-block "> volver al listado
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>





@endsection