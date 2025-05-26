<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Crear la tabla de localidades
        Schema::create('localidades', function (Blueprint $table) {
            $table->id('id_localidad'); // Clave primaria
            $table->string('nombre_localidad', 255); // Nombre de la localidad
            $table->timestamps(); // Fecha de creación y actualización
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('localidades');
    }
};
