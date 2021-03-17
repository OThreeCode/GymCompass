<?php

namespace Database\Factories;

use App\Models\Workout;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkoutFactory extends Factory
{
    protected $model = Workout::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'day'  => $this->faker->randomElement($array = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday')),
        ];
    }
}
