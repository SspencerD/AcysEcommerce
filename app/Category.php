<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public static $message = [

        'name.required' => 'Es necesario agregar un nombre al la  categoria',
        'name.min' => 'El nombre de la categoria debe contener al menos 3 caracteres...',
        'description.min' => 'hey, el maximo de caracteres son 200...'
    ];
    public static $rules = [

        'name' => 'required |min: 3 ',
        'description' => 'max:200 '
    ];



    protected $fillable = ['name', 'description'];


    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->image)
            return '/images/categories/' . $this->image;
        //else
        $firstProduct = $this->products()->first();
        if ($firstProduct)
            return $firstProduct->featured_image_url;
        //
        return '/img/default.jpg';
    }
}