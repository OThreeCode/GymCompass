<?php

namespace App\SubsManager\Services;

use App\Models\SubsManager\Product;
use App\SubsManager\Repositories\ProductRepository;
use Illuminate\Support\Collection;

abstract class ProductService
{
    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    abstract protected function getAll() : Collection;

    abstract protected function save(array $data) : Product;

    abstract protected function update(Product $product, array $data) : Product;

    abstract protected function delete(Product $product);

    abstract protected function rules() : array;
}
