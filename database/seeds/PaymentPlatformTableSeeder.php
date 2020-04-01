<?php

use App\PaymentPlatform;
use Illuminate\Database\Seeder;

class PaymentPlatformTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentPlatform::create([
            'name' =>'Paypal',
            'image' =>'images/payments/paypal.jpg',
        ]);

        PaymentPlatform::create([
            'name' => 'Stripe',
            'image' => 'images/payments/stripe.jpg',
        ]);
        PaymentPlatform::create([
            'name' => 'Mercadopago',
            'image' => 'images/payments/mpago.jpg',
        ]);
        PaymentPlatform::create([
            'name' => 'Payu',
            'image' => 'images/payments/payu.jpg',
        ]);
        PaymentPlatform::create([
            'name' => 'Webpay',
            'image' => 'images/payments/webpay.jpg',
        ]);
        
        
    }
}
