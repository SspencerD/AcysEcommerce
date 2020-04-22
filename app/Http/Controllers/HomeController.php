<?php

namespace App\Http\Controllers;

use App\CartDetail;
use App\Cart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function perfil()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->where('status', 'paid')->get();
        
                return view('perfil')->with(compact('carts'));
    }

    public function edit(Request $request)
    {
        $user = $request->all();

        return Auth::user()->update($user);



    }

}
