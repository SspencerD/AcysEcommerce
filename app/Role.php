<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
    'name',
    'slug',
    'description',
    'full-access',
    ];

    public static $rules = [
        'name'        => 'required|max:50|unique:roles,name',
        'slug'        => 'required|max:50|unique:roles,slug',
        'full-access' =>'required|in:yes,no'

    ];

    public static $mensaje = [

        'name.required' => 'Se requiere un nombre para el rol',
        'slug.required' =>'Se require un nombre para el slug',
        'full-access.required' =>'Se requiere seleccionar el acceso',
        'name.max' =>'Solo se permiten 50 caracteres en nombre',
        'slug.max' =>'Solo se permiten 50 caracteres en slug',
        'full-access.in'=> 'No has seleccionado el formato valido',
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function permission()
    {
        return $this->belongsToMany('App\Permission')->withTimestamps();
    }
}
