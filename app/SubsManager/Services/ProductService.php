<?php

namespace App\SubManager\Services;

use App\Models\SubsManager\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class ProductService
{
    public function save(array $data) : Product
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
        
        return (new ProductRepository)->save($data);
    }

    public function update(Product $product, array $data) : Product
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
        
        return (new ProductRepository)->update($product, $data);
    }

    abstract protected function rules() : array;
}
