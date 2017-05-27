<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use App\User;
use DB;


class controladorLikes extends Controller
{
    public function like(Request $request, $id_resena)
	{
	    \App\Like::create([
	    	'id_usuario'=>Auth::user()->id,
	    	'id_resena'=>$id_resena
	    	]);

	    $resena = "Resena/".$id_resena;
	    return \Redirect::to($resena);
	}

}
