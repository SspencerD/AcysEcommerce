@extends('layouts.app')

@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Nuevo Usuario</h3>
                    </div>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input class="input @error('name') is-invalid @enderror" id="name" type="text" name="name"
                                placeholder="Nombre" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="lastname" placeholder="Apellido"
                                value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="rut" placeholder="Rut" value="{{ old('rut') }}"
                                required autocomplete="rut" autofocus>
                        </div>
                        <div class="form-group">
                            <input id="email" class="input @error('email') is-invalid @enderror" type="email"
                                name="email" placeholder="Correo" value="{{ old('email') }}" required
                                autocomplete="emial" autofocus>

                            @error('email')
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Dirección"
                                value="{{ old('address') }}" required autocomplete="address" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="input" type="number" name="phone" placeholder="Telefono"
                                value="{{ old('phone') }}" autocomplete="phone" autofocus>
                        </div>
                        <hr>
                        <p>Seguridad</p>
                        <div class="form-group">
                            <input class="input @error('password') is-invalid @enderror" name="password" type="password"
                                placeholder="Contraseña" required autocomplete="password" autofocus>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="input form-control" id=" password-confirm" type="password"
                                name="password_confirmation" placeholder="Confirmar Contraseña" required
                                autocomplete="password_confirmation" autofocus>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="primary-btn order-submit">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    @endsection