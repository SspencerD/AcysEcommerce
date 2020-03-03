<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{

    public function index(Product $product)
    {
        $images = $product->images()->orderBy('featured', 'desc')->get();
        return view('products.images.index', compact('product', 'images'));
    }
    public function store(Request $request, $id)
    {
        //guardar la imag en nuestro proy
        $file = $request->file('photo'); // guarda en un formato file  , extrae la información photo
        $path = public_path() . '/images/products'; // la ruta donde guardamos nuestra imagen
        $fileName = uniqid() . $file->getClientOriginalName(); // el nombre se compone de una id unico concadenado con el nombre subido por el user
        $moved = $file->move($path, $fileName); //se indica a que ruta se guarda con el archivo y el nombre.

        // crear 1 registro en la tabla product_images

        if ($moved) {
            $productImage = new ProductImage();
            $productImage->image = $fileName;
            // $productImage->featured = ;
            $productImage->product_id = $id;
            $productImage->save(); // insert
        }
        return back();
    }
    public function destroy(Request $request, Product $product)
    {
        $productImage = ProductImage::find($request->image_id);
        if (substr($productImage->image, 0, 4) === "http") {

            $deleted = true;
        } else {
            $fullPath = public_path() . '/images/products/' . $productImage->image;
            $deleted = File::delete($fullPath);
        }

        if ($deleted) {
            $productImage->delete();
        }

        $notification = array(
            'message' => 'Se ha borrado la imagen correctamente!',
            'alert-type' => 'danger'
        );


        return back()->with($notification);
    }
    public function select($id, $image)
    {
        ProductImage::where('product_id', $id)->update(['featured' => false]);

        $productImage = ProductImage::find($image);
        $productImage->featured = true;
        $productImage->save();


        $notification = array(
            'message' => 'Se ha cargado como imagen destacada!',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }
}