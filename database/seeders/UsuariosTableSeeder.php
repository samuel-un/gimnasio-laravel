<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsuariosTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('es_ES');

        DB::table('usuarios')->insert([
            'nombre' => 'Admin',
            'apellidos' => 'Ejemplo',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'telefono' => $this->generarTelefono(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach (range(1, 9) as $index) {
            DB::table('usuarios')->insert([
                'nombre' => $faker->firstName,
                'apellidos' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('12345678'),
                'telefono' => $this->generarTelefono(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function generarTelefono(): string
    {
        return (string) mt_rand(600000000, 699999999);
    }
}