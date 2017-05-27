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


	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/fileinputConfig.css" media="all" rel="stylesheet" type="text/css" />

    <!-- Theme CSS -->
    <link href="css/configuracion.css" rel="stylesheet">
    <link href="css/perfil.css" rel="stylesheet">

    <style>
    .foto-perfil{
    	margin-top: 20px !important;
    	margin-left: 10px !important;
    }
    </style>
</head>

<body id="page-top">
	@section('contenido')
    @parent
@stop


{{Form::open(array('url'=>'EditarPerfil','method'=>'post', 'enctype'=>'multipart/form-data'))}}
		<div class="row">		
		
				<div class="col-xs-3 col-sm-3 col-md-1 col-lg-1"></div>
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" id= "imagenPortada"> 
				<center>
					<div class="form-group">
					<img class="img-circle special-img foto-perfil" id="foto-antes" src="imagenesPerfil/{{ Auth::user()->nombreFotoP }}"/>
						<input  id="file-3" type="file" name="imagenPerfil">
					</div>
				</center>
				</div>
				<div class="col-xs-3 col-sm-3 col-md-1 col-lg-1"></div>
				<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8" id="Config">
					<h2 class="section-heading">Configuración</h2>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<label class="labeldatosC">Usuario*</label>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
							<input class="datos" type="text" name="usuario" value="{{ Auth::user()->name }}"/>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<label class="labeldatosC">Biografía</label>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
							<textarea id="biografia" class="datos textoBiografia" placeholder="Cuéntanos acerca de ti..." name="biografia">{{ Auth::user()->biografia }}</textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<label class="labeldatosC">Correo electrónico*</label>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
							<input class="datos" type="text" name="correo" id="correo" value="{{ Auth::user()->email }}"/>
							<label id="correoInvalido">Inserte un correo válido</label>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<label class="labeldatosC">Contraseña*</label>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
							<input class="datos" type="password" name="contrasena" value=""/>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<label class="labeldatosC">Fecha de nacimiento*</label>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
							<input class="datos fecha-datos" type="date" name="fechaNac" required value="{{ Auth::user()->fechaNac }}"/>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<label class="labeldatosC">Género*</label>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
						<br>
						@php
							$genero = Auth::user()->genero;
						@endphp
							@if ($genero == "hombre")
							<input id="radio1" class="radios" type="radio" name="genero" value="hombre" checked> 
							<label for="radio1" class="labelreg"> Hombre </label>
							<input id="radio2" class="radios" type="radio" name="genero" value="mujer">
							<label for="radio2" class="labelreg"> Mujer </label>
						@else
							<input id="radio1" class="radios" type="radio" name="genero" value="hombre"> 
							<label for="radio1" class="labelreg"> Hombre </label>
							<input id="radio2" class="radios" type="radio" name="genero" value="mujer" checked>
							<label for="radio2" class="labelreg"> Mujer </label>
						@endif
						</div>
					</div>
					<br><br>
							
							
					
				</div>
		</div>
		
				<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-7 col-lg-7"></div>
			<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
			<a href="MiPerfil"><button  type="button" class="page-scroll btn btn-default btn-cancel">Cancelar</button></a>
				
			</div>
			
			<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
			<a><button id="ModificarDatos" type="submit" class="page-scroll btn btn-default btn-publicar">Modificar</button></a>
				
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

    <!-- Plugin JavaScript
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
     -->

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