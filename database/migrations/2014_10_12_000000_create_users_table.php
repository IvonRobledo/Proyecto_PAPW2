<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

 


            $table->string('name', 50);
            $table->string('email', 50);
            $table->string('password');
            $table->date('fechaNac');
            $table->enum('genero', array('hombre', 'mujer'));
            $table->text('biografia')->nullable();
            $table->string('nombreFotoP')->nullable();
            $table->string('extFotoP')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
