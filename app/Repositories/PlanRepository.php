<?php

namespace App\Repositories;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class PlanRepository
{
    public function getAll() : Collection
    {
        return Plan::all();
    }

    public function save(array $data) : Plan
    {
        return Plan::create([
            'name'           => $data['name'],
            'payment_method' => $data['payment_method'],
            'duration'       => $data['duration'],
        ]);
    }

    public function update(Plan $plan, array $data) : Plan
    {
        $plan->update([
            'name'           => $data['name'],
            'payment_method' => $data['payment_method'],
            'duration'       => $data['duration'],
        ]);

        // Relation
        $plan->products()->detach();
        if ($data['products']) {
            foreach ($data['products'] as $products) {
                $plan->products()->attach($products);
            }
        }

        return $plan;
    }

    public function delete(Plan $plan) : void
    {
        $plan->delete();
    }
}
