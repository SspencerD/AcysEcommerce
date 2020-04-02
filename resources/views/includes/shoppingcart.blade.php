<!-- Cart -->
<div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-shopping-cart"></i>
        <span>Este carrito es de: {{Auth()->user()->name}}</span>

        <div class="qty">{{  auth()->user()->cart->details->count() }}</div>
    </a>
    <div class="cart-dropdown">
        <div class="cart-list">
            @forelse( auth()->user()->cart->details as $detail)
            <div class="product-widget">
                <div class="product-img">
                    <img src="{{$detail->product->featured_image_url}}" alt="">
                </div>
                <div class="product-body">
                    <h3 class="product-name"><a
                            href="{{route('products.show',$detail->product->id)}}">{{$detail->product->name}}</a></h3>
                    <h4 class="product-price">{{$detail->product->price}} X <span
                            class="qty">{{$detail->quantity}}</span></h4>
                </div>
                <form action="{{url('/cart')}}" method="post">
                    @method('DELETE')@csrf
                    <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                    <button class="delete"><i class="fa fa-close"></i></button></form>
            </div>
            @empty
            <span> Aun no tienes productos agregado a tu carrito</span>
            @endforelse

        </div>
        <div class="cart-summary">
            <small>{{  auth()->user()->cart->details->count() }} item(s) seleccionado </small>
            @if (isset($detail))
            <h5>SUBTOTAL: $ {{$detail->quantity*$detail->product->price}}</h5>

            <div class="form-row">
                <div>
                    <form action="{{ route('perfil')}}" method="get">
                        <button class="btn btn-info btn-round">Ver Carrito</button>
                    </form>
                </div>



                <div>
                    <form action="{{route('order.update')}}" method="post">
                        @csrf
                        <button class="btn btn-warning btn-rnd "> Realizar compra <i
                                class="fa fa-arrow-circle-right"></i></button>
                </div>
            </div>
            @else
            <h5>SUBTOTAL: $ 0</h5>

            @endif
        </div>
    </div>
</div>
<!-- /Cart -->
