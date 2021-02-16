<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'OThree Code',
            'email' => 'othree@mail.com',
            'role' => 'Admin',
            'password' => bcrypt('secret'),
        ]);
    }
}
