<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();

            // Relaciones
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // profesor que la crea
            $table->foreignId('aula_id')->constrained();
            $table->foreignId('dispositivo_id')->constrained();

            // Datos principales
            $table->string('titulo');
            $table->text('descripcion');

            // Estado
            $table->enum('estado', ['pendiente', 'en_proceso', 'resuelta'])->default('pendiente');

            // Campos de resolución (añadidos aquí directamente)
            $table->text('comentario_resolucion')->nullable();
            $table->timestamp('fecha_resolucion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
};
