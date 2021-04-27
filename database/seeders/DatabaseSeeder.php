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
        User::factory()
            ->count(9)
            ->create([
                'role' => 'Client'
            ]);
    }
}
