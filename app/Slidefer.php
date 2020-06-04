<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slidefer extends Model
{

    public static $message = [

        'name.required' => 'Es necesario agregar un nombre a al slider',
        'name.min' => 'El nombre del slider debe contener al menos 3 caracteres...',
        'description.min' => 'hey, el maximo de caracteres son 200...',
        'description.required' => 'Se requiere una pequeña descripción de 200 caracteres..',
        'image.required' => ' Es necesario una imagen para el slider',
    ];
    public static $rules = [

        'name' => 'required |min: 3 ',
        'description' => 'required|max:200 ',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public static $reglas = [
        'name' => 'required |min: 3 ',
        'description' => 'max:200 ',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];




    protected $fillable = ['name', 'description', 'image'];

    public function getFeaturedImageUrlAttribute()
    {
        if ($this->image)
            return '/images/sliderferreteria/' . $this->image;
        //else
        $firstProduct = $this->products()->first();
        if ($firstProduct)
            return $firstProduct->featured_image_url;
        //
        return '/img/default.jpg';
    }
}
