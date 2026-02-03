<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profesor;
use App\Models\User;

class ProfesorSeeder extends Seeder
{
    public function run(): void
    {
        // Profesor normal
        Profesor::factory()->create([
            'user_id' => User::where('email', 'profesor@example.com')->first()->id,
            'es_tde' => false,
        ]);

        // TDE
        Profesor::factory()->create([
            'user_id' => User::where('email', 'tde@example.com')->first()->id,
            'es_tde' => true,
        ]);
    }
}
