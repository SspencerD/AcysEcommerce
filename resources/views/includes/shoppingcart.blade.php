<div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-shopping-cart"></i>
        <span>Tu Carrito</span>
        <div class="qty">{{  auth()->user()->cart->details->count() }}</div>
    </a>
    <div class="cart-dropdown">
        <div class="cart-list">
            @forelse( auth()->user()->cart->details as $detail )
            <div class="product-widget">
                <div class="product-img">
                    <img src="{{ $detail->product->featured_image_url }}alt="" title=" {{ $detail->name }}">
                </div>
                <div class="product-body">
                    <h3 class="product-name">
                        <a href="{{route('products.show',$detail->product->id)}}">{{ $detail->product->name }}</a></h3>
                    <h4 class="product-price">{{ number_format($detail->product->price,2) }} <span class="qty">x
                            {{ $detail->quantity}}</span></h4>
                    @php
                    $total = number_format($detail->product->price*$detail->quantity ,2)
                    @endphp
                    <small>subtotal es @php
                        echo $total
                        @endphp</small>
                </div>
                <form action="{{ url('/cart') }}" method="post">
                    @method('DELETE')@csrf
                    <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                    <button class="delete"><i class="fa fa-close"></i></button></form>
            </div>
            @empty
            <small> no hay productos en tu carrito</small>
            @endforelse
        </div>
        <div class="cart-summary">
            <span>{{  auth()->user()->cart->details->count() }} Item(s) Seleccionado</span>
            <div class="text-lg-center">
                <h3>TOTAL: ${{ number_format( auth()->user()->cart->total )}}</h3>
            </div>
        </div>
        <div class="cart-btns">
            <a href="{{ route('perfil') }}">Ver carrito</a>
            <a href="{{ route('payments') }}">Ir a pagar <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>