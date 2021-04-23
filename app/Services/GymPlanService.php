<?php

namespace App\Services;

use App\Repositories\GymPlanRepository;
use App\SubsManager\Services\PlanService;

class GymPlanService extends PlanService
{
    private GymPlanRepository $gymRepository;

    public function __construct()
    {
        $this->gymRepository = new GymPlanRepository;
    }

    protected function rules() : array
    {
        return [
            'name'           => 'required|string',
            'payment_method' => 'required',
            'exercises'      => 'required',
        ];
    }
}
