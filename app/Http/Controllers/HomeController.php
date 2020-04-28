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
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('comienzo');
    }

    public function perfil()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->where('status', 'paid')->get();

                return view('perfil')->with(compact('carts'));
    }

    public function edit()
    {
        $user = Auth::user()->id;

        return view('edits.edit-user',compact('user'));

    }

    public function store(Request $request) {
        $user = Auth::user();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->rut = $request->rut;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success','Usuario editado correctamente!');
    }
}
