<?php

namespace App\Services;

use App\SubsManager\Services\ProductService;
use App\Repositories\GymProductRepository;

class GymProductService extends ProductService
{
    private GymProductRepository $gymRepository;

    public function __construct()
    {
        $this->gymRepository = new GymProductRepository;
    }
    
    protected function rules() : array
    {
        return [
            'name'        => 'required',
            'description' => 'required',
        ];
    }
}
