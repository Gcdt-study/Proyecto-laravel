<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('profesores', function (Blueprint $table) {
            if (!Schema::hasColumn('profesores', 'nombre')) {
                $table->string('nombre')->after('user_id');
            }

            if (!Schema::hasColumn('profesores', 'apellido')) {
                $table->string('apellido')->after('nombre');
            }

            if (!Schema::hasColumn('profesores', 'es_tde')) {
                $table->boolean('es_tde')->default(false)->after('apellido');
            }
        });
}

    public function down()
    {
        Schema::table('profesores', function (Blueprint $table) {
            $table->dropColumn(['nombre', 'apellido', 'es_tde']);
        });
    }

};
