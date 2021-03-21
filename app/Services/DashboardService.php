<?php

namespace App\Services;

use App\Models\Attendance;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class DashboardService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function getUsers() : ?Collection
    {
        if (Auth::user()->isAdmin()) {
            $users = $this->userRepository->getAll();
        } elseif (Auth::user()->isPersonal()) {
            $users = $this->userRepository->findByPersonalId(Auth::user()->id);
        } else {
            $users = $this->userRepository->findByClientId(Auth::user()->id);
        }
        
        return $users;
    }

    public function howManyWeekdays(Carbon $start, Carbon $end) : int
    {
        $days = $start->diffInDaysFiltered(function (Carbon $date) {
            return $date->isWeekday();
        }, $end);

        return $days;
    }

    public function howManyWorkoutDaysByMonth(int $user_id, Carbon $date)
    {
        return Attendance::query()->where('user_id', $user_id)
            ->whereBetween('time_out', [$date->clone()->startOfMonth()->format('Y-m-d H:i:s'), $date->clone()->endOfDay()->format('Y-m-d H:i:s')])
            ->count();
    }
}
