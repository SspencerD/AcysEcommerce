<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:roles:products.create')->only(['create', 'store']);
        $this->middleware('can:roles:products.index')->only('index');
        $this->middleware('can:roles:products.edit')->only(['edit', 'update']);
        $this->middleware('can:roles:products.destroy')->only('destroy');
    }
    public function index()
    {
        $products = Product::paginate();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Producto guardado con exito');
    }
    public function show(Product $product)

    {
        $images = $product->images()->get();
        return view('products.show')->with(compact('product', 'images'));
    }

    public function edit(Product $product)

    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('warning', 'Producto Actualizado con exito!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('info', 'Producto borrado con exito');
    }
}
