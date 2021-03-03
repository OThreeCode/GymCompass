<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->isPersonal()) {
            $users = User::query()->where('personal_id', '=', Auth::user()->id)->get();
        } else {
            $users = User::all();
        }

        foreach ($users as $user) {
            if (!$user->personal_id) {
                continue;
            }
            $personal = User::find($user->personal_id);
            $user->personal_name = $personal->name;
        }

        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create', ['workouts' => Workout::all()]);
    }

    public function show(User $user)
    {
        return view('users.edit', [
            'user'              => $user,
            'personals'         => User::query()->where('role', 'Personal')->get(),
            'workouts'          => Workout::all(),
            'selected_workouts' => $user->workouts()->get(),
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

        return redirect()->route('users.index');
    }

    public function update(Request $request, User $user)
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

        $user->update([
            'name'        => $request->name,
            'email'       => $request->email,
            'role'        => $request->role,
            'personal_id' => $request->personal ?? null,
        ]);

        // Relation
        $user->workouts()->detach();
        if ($request->workouts) {
            foreach ($request->workouts as $workout) {
                $user->workouts()->attach($workout);
            }
        }

        return redirect()->route('users.index');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->back()->with('message', 'Usuário deletado com sucesso.');
    }
}
