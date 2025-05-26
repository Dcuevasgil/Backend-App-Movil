<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Crear la tabla de perfiles
        Schema::create('perfil', function (Blueprint $table) {
            $table->id('id_perfil'); // Clave primaria
            $table->string('nombre', 20); // Nombre del usuario
            $table->string('apellido', 30);
            $table->string('nick', 12);
            $table->string('correo', 255); // Correo del usuario (max 255 caracteres)
            $table->string('contraseña', 255); // Contraseña (max 255 caracteres)
            $table->text('descripcion_personal')->nullable(); // Descripción personal
            $table->enum('sexo', ['H', 'M']); // Sexo del usuario
            $table->text('foto_usuario')->nullable(); // Foto de perfil
            $table->timestamp('fecha_creacion')->useCurrent(); // Fecha de creación
            $table->foreignId('localidad_id')->constrained('localidades')->onDelete('cascade'); // Relación con la tabla localidades
            $table->timestamps(); // Fecha de creación y actualización
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfil');
    }
};
