<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Proyeto PAPW 2">
    <meta name="author" content="Ivón Olivares / Vanessa Oviedo">

    <link rel="icon" href="img/logo.png">
    <title>Between Books</title>

    <!-- Bootstrap CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="css/registro-login.css" rel="stylesheet">
</head>
  <body class="fondo-registro">
	<div>
	<br><br><br><br><br>
	<div id= "divRegistro" style="min-width: 250px; min-height: 50px;">
	<form action="LandingPage.html">
			
		<br>	
        <center>
        <img src="img/logo1.png" style="min-width: 150px; min-height: 10px; "
            width=75% height=150% alt="Imagen no disponible">
        
		<h2 class="textosR">¡Crea una cuenta!</h2>
		<form id="formularioRegistro" method="post">
			<input class="aux registro" type="text" placeholder="Usuario*" name="usuario"/>
			<input class="aux registro" type="email" placeholder="Correo electrónico*" name="correo" id="correo"/>
			<label id="correoInvalido">Inserte un correo válido</label>
			<input class="aux registro" type="password" placeholder="Contraseña*" name="contrasena"/>
			<br><br>
			</center>
			<label class="labelreg" style="margin-left: 3%;"> Fecha de nacimiento* </label> 
			<center>
			<input class="aux registro" type="date" name="fechaNac"/>
			</center>
			<p style="margin-left: 3%;"><label class="labelreg"> Genero* </label></p>
			<input id="radio1" class="radios" type="radio" name="genero" value="hombre" checked> 
			<label for="radio1" class="labelreg"> Hombre </label>
			<input id="radio2" class="radios" type="radio" name="genero" value="mujer">
			<label for="radio2" class="labelreg"> Mujer </label>
			
			<br><br>
			<center>
			
			<a><button id="Registrarme" class="page-scroll btn btn-default btn-registrate">Registrarme</button></a>
		</form>
        <br><br>
        <label class="labelreg"> ¿Ya tienes una cuenta? Haz clic <a class="link-rl" href="01_Login.html">aquí</a>.</label>
         </center>
	
	</form>
	</div>
	<br><br><br><br><br>
	</div>
	
	
	<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="js/Validaciones.js"></script>
	
  </body>
 </html>