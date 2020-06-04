<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
class UserController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('haveaccess', 'users.index');

        $users = User::with('roles')->orderBy('id','Desc')->paginate(6);
       // return $users;

        return view('users\index', compact('users'));
    }
    public function show(User $user)
    {
        $this->authorize('haveaccess', 'users.show');

        $roles = Role::orderBy('name')->get();
        return view('users.show', compact('user','roles'));
    }

    public function edit(User $user)

    {
        $this->authorize('haveaccess', 'users.edit');

        $roles = Role::orderBy('name')->get();

        return view('users.edit', compact('user','roles'));
    }
    public function update(Request $request, User $user)
    {
        $this->authorize('haveaccess', 'users.edit');

        $this->validate($request, User::$mensaje , User::$regla);

        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index')
            ->with('warning', 'Usuario actualizado con exito!');
    }

    public function destroy(User $user)
    {
        $this->authorize('haveaccess', 'users.destroy');

        $user->delete();

        return back()->with('info', 'Usuario borrado con exito');
    }
}
