<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActividadesGrupalesSeeder extends Seeder
{
    public function run(): void
    {
        $foro_limite_map = [
            'Zumba' => 50,
            'Pilates' => 30,
            'Deportes de contacto' => 40,
            'Circuitos de entrenamiento personal' => 20,
        ];

        for ($gym = 1; $gym <= 15; $gym++) {

            $zumbaTrainerId = DB::table('entrenadores')
                ->where('id_gimnasio', $gym)
                ->where('nombre', 'Lucía González')
                ->value('id_entrenador');

            $pilatesTrainerId = DB::table('entrenadores')
                ->where('id_gimnasio', $gym)
                ->where('nombre', 'Ana López')
                ->value('id_entrenador');

            $deportesTrainerId = DB::table('entrenadores')
                ->where('id_gimnasio', $gym)
                ->where('nombre', 'Pedro Sánchez')
                ->value('id_entrenador');

            $circuitosTrainerId = DB::table('entrenadores')
                ->where('id_gimnasio', $gym)
                ->where('nombre', 'David García')
                ->value('id_entrenador');

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