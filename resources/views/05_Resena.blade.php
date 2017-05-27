@extends('layaouts.menuBase', ['data' => $data])

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Proyeto PAPW 2">
    <meta name="author" content="Ivón Olivares / Vanessa Oviedo">

	<link rel="icon" href="/img/logo.png">
	
    @section('titulo')
    Between Books
    @stop


	<!-- Bootstrap CSS -->
	<link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/css/resena.css" rel="stylesheet">

</head>

<body id="page-top">
	@section('contenido')
    @parent
@stop

@php

$id_Usuario = Auth::user()->id;
        $novedades = DB::table('resena')
                    ->join('users', 'users.id', '=', 'resena.id_usuario')
                    ->join('categoria', 'categoria.id_categoria', '=', 'resena.id_categoria')
                    ->select('users.id as idUsuarioResena', 'users.name as nombreUsuario', 'resena.id_resena as id_resena', 'resena.titulo as titulo', 'resena.nombreFoto as nombreFoto', 'resena.created_at as fechaNormal', 'categoria.nombre_categoria as nombreCategoria', 'resena.autor as autor', 'resena.paginas as paginas', 'resena.anio as anio', 'resena.textoResena as textoResena')
                    ->where('id_resena', $data)
                    ->get();

            $imagenNovedad = null;
        @endphp

@foreach ($novedades as $novedad)
    <section id="Novedades">
    <div class="seccion">
        <div class=" container">
            <div class="row">
            <div class="col-lg-12 text-left">
					
					<br><br>
                    <h2 style= "display: inline;" class="section-heading">{{ $novedad->titulo }},  <i>{{ $novedad->autor }}</i></h2>

                    @if($novedad->idUsuarioResena == $id_Usuario)
                	<li style= "display: inline; list-style:none; float: right;" role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-chevron-down" style="font-size: 1em; color: #c68c53"></span>
                    </a>
                        <ul class="dropdown-menu" style="margin-left: -150px;">
                            <li><a href="/EditarResena/{{ $novedad->id_resena }}" style="color: black;"><span class="glyphicon glyphicon-pencil"></span> Editar reseña</a></li>
                            <li><a href="/EliminarResena/{{ $novedad->id_resena }}" style="color: black;"><span class="glyphicon glyphicon-trash"></span> Eliminar reseña</a></li>
                        </ul>
                    </li>
                    @endif
                    <br><br>
                </div>

                
            </div>
        </div>
        <div class="container">
            <div class="row" style="padding: 0px  20px 0px 20px;">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <img class="imagen-libroR" alt="img" src="/imagenesResenas/{{ $novedad->nombreFoto }}"/>
                    </div>
                </div>
				<div class="col-lg-9 col-md-6 ficha"> 
                    <h2 class="section-heading">Ficha técnica</h2>
					<label class="labeldatosF">Título</label>
					<label class="datosLibro"> {{ $novedad->titulo }}</label>
					<br>
					<label class="labeldatosF">Autor</label>
					<label class="datosLibro">{{ $novedad->autor }}</label>
					<br>
					<label class="labeldatosF">Páginas</label>
					<label class="datosLibro">{{ $novedad->paginas }}</label>
					<br>
					<label class="labeldatosF">Año de publicación</label>
					<label class="datosLibro">{{ $novedad->anio }}</label>
					<br>
					<label class="labeldatosF">Género</label>
					<label class="datosLibro">{{ $novedad->nombreCategoria }}</label>
					<br><br><br><br>
					<span class="text-muted usuarioR" style="margin-left: 30px;">Por {{ $novedad->nombreUsuario }} ({{ $novedad->fechaNormal }})</span>
					<br><br>
                </div>
            </div>
			<br>
			<div class="row" style="padding: 0px  20px 0px 20px;">
				<div class="col-lg-12 col-md-10 ficha">
					<h3 class="section-heading">Reseña de <i>{{ $novedad->titulo }}</i></h3>
					<br>
					<p class="reseñaCont"> 
						{{ $novedad->textoResena }}
					</p>
				</div>
			</div>
			
			<div class="row">
			<br>

				@php

				$disteLike = true;
        $likes = DB::table('megusta')
        			->join('resena', 'resena.id_resena', '=', 'megusta.id_resena')
                    ->select(DB::raw('COUNT(meGusta.id_resena) as num_likes'))
                    ->where('meGusta.id_resena', $data)
                    ->get();

         $verificarLike = DB::table('megusta')
        			->join('users', 'users.id', '=', 'megusta.id_usuario')
        			->join('resena', 'resena.id_resena', '=', 'megusta.id_resena')
                    ->select('meGusta.id_meGusta as id_MeGusta')
                    ->where('meGusta.id_usuario', $id_Usuario)
                    ->where('meGusta.id_resena', $data)
                    ->get();

            if($verificarLike == null)
            {
            	$disteLike = false;
            }
        @endphp

