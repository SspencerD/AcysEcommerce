<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function __construct()
    {

        $this->middleware('can:roles:welcomes.index')->only('welcome');
    }

    public function index()
    {
        $categories = Category::get();
        $products = Product::get();

        return view('welcome', compact('categories', 'products'));
    }
}