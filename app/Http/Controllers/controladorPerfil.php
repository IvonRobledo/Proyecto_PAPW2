<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use App\User;

class controladorPerfil extends Controller
{
	public function update(Request $request)
	{
		$id = Auth::user()->id;
		$usuario = \App\User::find($id);
		
		$destinationPath = "imagenesPerfil/";
	    $file = $request->file('imagenPerfil');
	    $data = Auth::user()->nombreFotoP;
	   
	   if($file)
	   {
	        $file->move($destinationPath, $file->getClientOriginalName());
	        $user = User::findOrFail(Auth::user()->id);
	        $input = $request->all();
	        $input['imagenPerfil']->pathname = $destinationPath.$file->getClientOriginalName();
	        // Add this lines

	        $data = $file->getClientOriginalName();
	   }


		if($request['contrasena'] == null)
		{
			$usuario->update(['name' =>$request['usuario'],
							'email' =>$request['correo'],
							'biografia' =>$request['biografia'],
							'fechaNac' =>$request['fechaNac'],
							'genero' =>$request['genero'],
							'nombreFotoP'=>$data
							]);
		}
	 	else
	 	{
	 		$usuario->update(['name' =>$request['usuario'],
							'email' =>$request['correo'],
							'password' =>bcrypt($request['contrasena']),
							'biografia' =>$request['biografia'],
							'fechaNac' =>$request['fechaNac'],
							'genero' =>$request['genero'],
							'nombreFotoP'=>$data
							]);
	 	}
	 	return redirect('MiPerfil');
	}

	public function mostrarPerfil($id_usuario)
	{
		$data = \App\User::find($id_usuario);
		
	
  return \View::make('10_PerfilOtroUsuario')->with('data', $data);
	}
}