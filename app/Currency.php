<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    //declaramos que esta es el id del modelo
    protected $primarykey ='iso';

 //indicamos que no auto incremente
    public $incrementing = false;


    protected $fillable = [ 'iso',];
}
