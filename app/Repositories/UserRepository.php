<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function getAll() : Collection
    {
        return User::all();
    }

    public function findById(int $id) : User
    {
        return User::find($id);
    }

    public function findByPersonalId(int $id) : Collection
    {
        return User::query()->where('personal_id', '=', $id)->get();
    }

    public function findByClientId(int $id) : Collection
    {
        return User::query()->where('id', $id)->get();
    }

    public function getUserPersonals() : Collection
    {
        return User::query()->where('role', 'Personal')->get();
    }

    public function save(array $data) : User
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'role'     => $data['role'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function update(User $user, array $data) : User
    {
        $user->update([
            'name'        => $data['name'],
            'email'       => $data['email'],
            'role'        => $data['role'],
            'personal_id' => $data['personal'] ?? null,
        ]);

        // Relation
        $user->workouts()->detach();
        if ($data['workouts']) {
            foreach ($data['workouts'] as $workout) {
                $user->workouts()->attach($workout);
            }
        }

        return $user;
    }

    public function delete(User $user) : void
    {
        $user->delete();
    }
}
