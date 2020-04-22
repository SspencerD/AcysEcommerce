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
            'name' => 'Webpay',
            'image' => 'images/payments/webpay.jpg',
        ]);
        
        
    }
}
