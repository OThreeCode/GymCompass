<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductService $service;
    private ProductRepository $repository;

    public function __construct()
    {
        $this->service    = new ProductService();
        $this->repository = new ProductRepository();
    }

    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Product $product)
    {
    }

    public function update()
    {
    }

    public function destroy(Product $product)
    {
    }
}
