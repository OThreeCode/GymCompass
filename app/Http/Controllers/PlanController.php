<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Services\PlanService;
use App\Repositories\PlanRepository;
use App\Repositories\ProductRepository;

class PlanController extends Controller
{
    private PlanService $service;
    private PlanRepository $repository;
    private ProductRepository $productRepository;

    public function __construct()
    {
        $this->service           = new PlanService();
        $this->repository        = new PlanRepository();
        $this->productRepository = new ProductRepository();
    }

    public function index()
    {
    }

    public function create()
    {
    }

    public function show()
    {
    }

    public function store(Request $request)
    {
    }

    public function update(Request $request, Plan $plan)
    {
    }

    public function destroy(Plan $plan)
    {
    }
}
