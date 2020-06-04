<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NewOrder;
use Caffeinated\Shinobi\Contracts\Role;
use Carbon\Carbon;
use App\Currency;
use App\Order;
use App\Cart;
use App\CartDetail;
use App\Product;
use App\Resolvers\PaymentPlatformResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function update()
    {
        
        $client =auth()->user();
        $cart = $client->cart;
        $cart->status ='Pending';
        $cart->order_date=Carbon::now();
        $cart->save();
        
       /*    actualiza carrito de compras */



         return redirect()
         ->route('payments')
         ->with('success','Tenemos listo tu carrito! ,te enviaremos un mail con los detalles. Seras redirigido a la pagina de pago');
    }

    public function detalle($id)
    {
        $order = Order::find($id);
        if(Auth::user()->id != $order->user_id) {
            return redirect('/')->with('danger','Esta orden no es tuya');
        } else {
            $cart = Cart::where('order_id', $id)->first();
            $cart_details = CartDetail::where('cart_id', $cart->id)->get();
            //$product = Product::find($cart_detail->product_id);

            return view('orders.detalle', 
                compact('order', 'cart', 'cart_details'))->with('success','Hemos encontrado tu orden!');
        }

        
    }
}
