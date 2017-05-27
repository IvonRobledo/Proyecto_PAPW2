<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use App\User;
use App\Resena;

class controladorMostrarResenas extends Controller
{
    public function index(Request $request)
	{
		$destinationPath = "imagenesResenas/";
    $file = $request->file('imagenResena');
    $data = null;
   
   if($file)
   {
        $file->move($destinationPath, $file->getClientOriginalName());
        $user = User::findOrFail(Auth::user()->id);
        $input = $request->all();
        $input['imagenResena']->pathname = $destinationPath.$file->getClientOriginalName();
        // Add this lines

        $data = $file->getClientOriginalName();
   }
    

		//'titulo', 'autor', 'anio', 'paginas', 'nombreFoto', 'extFoto', 'textoResena', 'id_usuario', 'id_categoria'
	    \App\Resena::create([
	    	'titulo'=>$request['titulo'],
	    	'autor'=>$request['autor'],
	    	'anio'=>$request['anio'],
	    	'paginas'=>$request['paginas'],
	    	'textoResena'=>$request['textoResena'],
	    	'id_categoria'=>$request['genero'],
	    	'id_usuario'=>Auth::user()->id,
	    	'nombreFoto'=>$data
	    	]);

		return \Redirect::to('/Inicio');
	}
}
