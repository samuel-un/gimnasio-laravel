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

        // Luego llamar al seeder de instalaciones (antes que los entrenadores y actividades)
        $this->call(InstalacionesSeeder::class);

        // Luego llamar al seeder de usuarios
        $this->call(UsuariosTableSeeder::class);

        // Llamar al seeder de perfiles
        $this->call(PerfilesTableSeeder::class);

        // Llamar al seeder de entrenadores
        $this->call(EntrenadoresTableSeeder::class);

        // Finalmente, llamar al seeder de actividades grupales
        $this->call(ActividadesGrupalesSeeder::class);
    }
}