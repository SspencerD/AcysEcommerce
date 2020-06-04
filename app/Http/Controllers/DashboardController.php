<?php

namespace App\Http\Controllers;

use App\Order;
use App\Category;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\SUpport\Facades\Gate;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        Gate::authorize('haveaccess', 'dashboard'); 

        $categories = Category::all();
        $products = Product::all();
        $users = User::all();

        return view('dashboard')->with(compact('categories' ,'products','users'));
    }
    public function historicos()
    {
        $this->authorize('haveaccess','historicos');
        $historial = Order::paginate(6);

        $order = Order::all();
        $order_name = $order->first()->paymentPlatform->name;
        

        return view('historicos.index')->with(compact('historial'));
    }
}
