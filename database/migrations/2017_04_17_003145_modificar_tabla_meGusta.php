<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificarTablaMeGusta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meGusta', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id_usuario')->on('usuario');
            $table->foreign('id_resena')->references('id_resena')->on('resena');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meGusta', function (Blueprint $table) {
            //
        });
    }
}
