<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Notice;
use App\Slidefer;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index()
    {
        $slides = Slidefer::all();
        
        $categories = Category::WhereIn('name',[
            'Herramientas','Herramientas Electricas','Pinturas','Abrasivos','Adhesivos','Insumos'
            ])->get();
        $products = Product::paginate(6);

        return view('welcome', compact('categories', 'products','slides'));
    }

    public function contacto()
    {
        return view('contacto');
    }
    public function nosotros()
    {
        return view('nosotros');
    }
    public function noticias()
    {
        $noticias = Notice::all();
        return view('noticias',compact('noticias'));
    }

}
