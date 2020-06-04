<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UserTrait;

class User extends Authenticatable
{
    use Notifiable,UserTrait;
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

    public static $mensaje = [

        'name.required' => 'Es necesario un nombre',
        'name.max' => 'El nombre no puede superar el maximo de 20 caracteres',
        'lastname.required' => 'Es necesario un apellido',
        'lastname.max' => 'El apellido no puede superar el maximo de 20 caracteres',
        'rut.required' => ' Es necesario un Rut',
        'rut.max' => 'El rut no puede superar el maximo de 14 digitos',
        'address.required' => 'Es necesario una dirección',
        'address.max' => 'La dirección no puede superar el maximo de 100 caracteres',
        'email.required' => 'Es necesario un Email',
        'email.max' => 'El email no puede superar el maximo de 50 caracteres',
        'phone.required' => 'Es necesario un numero telefonico',
        'phone.max' => ' El numero telefonico no puede superar los 10 caracteres',
        'phone.numeric' => ' El numero telefonico debe ser numerico...',
    ];
    public static $regla = [
        'name' => ' required|max:20',
        'lastname' => ' required|max:20',
        'rut' => ' required|max:14',
        'address' => ' required|max:100',
        'email' => ' required|max:50',
        'phone' => ' required|max:10|numeric',
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
        $cart = $this->carts()->where('status', 'Active')->first();

        if ($cart)
            return $cart; // si tiene un carrito de compras activo , devolverlo

        //else
        $cart = new Cart();  // sino crea un nuevo carrito de compras
        $cart->status = 'Active';
        $cart->user_id = $this->id;
        $cart->save(); // lo guardas

        return $cart;  // y lo retornas al usuario correspondiente.

    }

}
