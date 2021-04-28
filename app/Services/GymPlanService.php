<?php

namespace App\Services;

use App\Models\SubsManager\Plan;
use App\Repositories\GymPlanRepository;
use App\SubsManager\Services\PlanService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class GymPlanService extends PlanService
{
    private GymPlanRepository $gymRepository;

    public function __construct()
    {
        $this->gymRepository = new GymPlanRepository;
    }

    public function getAll() : Collection
    {
        $plans = $this->gymRepository->getAll();

        return $plans;
    }

    public function save(array $data) : Plan
    {
        $validator = Validator::make($data, $this->rules());
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
        
        return $this->gymRepository->save($data);
    }

    public function update(Plan $plan, array $data) : Plan
    {
        $validator = Validator::make($data, $this->rules());
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
        
        return $this->gymRepository->update($plan, $data);
    }

    public function delete(Plan $plan) : void
    {
        $this->gymRepository->delete($plan);
    }

    protected function rules() : array
    {
        return [
            'name'           => 'required|string',
            'price'          => 'required',
            'payment_method' => 'required', Rule::in(Plan::PAYMENTS_ALLOWED),
            'duration'       => 'required', Rule::in(Plan::PLANS_DURATION),
        ];
    }
}
