<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PaymentPlatform;

class Order extends Model
{
    protected $fillable = ['id_payment_merchant', 'user_id', 'amount', 'status', 'payment_platform_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $appends = ['user_name'];

    public function getUserNameAttribute()
    {
        if ($this->user)
            return $this->user->name;
    }

    public function paymentPlatform() {
        return $this->belongsTo(PaymentPlatform::class);
    }

    /*
    public function paymentPlatform() {
        if($this->payment_platform_id)
            $payment_platform = PaymentPlatform::find($this->payment_platform_id);
            return $payment_platform;
    }
    */
    
}
