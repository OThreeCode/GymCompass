<?php

namespace App\Repositories;

use App\Models\Workout;
use Illuminate\Database\Eloquent\Collection;

class WorkoutRepository
{
    public function getAll() : Collection
    {
        return Workout::all();
    }

    public function save(array $data) : Workout
    {
        $days = implode('; ', $data['days']);

        $workout = Workout::create([
            'name' => $data['name'],
            'day'  => $days,
        ]);

        foreach ($data['exercises'] as $exercise) {
            $workout->exercises()->attach($exercise);
        }

        return $workout;
    }

    public function update(Workout $workout, array $data) : Workout
    {
        $days = implode('; ', $data['days']);

        $workout->update([
            'name' => $data['name'],
            'day'  => $days,
        ]);

        // Relation
        $workout->exercises()->detach();
        foreach ($data['exercises'] as $exercise) {
            $workout->exercises()->attach($exercise);
        }

        return $workout;
    }

    public function delete(Workout $workout) : void
    {
        $workout->delete();
    }
}