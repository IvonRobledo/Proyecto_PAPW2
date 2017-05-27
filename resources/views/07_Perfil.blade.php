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

    <!-- Theme CSS -->
    <link href="css/perfil.css" rel="stylesheet">
</head>

<body id="page-top">
    @section('contenido')
    @parent
@stop


<!--Perfil-->
    <header>
    <div class="container">
                <div class="row">
                    <div class="col">
                        <a href="Configuracion"><button style="margin-right: 0px;" type="button" class="btn-login"><span class="glyphicon glyphicon-pencil"></span> EDITAR PERFIL</button></a>
                    </div>
                </div>
        </div>
    <div class="seccion_perfil">
        <div class=" container">
            <div class="row">
                <div class="col-lg-3 text-left">
                    <img class="img-circle special-img foto-perfil" src="imagenesPerfil/{{ Auth::user()->nombreFotoP }}"/>
                </div>
                <div class="col-lg-6 col-md-6  text-center">
                    <h3 class="nombreUsuario">{{ Auth::user()->name }}</h3>
                     @php

       $id_usuario = Auth::user()->id;
        $totalResenas = DB::table('resena')
                    ->join('users', 'users.id', '=', 'resena.id_usuario')
                    ->select(DB::raw('COUNT(resena.id_resena) as num_resenas'))
                    ->whereNull('deleted_at')
                    ->where('resena.id_usuario', '=', $id_usuario)
                    ->get();
        @endphp
@foreach ($totalResenas as $totalResenasUsuario)
                    <p class="numero-resenas">{{ $totalResenasUsuario->num_resenas }} reseñas </p>
                    @endforeach
                    <p class="biografia">{{ Auth::user()->biografia }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                    <p class="datos-usuario"><span class="glyphicon glyphicon-envelope"></span> Correo </p>
                     <p class="datos-usuario2">{{ Auth::user()->email }} </p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                    <p class="datos-usuario"><span class="glyphicon glyphicon-calendar"></span> Fecha de Nacimiento </p>
                    <p class="datos-usuario2">{{ Auth::user()->fechaNac }}</p>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                    <p class="datos-usuario"><span class="glyphicon glyphicon-user"></span> Género </p>
                    <p class="datos-usuario2">{{ Auth::user()->genero }} </p>
                </div>
            </div>

     </div>
<section id="Novedades" style="margin-top: -50px;">
    <div class="seccion">
        <div class=" container">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <a><h2 class="section-heading">Mis reseñas</h2></a>
                </div>
            </div>
        </div>
       @php

       $id_usuario = Auth::user()->id;
        $resenasUsuario = DB::table('resena')
                    ->join('users', 'users.id', '=', 'resena.id_usuario')
                    ->select('users.name as nombreUsuario', 'resena.id_resena as id_resena', 'resena.titulo as titulo', 'resena.nombreFoto as nombreFoto', 'resena.created_at as fechaNormal', DB::raw('TIMESTAMPDIFF(HOUR, resena.created_at, now()) as fecha'))
                    ->whereNull('deleted_at')
                    ->where('resena.id_usuario', '=', $id_usuario)
                    ->orderBy('fechaNormal', 'desc')
                    ->paginate(4);

            $imagenNovedad = null;
        @endphp


        <div class="container">
            <div class="row"">
            @foreach ($resenasUsuario as $resenaUsuario)
                <div class="col-lg-3 col-md-6 text-center" style="padding-top: 10px;">
                    <div class="service-box">  
                    <div class="image">
            @if($resenaUsuario->nombreFoto == null)
                <a href="Resena/{{ $resenaUsuario->id_resena }}"><img class="imagen-libro" alt="img" src="imagenesResenas/book.png"/></a>
            @else

                <a href="Resena/{{ $resenaUsuario->id_resena }}"><img class="imagen-libro" alt="img" src="imagenesResenas/{{ $resenaUsuario->nombreFoto }}"/></a>
            @endif

        @php

        $totalLikes = DB::table('meGusta')
                    ->join('resena', 'resena.id_resena', '=', 'meGusta.id_resena')
                    ->select(DB::raw('COUNT(meGusta.id_resena) as num_likes'))
                    ->whereNull('deleted_at')
                    ->where('meGusta.id_resena', '=', $resenaUsuario->id_resena)
                    ->get();
        @endphp
@foreach ($totalLikes as $totalLikesResena)
                    <h4 style="margin-left: -60px;"><span class="glyphicon glyphicon-heart"> {{ $totalLikesResena->num_likes }}</span></h4>
                    @endforeach



                        
                    </div>
                         <a href="Resena/{{ $resenaUsuario->id_resena }}"><h3 class="titulo-libro">{{ $resenaUsuario->titulo }}</h3></a>
                        <p class="text-muted">{{ $resenaUsuario->nombreUsuario }}</p>
                    </div>
                </div>
                @endforeach
        <div class="ver-mas">
            <div class="row">
            <center>
                <div class="col-lg-12"">
                    {!!$resenasUsuario->render()!!}
                </div>
                </center>
            </div>
        </div>
        </div>
        
    </section>   

   
    
        </div>   
        <br><br><br><br>  
    </header>   

    <!-- jQuery  -->
    <script src="js/jquery.min.js"></script>
   

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
	<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="js/Validaciones.js"></script>

    <!-- Plugin JavaScript
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
     -->

    <!-- Theme JavaScript -->
    
    
</body>
</html>
