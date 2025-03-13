<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PerfilesTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('es_ES');

        $gimnasios = DB::table('gimnasios')->pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('perfiles')->insert([
                'id_usuario' => $index,
                'id_gimnasio' => $faker->randomElement($gimnasios),
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