<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Exercise;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Admin
        $this->call(UserSeeder::class);

        // Users
        $personals = User::factory()
            ->count(9)
            ->create([
                'role' => 'Personal'
            ]);

        foreach ($personals as $personal) {
            $i = 0;
            while ($i < 2) {
                $client = User::factory()->create();
                $personal->clients()->save($client);
                $i++;
            }
        }

        // Exercises
        Exercise::factory()->count(10)->create();

        // Workouts
        $workouts = Workout::factory()->count(8)->create();
        
        foreach ($workouts as $workout) {
            $i = 0;
            while ($i < 2) {
                $exercise = Exercise::inRandomOrder()->first();
                $workout->exercises()->attach($exercise);
                $i++;
            }
        }

        // Attendace
        Attendance::factory()->count(500)->create();
    }
}
