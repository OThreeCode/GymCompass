<?php

namespace App\Repositories;

use App\Models\SubsManager\Product;
use App\SubsManager\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class BookRepository extends ProductRepository
{
    public function getAll() : Collection
    {
        return Product::all();
    }
    
    public function save(array $data) : Product
    {
        return Product::create([
            'title'       => $data['title'],
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
