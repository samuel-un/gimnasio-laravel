<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Gimnasios', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre');
            $table->string('provincia');
            $table->string('direccion');
            $table->string('horario_lectivo');
            $table->string('horario_festivo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Gimnasios');
    }
};