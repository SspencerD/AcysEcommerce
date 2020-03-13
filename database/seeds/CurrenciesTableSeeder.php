<?php

use App\Currency;
use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curriencies = [
            'usd',
            'clp',
        ];

        foreach($curriencies as $currency)

        Currency::create([
            'iso'=> $currency,
         ]);
    }
}
