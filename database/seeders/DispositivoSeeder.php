<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DispositivoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dispositivos')->insert([
            ['nombre' => 'PC'],
            ['nombre' => 'Proyector'],
            ['nombre' => 'Impresora'],
            ['nombre' => 'Pantalla Interactiva'],
            ['nombre' => 'Router'],
            ['nombre' => 'Switch'],
            ['nombre' => 'Altavoces'],
        ]);
    }
}
