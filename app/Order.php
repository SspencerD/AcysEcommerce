<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id_payment_merchat', 'user_id', 'amount', 'status', 'payment_platform_id'];

    public function user() {
        $this->belongsTo(User::class);
    }

    public function paymentPlatform() {
        $this->hasOne(PaymentPlatform::class);
    }
}
