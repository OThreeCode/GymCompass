<?php

namespace App\Services;

use App\Models\SubsManager\Plan;
use App\Repositories\LibraryPlanRepository;
use App\SubsManager\Services\PlanService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LibraryPlanService extends PlanService
{
    private LibraryPlanRepository $libraryRepository;

    public function __construct()
    {
        $this->libraryRepository = new LibraryPlanRepository;
    }

    public function getAll() : Collection
    {
        $plans = $this->libraryRepository->getAll();

        return $plans;
    }

    public function save(array $data) : Plan
    {
        $validator = Validator::make($data, $this->rules());
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return $this->libraryRepository->save($data);
    }

    public function update(Plan $plan, array $data) : Plan
    {
        $validator = Validator::make($data, $this->rules());
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
        
        return $this->libraryRepository->update($plan, $data);
    }
      
    protected function rules() : array
    {
        return [
            'name'           => 'required|string',
            'price'          => 'required',
            'payment_method' => 'required', Rule::in(Plan::PAYMENTS_ALLOWED),
            'duration'       => 'required', Rule::in(Plan::PLANS_DURATION),
            'products'       => 'required',
        ];
    }
}
