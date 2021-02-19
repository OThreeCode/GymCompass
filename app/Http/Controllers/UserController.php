<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return view('/home', [
            'users' => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string'],
            'email'    => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
            'role'     => ['required', Rule::in([
                User::ROLE_ADMIN,
                User::ROLE_CLIENT,
                User::ROLE_PERSONAL,
            ])],
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('message', 'Usuário cadastrado com sucesso.');
    }

    public function show(User $user)
    {
        return redirect()->back()->with('user', $user);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'role'  => ['required', Rule::in([
                User::ROLE_ADMIN,
                User::ROLE_CLIENT,
                User::ROLE_PERSONAL,
            ])],
        ]);

        $user = User::find($id);
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->role  = $request->role;

        $user->save();

        return redirect()->route('users.index');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->back()->with('message', 'Usuário deletado com sucesso.');
    }
}
