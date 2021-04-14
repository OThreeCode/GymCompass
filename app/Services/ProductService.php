<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductService
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

    protected function rules()
    {
        return [
            'name'        => 'required',
            'description' => 'required',
        ];
    }
}
