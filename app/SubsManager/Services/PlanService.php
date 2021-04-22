<?php

namespace App\SubManager\Services;

use App\Models\SubsManager\Plan;
use App\SubsManager\Repositories\PlanRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class PlanService
{
    public function save(array $data) : Plan
    {
        $validator = Validator::make($data, $this->rules());
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
        
        return (new PlanRepository)->save($data);
    }

    public function update(Plan $plan, array $data) : Plan
    {
        $validator = Validator::make($data, $this->rules());
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
        
        return (new PlanRepository)->update($plan, $data);
    }

    public function delete(Plan $plan) : void
    {
        (new PlanRepository)->delete($plan);
    }

    abstract protected function rules() : array;
}
