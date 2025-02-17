<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id('id_perfil');
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade');
            $table->enum('plan_membresia', ['comfort', 'premium', 'ultimate']);
            $table->date('fecha_inicio_membresia');
            $table->date('fecha_fin_membresia');
            $table->enum('estado_membresia', ['activa', 'inactiva']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfiles');
    }
};
