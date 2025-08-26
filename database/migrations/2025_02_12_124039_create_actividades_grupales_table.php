<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('actividades_grupales', function (Blueprint $table) {
            $table->id('id_actividad');
            $table->string('nombre_actividad', 100);
            $table->unsignedBigInteger('id_entrenador');
            $table->foreign('id_entrenador')->references('id_entrenador')->on('entrenadores')->onDelete('cascade');
            $table->unsignedBigInteger('id_gimnasio');
            $table->foreign('id_gimnasio')->references('id')->on('gimnasios')->onDelete('cascade');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->integer('foro_actual')->default(0);
            $table->integer('foro_limite');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('actividades_grupales');
    }
};