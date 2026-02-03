<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Profesor normal
        User::factory()->create([
            'name' => 'Profesor Demo',
            'email' => 'profesor@example.com',
            'password' => bcrypt('password'),
        ]);

        // TDE
        User::factory()->create([
            'name' => 'TDE Demo',
            'email' => 'tde@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
