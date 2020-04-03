@extends('layouts.app')


@section('title','Contacto' .config('app.name'))


@section('content')
@include('includes.menu')
<div class="section">
    <!-- container -->
    <br><br><br>
    <div class="container">
        <h1>Contacto</h1>

        <div class="shiping-details">
            <div class="section-title">
                <h3 class="title">¿Dudas? , ¡puedes contactarte con nosotros!</h3>
            </div>
            <div class="caption">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input class="input" type="text" name="name" placeholder="Su Nombre">
                </div>
                <div class="form-group">
                    <label for="">Correo</label>
                    <input class="input" type="text" name="email" placeholder="Su Email">
                </div>
                <div class="form-group">
                    <label for="">Telefonó</label>
                    <input class="input" type="email" name="phone" placeholder="Su Telefonó">
                </div>
                <div class="form-group">
                    <label for="">Asunto</label>
                    <input class="input" type="text" name="asunto" placeholder="asunto">
                </div>
                <div class="form-group">
                    <label for="">Mensaje</label>
                   <textarea name="" id="" cols="160" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button  class="btn btn-lg btn-primary" type="submit">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection