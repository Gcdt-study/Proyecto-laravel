<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AulaSeeder::class,
            DispositivoSeeder::class,
            UserSeeder::class,
            ProfesorSeeder::class,
        ]);
    }
}
