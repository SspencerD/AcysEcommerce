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
            'slug' => 'user.index',
            'description' => 'El usuario puede ver la lista de los Usuarios creados',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Ver Usuario',
            'slug' => 'user.show',
            'description' => 'El usuario puede ver los Usuarios creados',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Editar Usuarios',
            'slug' => 'user.edit',
            'description' => 'El usuario puede editar los Usuarios creados',
        ]);

        $permisson_all[] = $permission->id;

        $permission = Permission::create([

            'name' => 'Borrar Usuarios',
            'slug' => 'user.destroy',
            'description' => 'El usuario puede borrar los Usuarios creados',
        ]);

        $permisson_all[] = $permission->id;


        /* $roladmin->permission()->sync($permisson_all); */
    }
}
