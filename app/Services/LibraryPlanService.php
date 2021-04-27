<?php

namespace App\Services;

use App\Models\SubsManager\Plan;
use App\Repositories\LibraryPlanRepository;
use App\SubsManager\Services\PlanService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;

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
      
    protected function rules() : array
    {
        return [
         'name'           => 'required|string',
         'price'          => 'required|float',
         'payment_method' => 'required', Rule::in(Plan::PAYMENTS_ALLOWED),
         'duration'       => 'required', Rule::in(Plan::PLANS_DURATION),
         'due_date'       => 'required',
      ];
    }
}
