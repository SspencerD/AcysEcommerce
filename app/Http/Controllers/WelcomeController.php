<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    
    public function index()
    {
        $categories = Category::get();
        $products = Product::paginate(6);

        return view('welcome', compact('categories', 'products'));
    }

    public function contacto()
    {
        return view('contacto');
    }
    public function nosotros()
    {
        return view('nosotros');
    }
}