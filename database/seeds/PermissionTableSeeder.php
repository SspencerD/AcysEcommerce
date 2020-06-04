<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hacemos refresh a tablas que no tienen modelo
        DB::statement("SET foreign_key_checks=0");
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        Permission::truncate();
        Role::truncate();
        DB::statement("SET foreign_key_checks=1");


        //user admin
        $useradmin = User::where('email', 'admin@admin.com')->first();
        if ($useradmin) {
            $useradmin->delete();
        }
        $useradmin = User::create([

            'name'    => 'Admin',
            'lastname' => 'Super',
            'rut' => '11111111-1',
            'address' => 'cualquier lugar',
            'email'   => 'admin@admin.com',
            'phone'   => '11111111111',
            'password' => Hash::make('admin'),

        ]);
        $personal = User::create([

            'name'    => 'Santiago',
            'lastname' => 'Spencer',
            'rut' => '183142917',
            'address' => 'Casablanca 2525 San Joaquín',
            'email'   => 'santiago.spencer.d@gmail.com',
            'phone'   => '933122600',
            'password' => Hash::make('123123'),

        ]);

        $roladmin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrador del sistema',
            'full-access' => 'yes',
        ]);

        //table role_user hace sincronización (una relación)
        $useradmin->roles()->sync([$roladmin->id]);
        $personal->roles()->sync([$roladmin->id]);


        //permisos 
        $permisson_all = [];

        $permission = Permission::create([

            'name' => 'Listar Roles',
            'slug' => 'role.index',
            'description' => 'El usuario puede ver la lista de los roles creados',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Ver Rol',
            'slug' => 'role.show',
            'description' => 'El usuario puede ver los roles creados',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Crear Roles',
            'slug' => 'role.create',
            'description' => 'El usuario puede crear roles',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Editar Roles',
            'slug' => 'role.edit',
            'description' => 'El usuario puede editar los roles creados',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Borrar Roles',
            'slug' => 'role.destroy',
            'description' => 'El usuario puede borrar los roles creados',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Listar Usuarios',
            'slug' => 'users.index',
            'description' => 'El usuario puede ver la lista de los Usuarios creados',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Ver Usuario',
            'slug' => 'users.show',
            'description' => 'El usuario puede ver los Usuarios creados',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Editar Usuarios',
            'slug' => 'users.edit',
            'description' => 'El usuario puede editar los Usuarios creados',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Borrar Usuarios',
            'slug' => 'users.destroy',
            'description' => 'El usuario puede borrar los Usuarios creados',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Ver Dashboard',
            'slug' => 'dashboard',
            'description' => 'El usuario puede ver el panel de control',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Listar Productos',
            'slug' => 'products.index',
            'description' => 'El usuario puede listar los productos',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Ver Productos',
            'slug' => 'products.show',
            'description' => 'El usuario puede ver los productos',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Crear Producto',
            'slug' => 'products.create',
            'description' => 'El usuario puede crear productos',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Editar Producto',
            'slug' => 'products.edit',
            'description' => 'El usuario puede editar productos',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Borrar Producto',
            'slug' => 'products.destroy',
            'description' => 'El usuario puede borrar productos',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Carga masiva productos',
            'slug' => 'import-list-excel',
            'description' => 'El usuario puede realizar cargas masivas',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Listar Categorias',
            'slug' => 'categories.index',
            'description' => 'El usuario puede listar categorias',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Ver Categorias',
            'slug' => 'categories.show',
            'description' => 'El usuario puede ver categorias',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Crear Categorias',
            'slug' => 'categories.create',
            'description' => 'El usuario puede crear categorias',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Editar Categorias',
            'slug' => 'categories.edit',
            'description' => 'El usuario puede editar categorias',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Borrar Categorias',
            'slug' => 'categories.destroy',
            'description' => 'El usuario puede borrar categorias',
        ]);

        $permisson_all[] = $permission->id;

        /* Noticias */
        $permission = Permission::create([

            'name' => 'Listar Noticias',
            'slug' => 'noticies.index',
            'description' => 'El usuario puede listar noticias',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Ver Noticias',
            'slug' => 'noticies.show',
            'description' => 'El usuario puede ver noticias creadas',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Crear Noticias',
            'slug' => 'noticies.create',
            'description' => 'El usuario puede crear noticias',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Editar Noticias',
            'slug' => 'noticies.edit',
            'description' => 'El usuario puede editar noticias',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Borrar Noticias',
            'slug' => 'noticies.destroy',
            'description' => 'El usuario puede borrar noticias',
        ]);

        $permisson_all[] = $permission->id;
        /* $roladmin->permission()->sync($permisson_all); */
    }
}
