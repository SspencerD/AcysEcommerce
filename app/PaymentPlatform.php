<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPlatform extends Model
{
    protected $fillable = [
        'name','image',

    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
