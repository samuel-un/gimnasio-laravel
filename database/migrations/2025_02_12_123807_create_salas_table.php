<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->id('id_sala');
            $table->foreignId('id_gimnasio')->constrained('gimnasios')->onDelete('cascade');
            $table->string('nombre_sala', 100);
            $table->text('descripcion')->nullable();
            $table->unsignedInteger('aforo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salas');
    }
};
