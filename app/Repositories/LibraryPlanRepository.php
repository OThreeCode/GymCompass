<?php

namespace App\Repositories;

use App\Models\SubsManager\Plan;
use App\SubsManager\Repositories\PlanRepository;

class LibraryPlanRepository extends PlanRepository
{
    public function save(array $data) : Plan
    {
        return Plan::create([
            'name'           => $data['name'],
            'price'          => $data['price'],
            'payment_method' => $data['payment_method'],
            'duration'       => $data['duration'],
            'due_date'       => $data['due_date'],
        ]);
    }

    public function delete(Plan $plan) : void
    {
        $plan->delete();
    }
}
