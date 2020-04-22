<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function show()
    {
        
    }

    public function index(){

        $roles = Role::paginate();

        return view('roles.index',compact('roles'));


    }
    public function create(){

        return view('roles.create');
    }
    public function store(){

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
