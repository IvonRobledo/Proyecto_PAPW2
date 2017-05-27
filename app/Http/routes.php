<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('LandingPage');
});

Route::get('Registro', function () {
    return view('02_Registro');
});


// GET route
Route::get('Login', function() {
  return View::make('01_Login');
});



    Route::get('Inicio', function () {
    	 if (!Auth::check())
    	 	return redirect('/');
         else
    		return view('03_Inicio');
      	});

	Route::get('Escribir', function () {
		if (!Auth::check())
    	 	return redirect('/');
         else
         {
         	$categorias = App\Categoria::all();
			return view('04_EscribirResena',  compact('categorias'));
         }
	});


Route::get('Resena/{id_resena}', 'controladorResena@mostrar');

Route::get('EditarResena/{id_resena}', 'controladorResena@editor');

Route::post('ModificarResena/{id_resena}', 'controladorResena@modificar');

Route::get('EliminarResena/{id_resena}', 'controladorResena@eliminar');


	

	Route::get('Resultados', function () {
		if (!Auth::check())
    	 	return redirect('/');
         else
    		return view('06_Resultados');
	});

	Route::get('MiPerfil', function () {
		if (!Auth::check())
    	 	return redirect('/');
         else
	    	return view('07_Perfil');
	});

	Route::get('Configuracion', function () {
		if (!Auth::check())
    	 	return redirect('/');
         else
	    	return view('08_Configuracion');
	});


Route::resource('Registrar', 'controladorRegistro');

Route::resource('EditarPerfil', 'controladorPerfil@update');

Route::resource('IniciarSesion', 'controladorLogin');

Route::resource('CerrarSesion', 'controladorLogin@logout');

Route::resource('PostearResena', 'controladorResena');

Route::resource('ComentarResena', 'controladorComentarios@comentar');
Route::get('DioLike/{id_resena}', 'controladorLikes@like');

Route::get('Busqueda', 'controladorBusqueda@busqueda');

Route::get('Resultados/{param}', 'controladorResena@resultados');


Route::get('Perfil/{id_usuario}', 'controladorPerfil@mostrarPerfil');