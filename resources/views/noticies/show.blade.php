@extends('layouts.app')


@section('title','Noticias |' .config('app.name'))


@section('content')
@include('includes.menu')
@include('includes.flash-messages')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <p><a href="{{ route('noticias') }}" class="btn btn-primary" role="button">volver a noticias</a>
    <div class="container">

        <div class="row row-offcanvas row-offcanvas-right">

            <div class="col-xs-12 col-sm-9">
                <div class="jumbotron">
                    <img src="{{ $notice->featured_image_url }}" alt="">
                </div>
                <div class="jumbotron">
                    <h1>{{ $notice->name }}</h1>
                    <p>{{$notice->description}}</p>
                    <hr>
                    <span>
                        {{ $notice->long_description }}
                    </span>
                </div>

            </div>
            <!--/.col-xs-12.col-sm-9-->
        </div>

    </div>

</div>

@endsection
