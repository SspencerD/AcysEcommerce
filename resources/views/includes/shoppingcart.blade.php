<!-- Cart -->
<div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-shopping-cart"></i>
        <span>Este carrito es de: {{Auth()->user()->name}}</span>

    <div class="qty">{{  auth()->user()->cart->details->count() }}</div>
    </a>
    <div class="cart-dropdown">
        <div class="cart-list">
            @if( auth()->user()->cart->details.contains($cart))
            @foreach( auth()->user()->cart->details as $detail)
            <div class="product-widget">
                <div class="product-img">
                <img src="{{$detail->product->featured_image_url}}" alt="">
                </div>
                <div class="product-body">
                <h3 class="product-name"><a href="{{route('products.show',$product->id)}}">{{$detail->product->name}}</a></h3>
                <h4 class="product-price">{{$detail->product->price}}   X   <span class="qty">{{$detail->quantity}}</span></h4>
                </div>
            <form action="{{url('/cart')}}" method="post">
                @method('DELETE')@csrf
            <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                <button class="delete"><i class="fa fa-close"></i></button></form>
            </div>
            @endforeach
            @else
            <p> aun no tienes productos en tu carrito</p>
            @endif
        </div>
        <div class="cart-summary">
            <small>{{  auth()->user()->cart->details->count() }} item(s) seleccionado </small>
        <h5>SUBTOTAL:  $  {{$detail->quantity*$detail->product->price}}</h5>
        </div>
        <div class="cart-btns">
            <a href="#">Ver Carrito</a>
            <a href="#">Ir a pago   <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<!-- /Cart -->
