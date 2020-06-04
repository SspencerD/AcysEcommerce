@extends('layouts.app')


@section('title','Producto |' .config('app.name'))


@section('content')
@include('includes.menu')
@include('includes.flash-messages')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="{{ $product->featured_image_url}}" alt="">
                    </div>
                    @foreach($images as $image)
                    <img src="{{ $image->url}}" alt="">
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /Product main img -->

        <!-- Product thumb imgs -->
        <div class="col-md-2  col-md-pull-5">
            <div id="product-imgs">
                @foreach($images as $image)
                <div class="product-preview">
                    <img src="{{ $image->url }}" alt="">
                </div>
                @endforeach

            </div>
        </div>
        <!-- /Product thumb imgs -->

        <!-- Product details -->
        <div class="col-md-5">
            <div class="product-details">
                <h2 class="product-name">{{$product->name }}</h2>
                <div>
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    {{--  <a class="review-link" href="#">10 Review(s) | Add your review</a> --}}
                </div>
                <div>
                    <h3 class="product-price">
                        ${{ number_format($product->price,2) }}{{--  <del class="product-old-price">$990.00</del>--}}</h3>
                    @if($product->stock != 0)
                    <span class=" badge badge-success">En Stock</span>
                    <p>{{$product->stock}} disponible</p>
                    @else
                    <span class=" badge badge-danger">Sin Stock</span>
                    @endif
                </div>
                <p>{{$product->description}}</p>

                <form action="{{url('/cart')}}" method="post">
                <input type="hidden" name="product_id" value="{{$product->id }}">
                <div class="add-to-cart">
                    <div class="qty-label">
                        cantidad
                        <div class="input-number">
                            <input type="number" name="quantity" value="1">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>

                        @csrf
                    @if($product->stock !=0)
                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Agregar</button>
                    @else
                    <a type="button" href="#" class="btn btn-danger"><i class="fa fa-shopping-cart"></i>Sin Stock</a>
                    @endif
                </form>
                </div>
                <ul class="product-links">
                    <li>Categoria:</li>
                    <li><a href="#">{{$product->category_name }}</a></li>
                </ul>

                {{--  <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul> --}}

            </div>
        </div>
        <!-- /Product details -->

        <!-- Product tab -->
        <div class="col-md-12">
            <div id="product-tab">
                <!-- product tab nav -->
                <ul class="tab-nav">
                    <li class="active"><a data-toggle="tab" href="#tab1">Descripción</a></li>
                </ul>
                <!-- /product tab nav -->

                <!-- product tab content -->
                <div class="tab-content">
                    <!-- tab1  -->
                    <div id="tab1" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{$product->long_description}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /tab1  -->
                    <!-- tab2  -->
                </div>
                <!-- /product tab content  -->
            </div>
        </div>
        <!-- /product tab -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

@endsection
