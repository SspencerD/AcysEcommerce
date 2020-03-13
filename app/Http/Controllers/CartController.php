<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
        $cart = auth()->user()->cart;
        $cart->status ='Pending';
        $cart->save();
         // actualiza carrito de compras

         return back()->with('success','Tenemos listo tu carrito! ,te enviaremos un mail con los detalles');



    }
}
