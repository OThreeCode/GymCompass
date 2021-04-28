<?php

namespace App\SubsManager\Repositories;

use App\Models\SubsManager\Plan;
use App\Models\SubsManager\Product;
use Illuminate\Database\Eloquent\Collection;

class PlanRepository
{
    public function getAll() : Collection
    {
        return Plan::all();
    }

    public function save(array $data) : Plan
    {
        $plan = Plan::create([
            'name'           => $data['name'],
            'price'          => $data['price'],
            'payment_method' => $data['payment_method'],
            'duration'       => $data['duration'],
            'due_date'       => $data['due_date'],
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
