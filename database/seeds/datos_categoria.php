<?php

use Illuminate\Database\Seeder;

class datos_categoria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria')->insert([
        	['nombre_categoria' => 'Romance'],
        	['nombre_categoria' => 'Misterio'],
        	['nombre_categoria' => 'Ficción'],
        	['nombre_categoria' => 'Aventura'],
        	['nombre_categoria' => 'Crimen'],
        	['nombre_categoria' => 'Espiritual'],
        	['nombre_categoria' => 'Distopía'],
        	['nombre_categoria' => 'Poesía'],
        	['nombre_categoria' => 'Fantasía'],
        	['nombre_categoria' => 'Historia'],
        	['nombre_categoria' => 'Tendencias'],
        	['nombre_categoria' => 'Otro']
        	]);
    }
}
