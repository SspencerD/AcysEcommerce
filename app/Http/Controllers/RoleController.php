<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function show()
    {
        
    }

    public function index(){

        $roles = Role::orderBy('id','Desc')->paginate(6);

        return view('roles.index',compact('roles'));


    }
    public function create(){

        $permissions = Permission::get();

        return view('roles.create',compact('permissions'));
    }
    public function store(Request $request)
    {

        $this->validate($request,Role::$rules , Role::$mensaje);

        $role = Role::create($request->all());

        if($request->get('permission')){

            $role->permission()->sync($request->get('permission'));
        }
        return redirect()->route('roles')
        ->with('success','Rol creado con exito!');
    }
    public function edit()
    {

    }
    public function update()
    {

    }
    public function destroy()
    {
        
    }

}
