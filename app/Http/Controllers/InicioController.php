<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class InicioController extends Controller
{

    public function inicio()
    {
        $categories = Category::Where(array(
            'name'=>'Electronica',
            'name'=>'Perifericos',
            'name'=>'Pantallas',
            'name'=>'Notebooks',
        ))->get();
        dd($categories);
        $products = Product::paginate(5);

        return view('principio', compact('categories', 'products'));

    }
}
