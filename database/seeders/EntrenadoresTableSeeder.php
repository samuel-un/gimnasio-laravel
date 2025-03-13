<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrenadoresTableSeeder extends Seeder
{
    public function run(): void
    {
        $entrenadores = [
            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 1, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 1, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 1, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 1, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 1, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 1, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 1, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 2, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 2, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 2, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 2, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 2, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 2, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 2, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 3, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 3, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 3, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 3, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 3, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 3, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 3, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 4, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 4, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 4, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 4, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 4, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 4, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 4, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 5, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 5, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 5, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 5, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 5, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 5, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 5, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 6, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 6, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 6, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 6, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 6, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 6, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 6, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 7, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 7, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 7, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 7, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 7, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 7, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 7, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 8, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 8, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 8, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 8, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 8, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 8, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 8, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 9, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 9, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 9, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 9, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 9, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 9, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 9, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 10, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 10, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 10, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 10, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 10, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 10, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 10, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 11, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 11, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 11, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 11, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 11, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 11, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 11, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 12, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 12, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 12, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 12, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 12, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 12, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 12, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 13, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 13, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 13, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 13, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 13, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 13, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 13, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 14, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 14, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 14, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 14, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 14, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 14, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 14, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],

            ['nombre' => 'Carlos Martínez', 'especialidad' => 'Musculación', 'id_gimnasio' => 15, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 14:00, 17:00 - 21:00'],
            ['nombre' => 'Lucía González', 'especialidad' => 'Cardio', 'id_gimnasio' => 15, 'horario_disponible' => 'Lunes a Viernes: 9:00 - 15:00'],
            ['nombre' => 'Pedro Sánchez', 'especialidad' => 'Boxeo', 'id_gimnasio' => 15, 'horario_disponible' => 'Lunes a Viernes: 10:00 - 18:00'],
            ['nombre' => 'María Fernández', 'especialidad' => 'Yoga', 'id_gimnasio' => 15, 'horario_disponible' => 'Lunes a Viernes: 7:00 - 9:00, Sábados: 10:00 - 12:00'],
            ['nombre' => 'Ana López', 'especialidad' => 'Pilates', 'id_gimnasio' => 15, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 14:00'],
            ['nombre' => 'David García', 'especialidad' => 'Crossfit', 'id_gimnasio' => 15, 'horario_disponible' => 'Lunes a Viernes: 8:00 - 16:00'],
            ['nombre' => 'Juan Pérez', 'especialidad' => 'Entrenamiento Funcional', 'id_gimnasio' => 15, 'horario_disponible' => 'Lunes a Viernes: 6:00 - 12:00'],
        ];

        DB::table('entrenadores')->insert($entrenadores);
    }
}