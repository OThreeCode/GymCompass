<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;

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
            return view('home', [
                'users' => $users,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar usuários.');
        }
    }
}
