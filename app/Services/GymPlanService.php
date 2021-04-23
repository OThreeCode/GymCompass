<?php

namespace App\Services;

use App\Models\SubsManager\Plan;
use App\Repositories\GymPlanRepository;
use App\SubsManager\Services\PlanService;
use Illuminate\Validation\Rule;

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
            'payment_method' => 'required', Rule::in(Plan::PAYMENTS_ALLOWED),
            'duration'       => 'required', Rule::in(Plan::PLANS_DURATION),
        ];
    }
}
