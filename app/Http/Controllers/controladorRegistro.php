<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controladorRegistro extends Controller
{
    public function store(Request $request)
	{
	    \App\User::create([
	    	'name'=>$request['usuario'],
	    	'email'=>$request['correo'],
	    	'fechaNac'=>$request['fechaNac'],
	    	'genero'=>$request['genero'],
	    	'nombreFotoP'=>'perfil_default.png',
	    	'password'=>bcrypt($request['contrasena']),

	    	]);

	    return redirect('Perfil');
	}
}
