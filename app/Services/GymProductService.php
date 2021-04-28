<?php

namespace App\Services;

use App\Models\SubsManager\Product;
use App\SubsManager\Services\ProductService;
use App\Repositories\GymProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class GymProductService extends ProductService
{
    private GymProductRepository $gymRepository;

    public function __construct()
    {
        $this->gymRepository = new GymProductRepository;
    }

    public function getAll() : Collection
    {
        return $this->gymRepository->getAll();
    }

    public function save(array $data) : Product
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
        
        return $this->gymRepository->save($data);
    }

    public function update(Product $product, array $data) : Product
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
        
        return $this->gymRepository->update($product, $data);
    }
    
    protected function rules() : array
    {
        return [
            'name'        => 'required',
            'description' => 'required',
        ];
    }
}
