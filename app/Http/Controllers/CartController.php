<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NewOrder;
use Caffeinated\Shinobi\Contracts\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

        /*  */

         return redirect()
         ->route('payments')
         ->with('success','Tenemos listo tu carrito! ,te enviaremos un mail con los detalles. Seras redirigido a la pagina de pago');



    }
}
