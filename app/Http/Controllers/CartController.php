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
         // actualiza carrito de compras

          $admin = \DB::table('users')
          ->join('role_user','user_id','=','role_user.user_id')
          ->join('roles','role_user.role_id','=','roles.id')
          ->select('roles.name as role_name',
            'users.name as name',
            'users.email as email',)
          ->whereIn('roles_name',['admin']);
         Mail::to($admin)->send(new NewOrder($client,$cart));

         return redirect()
         ->route('payments')
         ->with('success','Tenemos listo tu carrito! ,te enviaremos un mail con los detalles. Seras redirigido a la pagina de pago');



    }
}
