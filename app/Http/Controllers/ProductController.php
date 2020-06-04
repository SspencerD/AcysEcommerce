<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\ProductImport;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('haveaccess', 'products.index');
        $products = Product::paginate();

        return view('products\index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('haveaccess', 'products.create');

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
        $this->authorize('haveaccess', 'products.create');

        $this->validate($request, Product::$rules, Product::$message);

        $product = Product::create($request->all());
        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Producto guardado con exito');
    }
    public function show(Product $product)

    {
        $this->authorize('haveaccess', 'products.show');

        $images = $product->images()->get();
        return view('products.show')->with(compact('product', 'images'));
    }

    public function edit(Product $product)

    {
        $this->authorize('haveaccess', 'products.edit');

        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('haveaccess', 'products.edit');

        $this->validate($request, Product::$rules, Product::$message);
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('warning', 'Producto Actualizado con exito!');
    }

    public function destroy(Product $product)
    {
        $this->authorize('haveaccess', 'products.destroy');

        try {
            /*  */
            $product->delete();

        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
            

        }
 
        return back()->with('info', 'Producto borrado con exito');
    }
    public function importExcel(Request $request)
    {
        $this->authorize('haveaccess', 'import-list-excel');

        $file = $request->file('file');
        Excel::import(new ProductImport, $file);

        return back()->with('info','Importación de producto completo');

    }
}