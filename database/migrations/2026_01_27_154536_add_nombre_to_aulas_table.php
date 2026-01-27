<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('aulas', function (Blueprint $table) {
            $table->string('nombre')->after('id');
        });
    }

    public function down()
    {
        Schema::table('aulas', function (Blueprint $table) {
            $table->dropColumn('nombre');
        });
    }

};
