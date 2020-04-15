<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::paginate();

        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $category = Category::create($request->all());

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            //se cactualiza registro en la tabla product_images
            if ($moved) {
                $category->image = $fileName;
                $category->save(); //se produce un update
            }
        }

        return redirect()->route('categories.index')
            ->with('success', 'Categoria creada con exito!');
    }
    public function show(Category $category)
    {
        $products = $category->products()->paginate(10);

        return view('categories\show', compact('category', 'products'));
    }
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            //se cactualiza registro en la tabla product_images
            if ($moved) {
                $previousPath = $path . '/' . $category->image;
                $category->image = $fileName;
                $saved = $category->save(); //se produce un update

                if ($saved)
                    File::delete($previousPath);
            }
        }
        return redirect()->route('categories.index')
            ->with('warning', 'Categoria Actualizada con exito!');
    }
    public function destroy(Category $category)
    {
        $category->products()->delete();

        return redirect()->route('categories.index')
            ->with('info', 'Categoria Eliminada con exito!');
    }
}
