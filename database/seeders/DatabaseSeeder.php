<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamar al seeder de gimnasios primero
        $this->call(GimnasiosTableSeeder::class);

        // Luego llamar al seeder de usuarios
        $this->call(UsuariosTableSeeder::class);

        // Llamar al seeder de perfiles
        $this->call(PerfilesTableSeeder::class); // Asegúrate de tener el seeder de perfiles creado

        // Llamar al seeder de entrenadores
        $this->call(EntrenadoresTableSeeder::class);
    }
}