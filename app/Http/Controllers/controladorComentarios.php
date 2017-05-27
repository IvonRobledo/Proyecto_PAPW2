<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use App\User;
use DB;


class controladorComentarios extends Controller
{
    public function comentar(Request $request)
	{
	    \App\Comentario::create([
	    	'texto_comentario'=>$request['Comentario'],
	    	'id_usuario'=>Auth::user()->id,
	    	'id_resena'=>$request['id_resena']
	    	]);

	    $resena = "Resena/".$request['id_resena'];
	    return \Redirect::to($resena);
	}

}
