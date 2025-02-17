<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entrenadores', function (Blueprint $table) {
            $table->id('id_entrenador');
            $table->string('nombre', 100);
            $table->string('especialidad', 100)->nullable();
            $table->foreignId('id_gimnasio')->constrained('gimnasios')->onDelete('cascade');
            $table->text('horario_disponible')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entrenadores');
    }
};
