<?php

use App\PaymentPlatform;
use Illuminate\Database\Seeder;

class PaymentPlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentPlatform::create([
            'name' => 'Paypal',
            'image' => 'images/payments/paypal.jpg',

        ]);
        PaymentPlatform::create([
            'name' => 'Stripe',
            'image' => 'images/payments/stripe.jpg',

        ]);
        PaymentPlatform::create([
            'name' => 'MercadoPago',
            'image' => 'images/payments/mpago.jpg',

        ]);
        PaymentPlatform::create([
            'name' => 'TransBank',
            'image' => 'images/payments/webpay.jpg',

        ]);
        PaymentPlatform::create([
            'name' => 'PayU',
            'image' => 'images/payments/payu.jpg',

        ]);
    }
}