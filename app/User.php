<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'lastname', 'rut', 'address', 'email', 'password', 'phone',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFeaturedImageUrlAttribute()
    {
        if ($this->image)
            return '/images/users/' . $this->image;
        //else
        $firstProduct = $this->products()->first();
        if ($firstProduct)
            return $firstProduct->featured_image_url;
        //
        return '/img/default.jpg';
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);

    }

    public function getCartAttribute()
    {
        $cart = $this->carts()->where('status','Active')->first();

        if($cart)
            return $cart; // si tiene un carrito de compras activo , devolverlo

            //else
            $cart = new Cart();  // sino crea un nuevo carrito de compras
            $cart->status = 'Active';
            $cart->user_id = $this->id;
            $cart->save(); // lo guardas

            return $cart;  // y lo retornas al usuario correspondiente.

    }

    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }
}
