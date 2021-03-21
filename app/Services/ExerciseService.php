<?php

namespace App\Services;

use App\Models\Exercise;
use App\Repositories\ExerciseRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ExerciseService
{
    public function save(array $data) : Exercise
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return (new ExerciseRepository)->save($data);
    }

    public function update(Exercise $exercise, array $data) : Exercise
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return (new ExerciseRepository)->update($exercise, $data);        
    }

    public function delete(Exercise $exercise) : void
    {
        (new ExerciseRepository)->delete($exercise);
    }

    protected function rules() : array
    {
        return [
            'name'         => 'required|string',
            'muscle_group' => 'required',
            'sets'         => 'required|integer',
            'reps'         => 'required|integer',
            'rest'         => 'required|integer',
            'equipment'    => 'required|string',
        ];
    }
}