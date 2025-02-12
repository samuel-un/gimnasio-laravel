<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('actividades_grupales', function (Blueprint $table) {
            $table->id('id_actividad'); // Clave primaria 'id_actividad'
            $table->string('nombre_actividad', 100);
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('id_entrenador');
            // Se referencia 'id_entrenador' de la tabla 'entrenadores'
            $table->foreign('id_entrenador')
                  ->references('id_entrenador')->on('entrenadores')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('id_sala');
            // Se referencia 'id_sala' de la tabla 'salas'
            $table->foreign('id_sala')
                  ->references('id_sala')->on('salas')
                  ->onDelete('cascade');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('actividades_grupales');
    }
};
