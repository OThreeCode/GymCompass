<?php

namespace App\Repositories;

use App\SubsManager\Repositories\PlanRepository;
use App\Models\SubsManager\Plan;

class GymPlanRepository extends PlanRepository
{
    public function save(array $data) : Plan
    {
        return Plan::create([
            'name'           => $data['name'],
            'payment_method' => $data['payment_method'],
            'duration'       => $data['duration'],
        ]);
    }

    public function delete(Plan $plan) : void
    {
        $plan->delete();
    }
}
