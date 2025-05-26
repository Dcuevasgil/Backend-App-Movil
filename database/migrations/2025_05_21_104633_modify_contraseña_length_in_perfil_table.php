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
        Schema::table('perfil', function (Blueprint $table) {
            // Amplía la longitud de 'contraseña' a 255 caracteres
            $table->string('contraseña', 255)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perfil', function (Blueprint $table) {
            // Reviertes a varchar(45) si hiciera falta
            $table->string('contraseña', 45)->change();
        });
    }
};
