<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Category::create([
        'name' =>'Herramientas',
       ]);
        Category::create([
            'name' => 'Herramientas Electricas',
        ]);
        Category::create([
            'name' => 'Abrasivos',
        ]);
        Category::create([
            'name' => 'Pinturas',
        ]);
        Category::create([
            'name' => 'Insumos',
        ]);
        Category::create([
            'name' => 'Adhesivos',
        ]);
        Category::create([
            'name' => 'Perifericos',
        ]);
        Category::create([
            'name' => 'Notebooks',
        ]);
        Category::create([
            'name' => 'Pantallas',
        ]);
        Category::create([
            'name' => 'Electronica',
        ]);
        Category::create([
            'name' => 'Software',
        ]); 

    
    }
}
