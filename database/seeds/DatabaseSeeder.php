<?php

use App\PaymentPlatform;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PaymentPlatformTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
