@extends('layaouts.menuBase', ['data' => $data])

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Proyeto PAPW 2">
    <meta name="author" content="Ivón Olivares / Vanessa Oviedo">

	<link rel="icon" href="img/logo.png">
	

    @section('titulo')
    Between Books 
    @stop


    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" >
	<link href="/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
	
    <!-- Theme CSS -->
    <link href="/css/escribir_resena.css" rel="stylesheet">

    <style>

.imagen-libroR{
	margin-left: -15px;
}
    </style>

</head>

<body id="page-top">
@section('contenido')
    @parent
@stop

@php

$id_Usuario = Auth::user()->id;
$ruta = "ModificarResena/". $data;
        $resenaEditar = DB::table('resena')
                    ->select('resena.id_resena as id_resena', 'resena.titulo as titulo', 'resena.nombreFoto as nombreFoto', 'resena.id_categoria as idCategoria', 'resena.autor as autor', 'resena.paginas as paginas', 'resena.anio as anio', 'resena.textoResena as textoResena')
                    ->where('id_resena', $data)
                    ->get();

        @endphp

@foreach ($resenaEditar as $resenaEditando)

{{Form::open(array('id'=>'formularioEscribirR', 'url'=>$ruta,'method'=>'post', 'enctype'=>'multipart/form-data'))}}
		<div class="row">		
		
				<div class="col-xs-3 col-sm-3 col-md-1 col-lg-1"></div>
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" id= "imagenPortada"> 
				<center>
					<div class="form-group">
					<img class="imagen-libroR" id="foto-antes" src="/imagenesResenas/{{ $resenaEditando->nombreFoto }}"/>
						<input id="file-3" type="file" name="imagenResena"/>
					</div>
				</center>
				</div>
				<div class="col-xs-3 col-sm-3 col-md-1 col-lg-1"></div>
				<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8" id="DatosLibro">
				<h2 class="section-heading">Datos del libro</h2>
					<label class="labeldatos">Título*</label>
					<input class="datos" type="text" name="titulo" value="{{ $resenaEditando->titulo }}"/>
					<br>
					<label class="labeldatos">Autor*</label>
					<input class="datos" type="text" name="autor" value="{{ $resenaEditando->autor }}"/>
					<br>
					<label class="labeldatos">Páginas</label>
					<input class="datos" type="text" name="paginas" id="paginas" value="{{ $resenaEditando->paginas }}"/>
					<br>
					<label class="labeldatos">Año de publicación</label>
					<input class="datos" type="text" name="anio" id="anio" value="{{ $resenaEditando->anio }}"/>
					<br>
					<label class="labeldatos">Género*</label>
					<select class="datos" name="genero">
						
						@foreach($categorias as $categoria)
						@if($categoria->id_categoria == $resenaEditando->idCategoria)
						<option selected="selected" value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>
						@else
						<option value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>
						@endif
						@endforeach
                    </select>
					<br><br><br>
				</div>
		</div>
				
		<div class="row">	
				<div class="col-xs-2 col-sm-2 col-md-4 col-lg-4" style="width: 335px;"></div>
				<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8" id="Reseña">
					<!--<p class="textosDatos">RESEÑA</p>-->
					<h2 class="section-heading">Reseña*</h2>
					<textarea class="datos textoReseña" placeholder="Cuéntanos acerca del libro..." name="textoResena">{{ $resenaEditando->textoResena }}</textarea>
				</div>
		</div>
		
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-7 col-lg-7"></div>
			<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
			<a href="/Resena/{{ $data }}"><button  type="button" class="page-scroll btn btn-default btn-cancel">Cancelar</button></a>
				
			</div>
			
			<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
			<a><button  id="PublicarReseña" type="submit" class="page-scroll btn btn-default btn-publicar">Editar</button></a>
				
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		</div>
		{{Form::close()}} 
		
		<br><br><br><br><br>
@endforeach

   <!-- jQuery  -->
    <script src="/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.js"></script>
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
	 
	 <script src="/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="/js/Validaciones.js"></script>
	<script src="/js/fileinput.min.js" type="text/javascript"></script>
	
	
  </body>
  <script>
	$("#file-3").fileinput({
		showCaption: false,
		browseClass: "btn btn-primary btn-lg",
		fileType: "any"
	});
	 $("input:file").change(function (){
       $('#foto-antes').hide();
     });
	</script>
 </html>