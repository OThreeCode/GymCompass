<?php

namespace App\Repositories;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Collection;

class ExerciseRepository
{
    public function getAll() : Collection
    {
        return Exercise::all();
    }

    public function save(array $data) : Exercise
    {
        return Exercise::create([
            'name'         => $data['name'],
            'muscle_group' => $data['muscle_group'],
            'sets'         => $data['sets'],
            'reps'         => $data['reps'],
            'rest'         => $data['rest'],
            'equipment'    => $data['equipment'],
        ]);
    }

    public function update(Exercise $exercise, array $data) : Exercise
    {
        $exercise->update($data);
        return $exercise;
    }

    public function delete(Exercise $exercise) : void
    {
        $exercise->delete();
    }
}