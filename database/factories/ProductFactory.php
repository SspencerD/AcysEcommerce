<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [

        'code' => $faker->sentence(6),
        'name' => substr($faker->sentence(3), 0, -1), //se ocupa substring para extraer el punto final a una sentencia, se le pone -1 para que reconozca que sea el ultimo caracter.
        'description' => $faker->sentence(10),
        'long_description' => $faker->text,
        'stock' => $faker->numberBetween(1, 1000),
        'provider' => $faker->sentence(5),
        'provider_code'  => $faker->sentence(10),
        'lote'  => $faker->sentence(6),
        'price'  => $faker->randomFloat(2, 3, 10000),
        'purchase_price' => $faker->randomFloat(2, 3, 10000),
        'category_id' => $faker->numberBetween(1, 6)


    ];
});