@foreach ($likes as $like)

		@if($disteLike == true)
				<div class="col-lg-3 col-md-3 col-sm-5 col-xs-5" id="dioLike">
					<a><span class="glyphicon glyphicon-heart likeIcono dioLike"><span class="auxLike">{{ $like->num_likes }} me gusta</span></span></a>
				</div>
		@else
			<div class="col-lg-3 col-md-3 col-sm-5 col-xs-5" id="dioLike">
					<a href="/DioLike/{{ $data }}"><span class="glyphicon glyphicon-heart likeIcono"><span class="auxLike">{{ $like->num_likes }} me gusta</span></span></a>
				</div>
		@endif
	@endforeach
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
				<input type="checkbox" id="spoiler1"></input>
				<span class="glyphicon glyphicon-comment comentar"></span>
				<span for="spoiler1" class="auxComentar" onclick="javascript:visualiza('div_01', 'oculto_02');">Comentar</span>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-5 col-xs-5"></div>
				<div id="oculto_02" class="oculto1 col-lg-2 col-md-2 col-sm-5 col-xs-5">
					<a href=""><span class="glyphicon glyphicon-sort ordenarIcono"><span class="auxOrdenar">Ordenar</span></span></a>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="separador"></div>
				</div>
				<br clear="left">
				<br clear="left">
			</div>
			
			<div class="row">
				<div id="div_01" class="oculto1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
			{{Form::open(array('url'=>'ComentarResena','method'=>'post'))}}

		@php

		
        $fotoP = DB::table('users')
                    ->select('users.nombreFotoP as nombreFotoP')
                    ->where('id', $id_Usuario)
                    ->get();
        @endphp

				<div class="row">
					<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
					@foreach ($fotoP as $foto)
							<img src="/imagenesPerfil/{{ $foto->nombreFotoP }}" alt="img" class="imagenComentario"/>
					@endforeach
					</div>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-7">
							<input type="text" id="Comenta" name="Comentario" class="escribeComentario" placeholder="Escribe un comentario..." autofocus="autofocus" autocomplete="off"/>
							<input type="hidden" name="id_resena" value="{{ $data }}"/>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
							<a><button id="enviarComentario" type="submit" class="page-scroll btn btn-default btn-publicar"><span style="font-size: 1.2em; color: #c68c53" class="glyphicon glyphicon-send"></span></button></a>
					</div>
				</div>	

			{{Form::close()}} 

				<br clear="left">
				@php

        $comentarios = DB::table('comentario')
        			->join('users', 'users.id', '=', 'comentario.id_usuario')
                    ->select('users.nombreFotoP as nombreFotoP', 'users.name as nombreUsuario', 'comentario.texto_comentario as textoComentario', 'comentario.fecha as fechaComentario')
                    ->where('comentario.id_resena', $data)
                    ->paginate(4);
        @endphp
@foreach ($comentarios as $comentario)
<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="separador2"></div>
				</div>
				<br clear="left">
				<br clear="left">
			</div>
				<div class="row">
					<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">	
						<img src="/imagenesPerfil/{{ $comentario->nombreFotoP }}" alt="img" class="imagenComentario"/>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-10 col-xs-10">
						<label class="NombreComentarioU">{{ $comentario->nombreUsuario }}</label>
					</div>
					<div class="col-sm-2 col-xs-2"></div>
					<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
						<label class="Comentario">{{ $comentario->textoComentario }}</label>
					</div>
					<div class="col-sm-2 col-xs-2"></div>
					<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
						<label class="FechaHoraComent">{{ $comentario->fechaComentario }}</label>
					</div>
				</div>
				 <div class="ver-mas">
            
        </div>
	@endforeach
	<div class="row">
            <center>
                <div class="col-lg-12"">
                    {!!$comentarios->render()!!}
                </div>
                </center>
            </div>
				</div>
			</div>
        </div>
        </div>
    </section>    

 @endforeach




    
<br><br><br><br>

    <!-- jQuery  -->
    <script src="/js/jquery.min.js"></script>
   

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.js"></script>

    <!-- Plugin JavaScript
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
     -->

    <!-- Theme JavaScript -->
	
	<script src="/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="/js/Validaciones.js"></script>
	
	
	<script>
		var visible_actual=false;
		var visible_actual2=false;
			function visualiza(id, id2)
				{
					if(visible_actual && visible_actual2)
					{
						document.getElementById(visible_actual).style.display='none';
						document.getElementById(visible_actual2).style.display='none';
					}
					visible_actual=id;
					visible_actual2=id2;
					document.getElementById(visible_actual).style.display='block';
					document.getElementById(visible_actual2).style.display='block';
				}

	</script>
				
				
    
</body>
</html>
