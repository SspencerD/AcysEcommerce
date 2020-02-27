<?php

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = factory(Category::class, 5)->create(); // creamos 5 categorias lo guardamos en la bd  , pero damos su referencia
        $categories->each(function ($category) {  // luego a cada categoria llamamos a una funcion,
            $products = factory(Product::class, 20)->make(); // desde a cada categorias accedemos a sus productos , ya antes declarado en el modelo y decimos que cree 20 , pero no los guarde en la bd
            $category->products()->saveMany($products); // luego le indicamos que guarde estos nuevos productos  dentro de Categoria.

            $products->each(function ($product) { // iteramos sobre los productos,  e indicamos que cada producto cumpla la siguiente funcion ,
                $images = factory(ProductImage::class, 5)->make(); // que cada producto product tendra 5 imagenes, y nos la dara la factory de imagenes.
                $product->images()->saveMany($images); // luego cada coleccion de imagenes se va crear por cada producto.

            });
        });
    }
}