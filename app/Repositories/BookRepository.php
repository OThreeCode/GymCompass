<?php

namespace App\Repositories;

use App\Models\SubsManager\Product;
use App\SubsManager\Repositories\ProductRepository;

class BookRepository extends ProductRepository
{
    public function save(array $data) : Product
    {
        return Product::create([
            'name'        => $data['name'],
            'description' => $data['description'],
            'author'      => $data['author'],
            'genre'       => $data['genre'],
            'isbn'        => $data['isbn'],
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
