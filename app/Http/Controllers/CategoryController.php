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
        $this->authorize('haveaccess', 'categories.index');

        $categories = Category::paginate();

        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        $this->authorize('haveaccess', 'categories.create');

        return view('categories.create');
    }
    public function store(Request $request)
    {
        $this->authorize('haveaccess', 'categories.create');

        $this->validate($request,Category::$rules , Category::$message);

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

        $this->authorize('haveaccess', 'categories.show');

        $products = $category->products()->paginate(10);

        return view('categories.show', compact('category', 'products'));
    }
    public function edit(Category $category)
    {
        $this->authorize('haveaccess', 'categories.edit');

        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $this->authorize('haveaccess', 'categories.edit');

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
        $this->authorize('haveaccess', 'categories.destroy');

        $category->delete();

        return redirect()->route('categories.index')
            ->with('info', 'Categoria Eliminada con exito!');
    }
}
