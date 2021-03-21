<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class DashboardService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function getUsers() : Collection
    {
        if (Auth::user()->isAdmin()) {
            $users = $this->userRepository->getAll();
        } elseif (Auth::user()->isPersonal()) {
            $users = $this->userRepository->findByPersonalId(Auth::user()->id);
        } else {
            $users = null;
        }
        
        return $users;
    }
}
