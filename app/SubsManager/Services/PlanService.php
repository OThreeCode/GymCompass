<?php

namespace App\SubsManager\Services;

use App\Models\SubsManager\Plan;
use App\SubsManager\Repositories\PlanRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class PlanService
{
    private PlanRepository $repository;

    public function __construct()
    {
        $this->repository = new PlanRepository();
    }

    public function getAll() : Collection
    {
        $plans = $this->repository->getAll();

        return $plans;
    }
    
    abstract protected function save(array $data) : Plan;

    abstract protected function update(Plan $plan, array $data) : Plan;

    public function delete(Plan $plan) : void
    {
        (new PlanRepository)->delete($plan);
    }

    abstract protected function rules() : array;
}
