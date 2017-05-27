<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use App\User;
use DB;

class controladorBusqueda extends Controller
{
   
public function busqueda(Request $request)		
		{
			
			$resenas = null;
			$resenas = DB::table('resena')
                    ->join('users', 'users.id', '=', 'resena.id_usuario')
	                    ->join('categoria', 'categoria.id_categoria', '=', 'resena.id_categoria')
	                    ->select('categoria.nombre_categoria', 'users.name as nombreUsuario', 'users.id as id_usuarioP', 'resena.id_resena as id_resena', 'resena.titulo as titulo', 'resena.nombreFoto as nombreFoto', 'resena.created_at as fechaNormal', DB::raw('TIMESTAMPDIFF(HOUR, resena.created_at, now()) as fecha'))
                    ->orderBy('fechaNormal', 'desc')

                    ->where('resena.titulo', 'LIKE', "%".$request['buscar']."%")
                    ->whereNull('deleted_at')

                    ->orWhere('users.name', 'LIKE', "%".$request['buscar']."%")
                    ->whereNull('deleted_at')

                    ->orWhere('categoria.nombre_categoria', 'LIKE', "%".$request['buscar']."%")
                    ->whereNull('deleted_at')                    

                    ->paginate(4);

            return view('06_Resultados', ['resenas' => $resenas], ['resultadosDe' => $request['buscar']]);
		}


}
