<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PerfilesTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('es_ES'); // Faker en español

        // Insertar perfiles para cada usuario
        foreach (range(1, 10) as $index) { // 10 usuarios, puedes modificarlo
            DB::table('perfiles')->insert([
                'id_usuario' => $index, // Se asume que los usuarios ya existen y sus IDs son 1 a 10
                'plan_membresia' => $faker->randomElement(['comfort', 'premium', 'ultimate']),
                'fecha_inicio_membresia' => $faker->date(),
                'fecha_fin_membresia' => $faker->date(),
                'estado_membresia' => $faker->randomElement(['activa', 'inactiva']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}