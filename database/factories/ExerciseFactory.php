<?php

namespace Database\Factories;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseFactory extends Factory
{
    protected $model = Exercise::class;

    public function definition()
    {
        return [
            'name'         => $this->faker->name,
            'muscle_group' => $this->faker->randomElement($array = array('Dorsal', 'Peitoral', 'Quadríceps', 'Deltóides', 'Isquiotibiais', 'Bíceps', 'Tríceps')),
            'sets'         => $this->faker->randomDigit(),
            'reps'         => $this->faker->randomDigit(),
            'rest'         => $this->faker->numberBetween($min = 10, $max = 60),
            'equipment'    => $this->faker->name,
        ];
    }
}
