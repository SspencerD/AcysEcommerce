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
    public function create()
    {
        return view('roles.create');
    }
    public function store(Request $request)
    {
        $role = Role::create($request->all());
        $role->save();

        return redirect()->route('roles.index')
            ->with('success', 'Rol creado con exito!');
    }
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }
    public function update(Request $request, Role $role)
    {
        $role->update($request->all());

        return redirect()->route('roles.index')
            ->with('warning', 'Rol Actualizado con exito!');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('info', 'Rol borrado con exito');
    }
}