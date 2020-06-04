<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\SUpport\Facades\Gate;

class RoleController extends Controller
{
    public function show(Role $role)
    {
        $this->authorize('haveaccess', 'role.show');

        $permission_role = [];

        foreach ($role->permission as $permissions) {
            $permission_role[] = $permissions->id;
        }

        $permissions = Permission::get();

        return view('roles.show', compact('permissions', 'role', 'permission_role'));
    }

    public function index(){

        $this->authorize('haveaccess', 'role.index');

        $roles = Role::orderBy('id','Desc')->paginate(6);

        return view('roles.index',compact('roles'));


    }
    public function create(){

        $this->authorize('haveaccess', 'role.create');

        $permissions = Permission::get();

        return view('roles.create',compact('permissions'));
    }
    public function store(Request $request)
    {
        $this->authorize('haveaccess', 'role.create');

        $this->validate($request,Role::$rules , Role::$mensaje);

        $role = Role::create($request->all());

       // if($request->get('permission')){

            $role->permission()->sync($request->get('permission'));
        //}
        return redirect()->route('roles')
        ->with('success','Rol creado con exito!');
    }
    public function edit(Role $role)
    {
        $this->authorize('haveaccess', 'role.edit');

        $permission_role=[];

        foreach($role->permission as $permissions) {
            $permission_role[]=$permissions->id;
        }

        $permissions = Permission::get();

        return view('roles.edit', compact('permissions','role','permission_role'));

    }
    public function update(Request $request , Role $role)
    {
        $this->authorize('haveaccess', 'role.edit');

       $request->validate([
           'name'       =>'required |max:50|unique:roles,name,'.$role->id,
           'slug'       =>'required|max:50|unique:roles,slug,'.$role->id,
           'full-access' =>'required|in:yes,no'
       ]);

        $role->update($request->all());

        //if ($request->get('permission')) {

            $role->permission()->sync($request->get('permission'));
       // }
        return redirect()->route('roles')
            ->with('success', 'Rol editado con exito!');


    }
    public function destroy(Role $role)
    {
        $this->authorize('haveaccess', 'role.destroy');

        $role->delete();

        return redirect()->route('roles')
            ->with('info', 'Rol eliminado con exito!');

    }

}
