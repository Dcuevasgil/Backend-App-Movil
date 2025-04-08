<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuarios');
            $table->string('nombre', 45)->nullable();
            $table->string('correo', 45)->nullable();
            $table->string('contraseña', 8)->nullable();
            $table->text('descripcion_personal')->nullable();
            $table->string('foto_perfil', 255)->nullable();
            $table->string('imagen_cabecera', 255)->nullable();
            $table->foreignId('id_genero')->constrained('genero');
            $table->foreignId('id_ciudad')->constrained('ciudad');
            $table->string('genero', 45);
            $table->string('nombre_ciudad', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
