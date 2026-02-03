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
    Schema::table('dispositivos', function (Blueprint $table) {
        $table->foreignId('aula_id')->nullable()->constrained()->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
public function down()
{
    Schema::table('dispositivos', function (Blueprint $table) {
        $table->dropForeign(['aula_id']);
        $table->dropColumn('aula_id');
    });
}

};
