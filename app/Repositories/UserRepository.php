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

    public function save(array $data) : User
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function update(User $user, array $data) : User
    {
        $user->update([
            'name'        => $data['name'],
            'email'       => $data['email'],
        ]);

        return $user;
    }

    public function delete(User $user) : void
    {
        $user->delete();
    }
}
