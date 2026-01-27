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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // profesor que la crea
            $table->foreignId('aula_id')->constrained();
            $table->foreignId('dispositivo_id')->constrained();
            $table->string('titulo');
            $table->text('descripcion');
            $table->enum('estado', ['pendiente', 'en_proceso', 'resuelta'])->default('pendiente');
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
