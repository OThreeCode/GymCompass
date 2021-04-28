<?php

namespace App\Repositories;

use App\Models\SubsManager\Plan;
use App\Models\SubsManager\Product;
use App\SubsManager\Repositories\PlanRepository;

class LibraryPlanRepository extends PlanRepository
{
    public function __construct()
    {
        // Intentionally left blank
    }

    public function save(array $data) : Plan
    {
        $plan = Plan::create([
            'name'           => $data['name'],
            'price'          => $data['price'],
            'payment_method' => $data['payment_method'],
            'duration'       => $data['duration'],
            'due_date'       => now(),
        ]);

        $product = Product::find($data['product']);
        $plan->products()->attach($product);

        return $plan;
    }

    public function update(Plan $plan, array $data) : Plan
    {
        $plan->update([
            'name'           => $data['name'],
            'price'          => $data['price'],
            'payment_method' => $data['payment_method'],
            'duration'       => $data['duration'],
            'due_date'       => $data['due_date'],
        ]);

        $plan->products()->detach();
        $product = Product::find($data['product']);
        $plan->products()->attach($product);

        return $plan;
    }
}
