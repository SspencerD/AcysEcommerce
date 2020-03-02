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
        return view('products.images.index')->with(compact('product', 'images'));
    }
    public function store(Request $request, $id)
    {
        $file = $request->file('photo');
        $path = public_path() . '/images/products';
        $fileName = uniqid() . $file->getClientOriginalName();
        $moved = $file->moved($path, $fileName);


        if ($moved) {
            $productImage = new ProductImage();
            $productImage->image = $fileName;
            $productImage->product_id = $id;
            $productImage->save();
        }
        return back()->with('info','Se ha cargado la imagen correctamente');
    }
    public function destroy(Request $request , $id)
    {
        $productImage = ProductImage::find($request->image_id);
        if (substr($productImage->image, 0, 4) === "http") {

            $deleted = true;
        }else {
            $fullPath = public_path().'/image/products/'.$productImage->image;
            $deleted = File::delete($fullPath);
        }

        if($deleted) {
            $productImage->delete();

        }
        return back()->with('info','Se ha borrado la imagen correctamente');

    }
    public function select($id,$image)
    {
        ProductImage::where('product_id',$id)->update(['featured' => false]);

        $productImage = ProductImage::find($image);
        $productImage->featured = true;
        $productImage->save();

        return back()->with('info','Se ha cargado como imagen destacada');
    }
}
