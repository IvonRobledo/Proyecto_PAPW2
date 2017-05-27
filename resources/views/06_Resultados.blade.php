@extends('layaouts.menuBase', ['resenas' => $resenas], ['resultadosDe' => $resultadosDe])

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
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/resena.css" rel="stylesheet">

    <style type="text/css">
body {
    overflow:hidden;
}
</style>

</head>

<body id="page-top">
    @section('contenido')
    @parent
@stop


<!--Resultados-->
    <section id="Resultados">
    <div class="seccion">
        <div class=" container">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <h2 class="section-heading">Resultados de "{{ $resultadosDe }}"</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                @foreach ($resenas as $resena)
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">  
                    <div class="image">
            @if($resena->nombreFoto == null)
                <a href="/Resena/{{ $resena->id_resena }}"><img class="imagen-libro" alt="img" src="/imagenesResenas/book.png"/></a>
            @else

                <a href="/Resena/{{ $resena->id_resena }}"><img class="imagen-libro" alt="img" src="/imagenesResenas/{{ $resena->nombreFoto }}"/></a>
            @endif
                     @php

        $totalLikes = DB::table('meGusta')
                    ->join('resena', 'resena.id_resena', '=', 'meGusta.id_resena')
                    ->select(DB::raw('COUNT(meGusta.id_resena) as num_likes'))
                    ->whereNull('deleted_at')
                    ->where('meGusta.id_resena', '=', $resena->id_resena)
                    ->get();
        @endphp
@foreach ($totalLikes as $totalLikesResena)
                    <h4 style="margin-left: -60px;"><span class="glyphicon glyphicon-heart"> {{ $totalLikesResena->num_likes }}</span></h4>
                    @endforeach   

                    </div>
                          <a href="Resena/{{ $resena->id_resena }}" class="titulo-libro"><h3 class="titulo-libro">{{ $resena->titulo }}</h3></a>
        @if(Auth::user()->id == $resena->id_usuarioP)
                <a href="MiPerfil" class="linkPerfil"><p class="text-muted">{{ $resena->nombreUsuario }}</p></a>
        @else
                <a href="Perfil/{{ $resena->id_usuarioP }}" class="linkPerfil"><p class="text-muted">{{ $resena->nombreUsuario }}</p></a>
        @endif
                    </div>
                </div>

                @endforeach
               <div class="ver-mas">
            <div class="row">
            <center>
                <div class="col-lg-12"">

                    {!!$resenas->render()!!}
                </div>
                </center>
            </div>
        </div>
                </div>
            </div>
        </div>     
    </section>   


    <!-- jQuery  -->
    <script src="js/jquery.min.js"></script>
   

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>

    <!-- Plugin JavaScript
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
     -->
	
	<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="js/Validaciones.js"></script>
    
    <script type="text/javascript">
        $(document).on('click', '.pagination a', function(e){
            var page =  $(this).attr('href').split('page=')[1];

            var link = "http://localhost:8000/Busqueda?buscar={{ $resultadosDe }}&page=" + page;

            $(this).attr('href', link);
        });


    </script>
</body>
</html>
