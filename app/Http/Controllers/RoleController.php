<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();

        return view('roles.index', compact('roles'));
    }
    public function create(Role $role)
    {
        $permissions = Permission::get();
        return view('roles.create', compact('role', 'permissions'));
    }
    public function store(Request $request)
    {
        $role = Role::create($request->all());

        //guardar permisos
        $role->permissions()->sync($request->get('permissions'));
        $role->save();

        return redirect()->route('roles.index')
            ->with('success', 'Rol creado con exito!');
    }
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('roles.edit', compact('role', 'permissions'));
    }
    public function update(Request $request, Role $role)
    {
        $role->update($request->all());

        //actualizar permisos
        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.index')
            ->with('warning', 'Rol Actualizado con exito!');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('info', 'Rol borrado con exito');
    }
}