@extends('layouts.app')


@section('title','Noticias |' .config('app.name'))


@section('content')
@include('includes.menu')
@include('includes.flash-messages')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="jumbotron">
            <h1>Nuestras Noticias</h1>
                    <p>Mantente informado de todas nuestras ofertas, trabajos y oportunidades que podemos ofrecer para ti desde nuestro sector de información</p>
        </div>
        <div class="row">
            @foreach ($noticias as $noticia)
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <img src="{{ $noticia->featured_image_url }}" alt="{{ $noticia->name }}">
                <div class="caption">
                  <h3>{{ $noticia->name }}</h3>
                  <p>{{ $noticia->description }}</p>
                  <a href="{{ $noticia->url }}"><p>link</p></a>
                  <p><a href="{{ route('news.show',$noticia->id) }}" class="btn btn-primary" role="button">ver noticia</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
    </div>
</div>
@endsection
