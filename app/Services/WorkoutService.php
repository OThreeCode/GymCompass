<?php

namespace App\Services;

use App\Models\Workout;
use App\Repositories\WorkoutRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class WorkoutService
{
    public function save(array $data) : Workout
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return (new WorkoutRepository)->save($data);
    }

    public function update(Workout $workout, array $data) : Workout
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return (new WorkoutRepository)->update($workout, $data);        
    }

    public function delete(Workout $workout) : void
    {
        (new WorkoutRepository)->delete($workout);
    }

    protected function rules() : array
    {
        return [
            'name'      => 'required|string',
            'days'      => 'required',
            'exercises' => 'required',
        ];
    }
}