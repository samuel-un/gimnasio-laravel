<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GimnasiosTableSeeder extends Seeder
{
    public function run(): void
    {
        // Insertar gimnasios con el nuevo formato de nombre
        DB::table('gimnasios')->insert([
            ['nombre' => 'V.A.L GYM Madrid', 'provincia' => 'Madrid', 'direccion' => 'Calle de la Libertad, 23', 'horario_lectivo' => 'Lunes a Viernes: 7:00 - 21:00', 'horario_festivo' => 'Sábados: 9:00 - 15:00'],
            ['nombre' => 'V.A.L GYM Barcelona', 'provincia' => 'Barcelona', 'direccion' => 'Avenida Diagonal, 158', 'horario_lectivo' => 'Lunes a Viernes: 6:00 - 22:00', 'horario_festivo' => 'Domingos: Cerrado'],
            ['nombre' => 'V.A.L GYM Valencia', 'provincia' => 'Valencia', 'direccion' => "Carrer de l'Esport, 5", 'horario_lectivo' => 'Lunes a Viernes: 8:00 - 20:00', 'horario_festivo' => 'Sábados: 10:00 - 14:00'],
            ['nombre' => 'V.A.L GYM Sevilla', 'provincia' => 'Sevilla', 'direccion' => 'Calle Feria, 74', 'horario_lectivo' => 'Lunes a Viernes: 7:30 - 22:00', 'horario_festivo' => 'Sábados: 9:00 - 13:00'],
            ['nombre' => 'V.A.L GYM Zaragoza', 'provincia' => 'Zaragoza', 'direccion' => 'Calle de César Augusto, 12', 'horario_lectivo' => 'Lunes a Viernes: 6:30 - 21:00', 'horario_festivo' => 'Domingos: 10:00 - 14:00'],
            ['nombre' => 'V.A.L GYM Málaga', 'provincia' => 'Málaga', 'direccion' => 'Calle El Limonar, 4', 'horario_lectivo' => 'Lunes a Viernes: 7:00 - 20:30', 'horario_festivo' => 'Sábados: 9:00 - 18:00'],
            ['nombre' => 'V.A.L GYM Bilbao', 'provincia' => 'Bilbao', 'direccion' => 'Gran Vía, 48', 'horario_lectivo' => 'Lunes a Viernes: 6:30 - 23:00', 'horario_festivo' => 'Domingos: 10:00 - 14:00'],
            ['nombre' => 'V.A.L GYM Alicante', 'provincia' => 'Alicante', 'direccion' => 'Avenida de Dénia, 20', 'horario_lectivo' => 'Lunes a Viernes: 7:30 - 22:30', 'horario_festivo' => 'Sábados: 9:00 - 14:00'],
            ['nombre' => 'V.A.L GYM Valencia', 'provincia' => 'Valencia', 'direccion' => 'Carrer de la Pau, 16', 'horario_lectivo' => 'Lunes a Viernes: 8:00 - 20:00', 'horario_festivo' => 'Domingos: Cerrado'],
            ['nombre' => 'V.A.L GYM Madrid', 'provincia' => 'Madrid', 'direccion' => 'Calle de Alcalá, 135', 'horario_lectivo' => 'Lunes a Viernes: 7:00 - 22:00', 'horario_festivo' => 'Sábados: 9:00 - 17:00'],
            ['nombre' => 'V.A.L GYM Murcia', 'provincia' => 'Murcia', 'direccion' => 'Calle del Sol, 25', 'horario_lectivo' => 'Lunes a Viernes: 7:00 - 21:00', 'horario_festivo' => 'Sábados: 10:00 - 13:00'],
            ['nombre' => 'V.A.L GYM Palma de Mallorca', 'provincia' => 'Palma de Mallorca', 'direccion' => 'Carrer de Jacint Verdaguer, 8', 'horario_lectivo' => 'Lunes a Viernes: 6:00 - 21:30', 'horario_festivo' => 'Domingos: 9:00 - 13:00'],
            ['nombre' => 'V.A.L GYM Vigo', 'provincia' => 'Vigo', 'direccion' => 'Avenida de Madrid, 35', 'horario_lectivo' => 'Lunes a Viernes: 7:00 - 21:00', 'horario_festivo' => 'Sábados: 10:00 - 14:00'],
            ['nombre' => 'V.A.L GYM Gijón', 'provincia' => 'Gijón', 'direccion' => 'Calle Corrida, 90', 'horario_lectivo' => 'Lunes a Viernes: 8:00 - 20:00', 'horario_festivo' => 'Domingos: Cerrado'],
            ['nombre' => 'V.A.L GYM Las Palmas', 'provincia' => 'Las Palmas', 'direccion' => 'Avenida Marítima, 55', 'horario_lectivo' => 'Lunes a Viernes: 6:30 - 21:00', 'horario_festivo' => 'Sábados: 9:00 - 18:00'],
        ]);
    }
}