<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaResena extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resena', function (Blueprint $table) {
            $table->increments('id_resena');
            $table->string('titulo', 100);
            $table->string('autor', 100);
            $table->integer('anio')->nullable();
            $table->integer('paginas')->nullable();
            $table->string('nombreFoto')->nullable();
            $table->string('extFoto', 50)->nullable();
            $table->mediumText('textoResena');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->timestamps('fecha');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resena');
    }
}
