<?php

namespace App\Repositories;

use App\Models\SubsManager\Product;
use App\SubsManager\Repositories\ProductRepository;

class MusicRepository extends ProductRepository
{
    public function save(array $data) : Product
    {
        return Product::create([
            'title'    => $data['title'],
            'singer'   => $data['singer'],
            'album'    => $data['album'],
            'genre'    => $data['genre'],
            'duration' => $data['duration'],
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
