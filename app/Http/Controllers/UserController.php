<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate();

        return view('users\index', compact('users'));
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)

    {

        return view('users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('warning', 'Usuario actualizado con exito!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('info', 'Usuario borrado con exito');
    }
}
