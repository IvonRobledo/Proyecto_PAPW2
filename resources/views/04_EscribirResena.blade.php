@extends('layaouts.menuBase')

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


    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" >
	<link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
	
    <!-- Theme CSS -->
    <link href="css/escribir_resena.css" rel="stylesheet">

</head>

<body id="page-top">
@section('contenido')
    @parent
@stop

{{Form::open(array('id'=>'formularioEscribirR', 'url'=>'PostearResena','method'=>'post', 'enctype'=>'multipart/form-data'))}}
		<div class="row">		
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="col-xs-3 col-sm-3 col-md-1 col-lg-1"></div>
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" id= "imagenPortada"> 
				<center>
					<div class="form-group">
						<input id="file-3" type="file" name="imagenResena"/>
					</div>
				</center>
				</div>
				<div class="col-xs-3 col-sm-3 col-md-1 col-lg-1"></div>
				<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8" id="DatosLibro">
				<h2 class="section-heading">Datos del libro</h2>
					<label class="labeldatos">Título*</label>
					<input class="datos" type="text" name="titulo"/>
					<br>
					<label class="labeldatos">Autor*</label>
					<input class="datos" type="text" name="autor"/>
					<br>
					<label class="labeldatos">Páginas</label>
					<input class="datos" type="text" name="paginas" id="paginas"/>
					<br>
					<label class="labeldatos">Año de publicación</label>
					<input class="datos" type="text" name="anio" id="anio"/>
					<br>
					<label class="labeldatos">Género*</label>
					<select class="datos" name="genero">
						<option value="" selected="selected">Seleccione...</option>
						@foreach($categorias as $categoria)
						<option value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>

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
					<textarea class="datos textoReseña" placeholder="Cuéntanos acerca del libro..." name="textoResena"></textarea>
				</div>
		</div>
		
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-7 col-lg-7"></div>
			<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
			<a href="Inicio"><button  type="button" class="page-scroll btn btn-default btn-cancel">Cancelar</button></a>
				
			</div>
			
			<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
			<a><button  id="PublicarReseña" type="submit" class="page-scroll btn btn-default btn-publicar">Publicar</button></a>
				
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		</div>
		{{Form::close()}} 
		
		<br><br><br><br><br>


   <!-- jQuery  -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
	 
	 <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="js/Validaciones.js"></script>
	<script src="js/fileinput.min.js" type="text/javascript"></script>
	
	
  </body>
  <script>
	$("#file-3").fileinput({
		showCaption: false,
		browseClass: "btn btn-primary btn-lg",
		fileType: "any"
	});
	</script>
 </html>