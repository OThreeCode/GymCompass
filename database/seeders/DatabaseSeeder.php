<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Users
        $this->call(UserSeeder::class);
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
    }
}
