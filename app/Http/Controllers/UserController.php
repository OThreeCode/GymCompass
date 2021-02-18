<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
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

        $user           = new User();
        $user->name     = $request->get('name');
        $user->email    = $request->get('email');
        $user->role     = $request->get('role');
        $user->password = bcrypt($request->get('[password'));

        $user->save();

        return redirect()->route('home')->with('message', "Usuário cadastrado!");
    }
    
}
