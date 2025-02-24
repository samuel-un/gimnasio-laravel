<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActividadesGrupalesSeeder extends Seeder
{
    public function run(): void
    {
        // Definir el aforo límite para cada actividad
        $foro_limite_map = [
            'Zumba' => 50,
            'Pilates' => 30,
            'Deportes de contacto' => 40,
            'Circuitos de entrenamiento personal' => 20,
        ];

        // Iteramos sobre cada gimnasio (suponiendo que hay 15 gimnasios)
        for ($gym = 1; $gym <= 15; $gym++) {

            // Obtener el id del entrenador de Cardio (para Zumba) en el gimnasio actual
            $zumbaTrainerId = DB::table('entrenadores')
                ->where('id_gimnasio', $gym)
                ->where('nombre', 'Lucía González')
                ->value('id_entrenador');

            // Obtener el id del entrenador de Pilates en el gimnasio actual
            $pilatesTrainerId = DB::table('entrenadores')
                ->where('id_gimnasio', $gym)
                ->where('nombre', 'Ana López')
                ->value('id_entrenador');

            // Obtener el id del entrenador de Boxeo (para Deportes de contacto) en el gimnasio actual
            $deportesTrainerId = DB::table('entrenadores')
                ->where('id_gimnasio', $gym)
                ->where('nombre', 'Pedro Sánchez')
                ->value('id_entrenador');

            // Obtener el id del entrenador de Crossfit (para Circuitos de entrenamiento personal) en el gimnasio actual
            $circuitosTrainerId = DB::table('entrenadores')
                ->where('id_gimnasio', $gym)
                ->where('nombre', 'David García')
                ->value('id_entrenador');

            // Insertar las 4 actividades para el gimnasio actual
            DB::table('actividades_grupales')->insert([
                [
                    'nombre_actividad' => 'Zumba',
                    'id_entrenador'     => $zumbaTrainerId,
                    'id_gimnasio'       => $gym,
                    'hora_inicio'       => '18:00:00',
                    'hora_fin'          => '19:00:00',
                    'foro_actual'       => 0,
                    'foro_limite'       => $foro_limite_map['Zumba'],
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],
                [
                    'nombre_actividad' => 'Pilates',
                    'id_entrenador'     => $pilatesTrainerId,
                    'id_gimnasio'       => $gym,
                    'hora_inicio'       => '10:00:00',
                    'hora_fin'          => '11:00:00',
                    'foro_actual'       => 0,
                    'foro_limite'       => $foro_limite_map['Pilates'],
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],
                [
                    'nombre_actividad' => 'Deportes de contacto',
                    'id_entrenador'     => $deportesTrainerId,
                    'id_gimnasio'       => $gym,
                    'hora_inicio'       => '17:00:00',
                    'hora_fin'          => '18:00:00',
                    'foro_actual'       => 0,
                    'foro_limite'       => $foro_limite_map['Deportes de contacto'],
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],
                [
                    'nombre_actividad' => 'Circuitos de entrenamiento personal',
                    'id_entrenador'     => $circuitosTrainerId,
                    'id_gimnasio'       => $gym,
                    'hora_inicio'       => '07:00:00',
                    'hora_fin'          => '08:00:00',
                    'foro_actual'       => 0,
                    'foro_limite'       => $foro_limite_map['Circuitos de entrenamiento personal'],
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],
            ]);
        }
    }
}