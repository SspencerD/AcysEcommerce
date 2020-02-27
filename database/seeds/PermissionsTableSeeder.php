<?php

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Navegar usuarios',
            'slug' => 'users.index',
            'description' => 'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::create([
            'name' => 'Ver detalle de usuarios',
            'slug' => 'users.show',
            'description' => 'Ver cada detalle del usuarios del sistema',
        ]);

        Permission::create([
            'name' => 'Edición de usuarios',
            'slug' => 'users.edit',
            'description' => 'Editar los usuarios del sistema',
        ]);

        Permission::create([
            'name' => 'Eliminar usuarios',
            'slug' => 'users.destroy',
            'description' => 'Eliminar los usuarios del sistema',
        ]);


        //Roles


        Permission::create([
            'name' => 'Navegar roles',
            'slug' => 'roles.index',
            'description' => 'Lista y navega todos los roles del sistema',
        ]);

        Permission::create([
            'name' => 'Ver detalle de roles',
            'slug' => 'roles.show',
            'description' => 'Ver cada detalle del roles del sistema',
        ]);

        Permission::create([
            'name' => 'Creación de roles',
            'slug' => 'roles.create',
            'description' => 'Editar los roles del sistema',
        ]);

        Permission::create([
            'name' => 'Eliminar roles',
            'slug' => 'roles.destroy',
            'description' => 'Eliminar los roles del sistema',
        ]);

        //Products
        Permission::create([
            'name' => 'Navegar products',
            'slug' => 'products.index',
            'description' => 'Lista y navega todos los productos del sistema',
        ]);

        Permission::create([
            'name' => 'Ver detalle de productos',
            'slug' => 'products.show',
            'description' => 'Ver cada detalle del products del sistema',
        ]);

        Permission::create([
            'name' => 'Creación de products',
            'slug' => 'products.create',
            'description' => 'Editar los productos del sistema',
        ]);

        Permission::create([
            'name' => 'Eliminar products',
            'slug' => 'products.destroy',
            'description' => 'Eliminar los productos del sistema',
        ]);

        //Categorias

        Permission::create([
            'name' => 'Navegar categorias',
            'slug' => 'categories.index',
            'description' => 'Lista y navega todos los categorias del sistema',
        ]);

        Permission::create([
            'name' => 'Ver detalle de categorias',
            'slug' => 'categories.show',
            'description' => 'Ver cada detalle del categorias del sistema',
        ]);

        Permission::create([
            'name' => 'Creación de categorias',
            'slug' => 'categories.create',
            'description' => 'Editar los categorias del sistema',
        ]);

        Permission::create([
            'name' => 'Eliminar categorias',
            'slug' => 'categories.destroy',
            'description' => 'Eliminar los categorias del sistema',
        ]);
    }
}