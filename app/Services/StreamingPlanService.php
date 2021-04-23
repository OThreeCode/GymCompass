<?php

namespace App\Services;

use App\Models\SubsManager\Plan;
use App\Repositories\StreamingPlanRepository;
use App\SubsManager\Services\PlanService;
use Illuminate\Validation\Rule;

class LibraryPlanService extends PlanService
{
    private StreamingPlanRepository $streamingRepository;

    public function __construct()
    {
        $this->streamingRepository = new StreamingPlanRepository;
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
