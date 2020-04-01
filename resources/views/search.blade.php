@extends('layouts.app')


@section('title','Resultados de busqueda |' .config('app.name'))


@section('content')
@include('includes.menu')
@include('includes.flash-messages')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->

        <div class="row">
            <h1>Resultado de busqueda </h1>

            <div class="row">
                <div class="col-auto">
                <p class="alert alert-info" role="alert"> Se encontraron {{$products->count() }} resultado  para  el termino {{$query }}</p>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="form-group">
                    <div class="col-auto">
                        <ul class="list-unstyled">
                            @forelse($products as $product)
                            <li class="media">
                            <a href="{{route('products.show',$product->id)}}">
                            <img src="{{$product->featured_image_url}}" alt="{{$product->name }}" class="rounded float-left img-thumbnail" width="250px"></a>
                              <div class="media-body">
                                <h5 class="mt-0 mb-1"><a href="{{route('products.show',$product->id)}}">{{$product->name}}</a></h5>
                                {{$product->description}}
                                <hr>
                              </div>
                            </li>
                            @empty
                            <p class="alert alert-warning" role="alert"> Vaya , no hay nada relacionado a {{$query}} </p>
                            @endforelse
                          </ul>
                          <div class="row text-center">
                              <div class="col-auto">
                                  {{$products->links() }}
                              </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
