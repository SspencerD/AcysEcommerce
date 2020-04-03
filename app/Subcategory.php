<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{

    public static $message = [

        'name.required' => 'Es necesario agregar un nombre al la sub categoria',
        'name.min' => 'El nombre de la sub categoria debe contener al menos 3 caracteres...',
        'description.min' => 'hey, el maximo de caracteres son 200...',
        'image.required' =>'es necesario una imagen para esta sub categoria.',

    ];
    public static $rules = [

        'name' => 'required |min: 3 ',
        'description' => 'max:200 ',
        'image' =>'required|image|mime:jpeg,png,jpg,gif,svg|max:2048',
    ];



    protected $fillable = ['name', 'description'];


    public function products()
    {


        return $this->hasMany(Product::class);
    }


    public function getFeaturedImageUrlAttribute()
    {
        if ($this->image)
            return '/images/subcategories/' . $this->image;
        //else
        $firstProduct = $this->products()->first();
        if ($firstProduct)
            return $firstProduct->featured_image_url;
        //
        return '/img/default.jpg';
    }
}

