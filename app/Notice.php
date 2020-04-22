<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    public static $message = [

        'name.required' => 'Es necesario agregar un nombre al la  categoria',
        'name.min' => 'El nombre de la categoria debe contener al menos 3 caracteres...',
        'description.min' => 'hey, el maximo de caracteres son 200...',
        'image.required' => ' Es necesario una imagen para la noticia',
        'long_description.required' => 'Es necesario una descripción detallada de la noticia',
        'long_description.min' => 'El minimo de una noticia son 100 caracteres...',

    ];
    public static $rules = [

        'name' => 'required |min: 3 ',
        'description' => 'max:200 ',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'long_description' => 'required|min: 100|max: 2000',



    ];
    public static $reglas = [
        'name' => 'required |min: 3 ',
        'description' => 'max:200 ',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'long_description' => 'required|min: 100|max: 2000',
    ];

    protected $fillable = ['name', 'description', 'long_description', 'url', 'image'];

    public function getFeaturedImageUrlAttribute()
    {
        if ($this->image)
            return '/images/notices/' . $this->image;
        //else
        $firstProduct = $this->products()->first();
        if ($firstProduct)
            return $firstProduct->featured_image_url;
        //
        return '/img/default.jpg';
    }
}
