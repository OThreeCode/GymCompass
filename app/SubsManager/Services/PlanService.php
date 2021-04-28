<?php

namespace App\SubsManager\Services;

use App\Models\SubsManager\Plan;
use App\SubsManager\Repositories\PlanRepository;
use Illuminate\Database\Eloquent\Collection;

abstract class PlanService
{
    public function __construct()
    {
        $this->repository = new PlanRepository();
    }

    abstract protected function getAll() : Collection;
    
    abstract protected function save(array $data) : Plan;

    abstract protected function update(Plan $plan, array $data) : Plan;

    abstract protected function delete(Plan $plan) : void;

    abstract protected function rules() : array;
}
