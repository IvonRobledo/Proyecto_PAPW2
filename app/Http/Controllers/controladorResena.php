<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use App\User;
use DB;

class controladorResena extends Controller
{
    public function store(Request $request)
	{
		$destinationPath = "imagenesResenas/";
    $file = $request->file('imagenResena');
    $data = 'book.png';
   
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


	public function mostrar($id_resena)
{
	$data = null;
  $data = $id_resena;
  return \View::make('05_Resena')->with('data', $data);
}

	public function editor($id_resena)
{
	$categorias = \App\Categoria::all();
	$data = null;
  $data = $id_resena;
  return \View::make('09_EditarResena',  compact('categorias'))->with('data', $data);
}

	public function resultados($p)
	{
		$resenas = null;
	        $resenas = DB::table('resena')
	                    ->join('users', 'users.id', '=', 'resena.id_usuario')
	                    ->join('categoria', 'categoria.id_categoria', '=', 'resena.id_categoria')
	                    ->select('categoria.nombre_categoria', 'users.name as nombreUsuario', 'resena.id_resena as id_resena', 'resena.titulo as titulo', 'resena.nombreFoto as nombreFoto', 'resena.created_at as fechaNormal', DB::raw('TIMESTAMPDIFF(HOUR, resena.created_at, now()) as fecha'))
	                    ->orderBy('fechaNormal', 'desc')
	                    ->where('categoria.nombre_categoria', $p)
	                    ->paginate(4);

	        return view('06_Resultados', ['resenas' => $resenas], ['resultadosDe' => $p]);
	}

public function modificar(Request $request, $id_resena)
	{
		$id = Auth::user()->id;
		$resena = \App\Resena::find($id_resena);
		$destinationPath = "imagenesResenas/";
	    $file = $request->file('imagenResena');
	    $data = $resena->nombreFoto;
	   
	   if($file)
	   {
	        $file->move($destinationPath, $file->getClientOriginalName());
	        $user = User::findOrFail(Auth::user()->id);
	        $input = $request->all();
	        $input['imagenResena']->pathname = $destinationPath.$file->getClientOriginalName();
	        // Add this lines

	        $data = $file->getClientOriginalName();
	   }

	 		$resena->update([
	 			'titulo'=>$request['titulo'],
	    	'autor'=>$request['autor'],
	    	'anio'=>$request['anio'],
	    	'paginas'=>$request['paginas'],
	    	'textoResena'=>$request['textoResena'],
	    	'id_categoria'=>$request['genero'],
	    	'nombreFoto'=>$data
							]);
	 	$resena = "Resena/".$id_resena;
	    return \Redirect::to($resena);
	}

public function eliminar($id_resena)
		{
			$id = Auth::user()->id;
			$resena = \App\Resena::find($id_resena);
			$resena->delete();

		  return Redirect::to('/Inicio');
		}

}
