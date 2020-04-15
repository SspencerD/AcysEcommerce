@extends('layouts.app')


@section('title','Mi Perfil |' .config('app.name'))


@section('content')
@include('includes.menu')
<div class="section">
    <!-- container -->
    <div class="container">

        <div class="row">
            <h3> Información personal</h3>
            <p>
                Hola, {{ auth()->user()->name }}
                tu Última modificación de datos fue : {{ auth()->user()->updated_at }}
            </p>
            <div class="form-group-lg">
                <span>todos los campos son obligatorios</span>
                <div class="row">
                    <form action="#" method="post">
                        <div class="col-lg-4">
                            <div class="input-group">
                                <label for="Nombre">Nombre</label>
                                <input type="text" class="form-control" name="name"
                                    value=" {{ auth()->user()->name }}{{ old('name',$user->name) }}" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <label for="Apellido">Apellido</label>
                                <input type="text" class="form-control" name="lastname"
                                    value="{{ auth()->user()->lastname }}{{ old('lastname',$user->lastname) }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <label for="Rut">Rut</label>
                                <input type="text" class="form-control" name="rut" value="{{ auth()->user()->rut }}{{ old('rut',$user->rut) }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                
                                <label for="Rut">Password</label>
                                <small class="muted-table"> Modificar solo si desea cambiar contraseña</small>
                                <input type="password" class="form-control" name="password"
                                    value="{{ bcrypt(auth()->user()->password) }}{{ old('password',$user->password) }}" >
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <label for="Rut">Repetir Password</label>
                                <input type="password" class="form-control" name="confirmation_password" value="{{ bcrypt('') }}" >
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <label>Telefono</label>
                                <input type="text" class="form-control" name="phone"
                                    value="{{ auth()->user()->phone }}{{ old('phone',$user->phone) }}" required>
                            </div>
                            <div class="col-auto"></div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ auth()->user()->address }}{{ old('address',$user->address) }}" required>
                            </div>
                            <div class="col-auto"></div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <label>Correo</label>
                                <input type="text" class="form-control" name="email"
                                    value="{{ auth()->user()->email }}{{ old('email',$user->email) }}" required>
                            </div>
                        </div>
                        <div class="col-auto"></div>
                        <div class="col-lg-4">
                            <button class="btn btn-circle btn-lg btn-warning" type="submit">Actualizar</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection