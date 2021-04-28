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
            'price'          => $data['price'],
            'payment_method' => $data['payment_method'],
            'duration'       => $data['duration'],
            'due_date'       => now(),
        ]);
    }

    public function delete(Plan $plan) : void
    {
        $plan->delete();
    }
}
