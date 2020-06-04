@extends('layouts.app')


@section('title','Categorias |' .config('app.name'))


@section('content')
@include('includes.menu')
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
                        <img src="{{ $category->featured_image_url }}" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ $category->featured_image_url }}" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ $category->featured_image_url }}" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ $category->featured_image_url }}" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="p">
                    <div class="product-preview">

                    </div>

                    <div class="product-preview">

                    </div>

                    <div class="product-preview">

                    </div>

                    <div class="product-preview">

                    </div>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h1>{{ $category->name }}</h1>
                    <div>
                        <div class="product-rating">

                        </div>
                        <a class="review-link" href="#"></a>
                    </div>
                    <div>

                    </div>
                    <p>{{$category->description}}</p>

                    <div class="product-options">

                    </div>

                    <ul class="product-btns">

                    </ul>

                    <ul class="product-links">

                    </ul>

                    <ul class="product-links">

                    </ul>

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
                                    <p>{{$category->description }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->
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

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Productos relacionados</h3>
                </div>
            </div>

            <!-- product -->
            @forelse($category = $products as $product )
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="{{ $product->featured_image_url }}" alt="">
                        <div class="product-label">
                            <span class="sale">{{$product->status }}</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">{{ $product->category_name }}</p>
                        <h3 class="product-name"><a href="{{ route('products.show',$product->id) }}">{{ $product->name }}</a></h3>
                        <h4 class="product-price">${{$product->price }} <del class="product-old-price"></del></h4>
                        <div class="product-rating">
                        </div>
                        <div class="product-btns">
                            <a href="{{ url('/products/'.$product->id) }}" type="button" class="quick-view"><i
                                    class="fa fa-eye"></i><span class="tooltip">Ver
                                    producto</span></a>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar al carrito </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">OOH OH!</h4>
                <p>Al parecer esta categoria aun no tiene productos😒😒.</p>
                <hr>
                <p class="mb-0">No te preocupes ,pronto tendra todos los productos que necesitas!</p>
                <a href="{{ url('/') }}" type="button" class="btn btn-primary">Volver al inicio</a>
            </div>
            @endforelse
            <!-- /product -->
        </div>
        <!-- /row -->
        <br><br>
        <div class="flex-center float-right float-lg-right">
            {{ $category->links() }}
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /Section -->
@endsection