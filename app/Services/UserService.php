<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class UserService
{
    private UserRepository $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function getAll() : Collection
    {
        $users = $this->repository->getAll();

        return $users;
    }

    public function save(array $data) : User
    {
        $validator = Validator::make($data, $this->rulesForStore());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return (new UserRepository)->save($data);
    }

    public function update(User $user, array $data) : User
    {
        $validator = Validator::make($data, $this->rulesForUpdate());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return (new UserRepository)->update($user, $data);
    }

    public function delete(User $user) : void
    {
        $this->repository->delete($user);
    }

    protected function rulesForStore() : array
    {
        return [
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ];
    }

    protected function rulesForUpdate() : array
    {
        return [
            'name'     => 'required|string',
            'email'    => 'required|string|email',
        ];
    }
}
