<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static $message = [


        'code.required' => 'Es necesario agregar un codigo al producto',
        'code.min' => 'Es necesario que tu codigo sea min de 3 digitos',
        'name.required' => 'Es necesario agregar un nombre al la  producto',
        'name.min' => 'El nombre de la producto debe contener al menos 3 caracteres...',
        'description.min' => 'hey, el maximo de caracteres son 200...',
        'stock.min' => 'Hey , tu stock debe ser min 1...',
        'stock.required' => 'Es necesario que le pongas stock a tu producto',
        'price.min' => 'Es necesario que el precio sea mayor a 0!',
        'price.required' => ' es necesario ponerle precio a tu producto!',
        'purchase_price.min' => 'Es necesario que el precio de compra sea mayor a 0',
        'purchase_price.required' => 'Es necesario el precio de compra!',
        'category_id.required' => 'Es necesario elegir una categoria',

    ];
    public static $rules = [

        'name' => 'required |min: 3 ',
        'description' => 'max:200 '
    ];



    protected $fillable = [
        'code', 'name', 'description',
        'long_description', 'stock', 'status', 'provider',
        'provider_code', 'lote', 'price', 'purchase_price', 'category_id'
    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images()->where('featured', true)->first();

        if (!$featuredImage)
            $featuredImage = $this->images()->first();

        if ($featuredImage) {

            return $featuredImage->url;
        }

        //default
        return  'images/default.jpg';
    }
    protected $appends = ['category_name'];

    public function getCategoryNameAttribute()
    {
        if ($this->category)
            return $this->category->name;
    }
}