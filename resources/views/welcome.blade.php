@extends('layouts.app')

@section('title','Tienda Online|'. config('app.name'))

@section('content')
@include('includes.menu')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        @include('includes.flash-messages')
        <!-- row -->
        <div class="row">

            {{-- Carousel --}}
            @include('includes.carousel')
            {{-- fin carousel --}}
            <!-- shop-categories  include('includes.shop-category')-->

            <!-- /shop-categoires -->

            <!-- shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">NUEVOS PRODUCTOS</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            @foreach($categories as $category)
                            <li><a data-toggle="tab" href="#{{ $category->id }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            @foreach( $categories as $category )
                            <div class="products-slick" data-nav="#{{ $category->id }}">
                                @forelse( $category->products as product)
                                <div class="product">
                                    <div class="product-img">
                                        <img src="./img/product01.png" alt="">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">{{ $product->status }}</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $product->category_name }}</p>
                                        <h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
                                        <h4 class="product-price"> $ {{ $product->price}}
                                            <!--<del class="product-old-price">$990.00</del> -->
                                        </h4>
                                        {{--  <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div> --}}
                                        <div class="product-btns">
                                            {{-- <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                    class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                    class="tooltipp">add to compare</span></button> --}}
                                            <form action="" method="get">
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp" type="submit">Vista rapida</span></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Agregar a
                                            carrito</button>
                                    </div>
                                </div>
                                @empty
                                <p> Vaya... esta categoria aun no tiene productos... 😒</p>

                                @endforelse
                                <!-- /product -->
                            </div>
                            @endforeach
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION include(includes.promotions) -->

<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<!-- /SECTION -->
@include('includes.newsletter')
@endsection