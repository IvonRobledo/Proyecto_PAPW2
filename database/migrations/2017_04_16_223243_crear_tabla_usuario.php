<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nombre', 50);
            $table->string('email', 50);
            $table->string('password');
            $table->date('fechaNac');
            $table->enum('genero', array('hombre', 'mujer'));
            $table->text('biografia')->nullable();
            $table->string('nombreFotoP')->nullable();
            $table->string('extFotoP')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
