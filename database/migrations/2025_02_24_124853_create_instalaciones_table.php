<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
		Schema::create('instalaciones', function (Blueprint $table) {
			$table->id('id_instalacion');
			$table->foreignId('id_gimnasio')->constrained('gimnasios')->onDelete('cascade');
			$table->string('nombre_instalacion', 100);
			$table->string('horario_lun_vie', 50);
			$table->string('horario_sab_dom_fest', 50);
			$table->unsignedInteger('aforo_actual')->default(0);
			$table->unsignedInteger('aforo_limite');
			$table->timestamps();
		});
    }

    public function down(): void
    {
        Schema::dropIfExists('instalaciones');
    }
};