<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:roles:users.index')->only('index');
        $this->middleware('can:roles:users.edit')->only(['edit', 'update']);
        $this->middleware('can:roles:users.show')->only('show');
        $this->middleware('can:roles:users.destroy')->only('destroy');
    }

    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)

    {
        $roles = Role::get();
        return view('users.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        //sincronizamos los roles
        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index')
            ->with('warning', 'Usuario actualizado con exito!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('info', 'Usuario borrado con exito');
    }
}
