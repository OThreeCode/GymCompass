<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Carbon\Carbon;

class DashboardController extends Controller
{
    private DashboardService $service;

    public function __construct()
    {
        $this->service = new DashboardService();
    }

    public function home()
    {
        try {
            $users = $this->service->getUsers();
            $statistics = [];
            if (count($users) === 1) {
                $current_date = Carbon::now();

                // Current Month
                $current_weekdays = $this->service->howManyWeekdays($current_date->clone()->startOfMonth(), $current_date);
                $user_workout_days = $this->service->howManyWorkoutDaysByMonth($users[0]->id, $current_date);
                $current_month_perc = round(($user_workout_days/$current_weekdays) * 100, 1);
                $month = [
                    'name' => $current_date->format('F'),
                    'percentage' => $current_month_perc,
                ];
                array_push($statistics, $month);

                // Past Five Month
                for ($i = 1; $i <= 5; $i++) {
                    $current_weekdays = $this->service->howManyWeekdays($current_date->clone()->subMonth($i)->startOfMonth(), $current_date->clone()->endOfMonth());
                    $user_workout_days = $this->service->howManyWorkoutDaysByMonth($users[0]->id, $current_date->clone()->subMonth($i));
                    $current_month_perc = round(($user_workout_days/$current_weekdays) * 100, 1);
                    $month = [
                        'name' => $current_date->clone()->subMonth($i)->format('F'),
                        'percentage' => $current_month_perc,
                    ];
                    array_push($statistics, $month);
                }
            }
            return view('home', [
                'users' => $users,
                'statistics' => $statistics ?? null,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar usuários.');
        }
    }
}
