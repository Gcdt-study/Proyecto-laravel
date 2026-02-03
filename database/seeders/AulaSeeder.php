<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AulaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('aulas')->insert([
            ['nombre' => 'Aula 101'],
            ['nombre' => 'Aula 102'],
            ['nombre' => 'Aula 103'],
            ['nombre' => 'Laboratorio 1'],
            ['nombre' => 'Laboratorio 2'],
            ['nombre' => 'Taller de Informática'],
        ]);
    }
}
