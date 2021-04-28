<?php

namespace App\Repositories;

use App\SubsManager\Repositories\ProductRepository;
use App\Models\SubsManager\Product;
use Illuminate\Database\Eloquent\Collection;

class GymProductRepository extends ProductRepository
{
    public function getAll() : Collection
    {
        return Product::all();
    }

    public function save(array $data) : Product
    {
        return Product::create([
            'name'        => $data['name'],
            'description' => $data['description'],
        ]);
    }

    public function update(Product $product, array $data) : Product
    {
        $product->update($data);

        return $product;
    }

    public function delete(Product $product) : void
    {
        $product->delete();
    }
}
