<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InstalacionesSeeder extends Seeder
{
    public function run(): void
    {
        $instalaciones = [];

        for ($gym = 1; $gym <= 15; $gym++) {
            $instalaciones = array_merge($instalaciones, [
                [
                    'nombre_instalacion' => 'Piscina',
                    'id_gimnasio' => $gym,
                    'horario_lun_vie' => '10:00h – 21:00h',
                    'horario_sab_dom_fest' => '08:00h - 21:00h',
                    'aforo_actual' => 0,
                    'aforo_limite' => 15,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'nombre_instalacion' => 'Sauna',
                    'id_gimnasio' => $gym,
                    'horario_lun_vie' => '10:00h – 21:00h',
                    'horario_sab_dom_fest' => '08:00h - 21:00h',
                    'aforo_actual' => 0,
                    'aforo_limite' => 6,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'nombre_instalacion' => 'Pista de Padel',
                    'id_gimnasio' => $gym,
                    'horario_lun_vie' => '10:00h – 21:00h',
                    'horario_sab_dom_fest' => '08:00h - 21:00h',
                    'aforo_actual' => 0,
                    'aforo_limite' => 4,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'nombre_instalacion' => 'Pista de Baloncesto',
                    'id_gimnasio' => $gym,
                    'horario_lun_vie' => '10:00h – 21:00h',
                    'horario_sab_dom_fest' => '08:00h - 21:00h',
                    'aforo_actual' => 0,
                    'aforo_limite' => 10,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }

        DB::table('instalaciones')->insert($instalaciones);
    }
}