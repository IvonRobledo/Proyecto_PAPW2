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
    <link href="css/inicio.css" rel="stylesheet">


</head>

<body id="page-top">
	
@section('contenido')
    @parent
@stop
 <!--Novedades-->
    <section id="Novedades">
    <div class="seccion">
        <div class=" container">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <a><h2 class="section-heading">Novedades</h2></a>
                </div>
            </div>
        </div>
       @php
        $novedades = DB::table('resena')
                    ->join('users', 'users.id', '=', 'resena.id_usuario')
                    ->select('users.name as nombreUsuario', 'users.id as id_usuarioP', 'resena.id_resena as id_resena', 'resena.titulo as titulo', 'resena.nombreFoto as nombreFoto', 'resena.created_at as fechaNormal', DB::raw('TIMESTAMPDIFF(HOUR, resena.created_at, now()) as fecha'))
                    ->whereNull('deleted_at')
                    ->orderBy('fechaNormal', 'desc')
                    ->limit(20)
                    ->paginate(4, ['*'], 'novedades');

            $imagenNovedad = null;
        @endphp


        <div class="container">
            <div class="row">
            @foreach ($novedades as $novedad)
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">  
                    <div class="image">
            @if($novedad->nombreFoto == null)
                <a href="Resena/{{ $novedad->id_resena }}"><img class="imagen-libro" alt="img" src="imagenesResenas/book.png"/></a>
            @else

                <a href="Resena/{{ $novedad->id_resena }}"><img class="imagen-libro" alt="img" src="imagenesResenas/{{ $novedad->nombreFoto }}"/></a>
            @endif
                        <h4><span>Hace {{ $novedad->fecha }} horas</span></h4>
                    </div>
                         <a href="Resena/{{ $novedad->id_resena }}" class="titulo-libro"><h3 class="titulo-libro">{{ $novedad->titulo }}</h3></a>
        @if(Auth::user()->id == $novedad->id_usuarioP)
                <a href="MiPerfil" class="linkPerfil"><p class="text-muted">{{ $novedad->nombreUsuario }}</p></a>
        @else
                <a href="Perfil/{{ $novedad->id_usuarioP }}" class="linkPerfil"><p class="text-muted">{{ $novedad->nombreUsuario }}</p></a>
        @endif
                    </div>
                </div>

                @endforeach
                <br>
        <div class="ver-mas">
            <div class="row">
            <center>
                <div class="col-lg-12"">
                    {!!$novedades->render()!!}
                </div>
                </center>
            </div>
        </div>
        </div>
        
    </section>   





<!--Populares-->
    <section id="Populares">
    <div class="seccion">
        <div class=" container">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <a><h2 class="section-heading">Populares</h2></a>
                </div>
            </div>
        </div>
       @php
        $populares = DB::table('resena')
                    ->join('users', 'users.id', '=', 'resena.id_usuario')
                    ->join('meGusta', 'meGusta.id_resena', '=', 'resena.id_resena')
                    ->select('users.name as nombreUsuario', 'users.id as id_usuarioP', 'resena.id_resena as id_resena', 'resena.titulo as titulo', 'resena.nombreFoto as nombreFoto', 
                    DB::raw('COUNT(meGusta.id_resena) as numLikes'))
                    ->whereNull('deleted_at')
                    ->groupBy('meGusta.id_resena')
                    ->orderBy('numLikes', 'desc')
                    ->limit(20)
                    ->paginate(4, ['*'], 'populares');
        @endphp


        <div class="container">
            <div class="row">
            @foreach ($populares as $popular)
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">  
                    <div class="image">
            @if($popular->nombreFoto == null)
                <a href="Resena/{{ $popular->id_resena }}"><img class="imagen-libro" alt="img" src="imagenesResenas/book.png"/></a>
            @else

                <a href="Resena/{{ $popular->id_resena }}"><img class="imagen-libro" alt="img" src="imagenesResenas/{{ $popular->nombreFoto }}"/></a>
            @endif
            <h4 style="margin-left: -60px;"><span class="glyphicon glyphicon-heart"> {{ $popular->numLikes }}</span></h4>
                    </div>
                        <a href="Resena/{{ $popular->id_resena }}" class="titulo-libro"><h3 class="titulo-libro">{{ $popular->titulo }}</h3></a>
        @if(Auth::user()->id == $popular->id_usuarioP)
                <a href="MiPerfil" class="linkPerfil"><p class="text-muted">{{ $popular->nombreUsuario }}</p></a>
        @else
                <a href="Perfil/{{ $popular->id_usuarioP }}" class="linkPerfil"><p class="text-muted">{{ $popular->nombreUsuario }}</p></a>
        @endif
                    </div>
                </div>

                @endforeach
                <br>
        <div class="ver-mas">
            <div class="row">
            <center>
                <div class="col-lg-12"">
                    {!!$populares->render()!!}
                </div>
                </center>
            </div>
        </div>
        </div>
        
    </section>   


 <section class="no-padding" id="portfolio">
        <div class="container-fluid portafolio-seccion">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-3 col-sm-6 no-espacio">
                    <a href="Busqueda" class="portfolio-box" value="Romance">
                        <img src="img/categorias/romance.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    CATEGORÍA
                                </div>
                                <div class="project-name">
                                    Romance
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 no-espacio">
                    <a href="Busqueda" class="portfolio-box" value="Misterio">
                        <img src="img/categorias/misterio.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    CATEGORÍA
                                </div>
                                <div class="project-name">
                                    Misterio
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 no-espacio">
                    <a href="Busqueda" class="portfolio-box" value="Ficción">
                        <img src="img/categorias/ficcion.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    CATEGORÍA
                                </div>
                                <div class="project-name">
                                    Ficción
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 no-espacio">
                    <a href="Busqueda" class="portfolio-box" value="Aventura">
                        <img src="img/categorias/aventura.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    CATEGORÍA
                                </div>
                                <div class="project-name">
                                    Aventura
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 no-espacio">
                    <a href="Busqueda" class="portfolio-box" value="Crimen">
                        <img src="img/categorias/policial.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    CATEGORÍA
                                </div>
                                <div class="project-name"> 
                                    Crimen
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 no-espacio">
                    <a href="Busqueda" class="portfolio-box" value="Espiritual">
                        <img src="img/categorias/espiritual.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    CATEGORÍA
                                </div>
                                <div class="project-name">
                                    Espiritual
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                   <div class="col-lg-3 col-sm-6 no-espacio">
                   <a href="Busqueda" class="portfolio-box" value="Distopía">
                        <img src="img/categorias/distopia.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    CATEGORÍA
                                </div>
                                <div class="project-name">
                                    Distopía
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                   <div class="col-lg-3 col-sm-6 no-espacio">
                    <a href="Busqueda" class="portfolio-box" value="Poesía">
                        <img src="img/categorias/poesia.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    CATEGORÍA
                                </div>
                                <div class="project-name">
                                    Poesía
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                   <div class="col-lg-3 col-sm-6 no-espacio">
                    <a href="Busqueda" class="portfolio-box" value="Fantasía">
                        <img src="img/categorias/fantasia.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    CATEGORÍA
                                </div>
                                <div class="project-name">
                                    Fantasía
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                   <div class="col-lg-3 col-sm-6 no-espacio">
                    <a href="Busqueda" class="portfolio-box" value="Historia">
                        <img src="img/categorias/historia.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    CATEGORÍA
                                </div>
                                <div class="project-name">
                                    Historia
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                   <div class="col-lg-3 col-sm-6 no-espacio">
                    <a href="Busqueda" class="portfolio-box" value="Tendencias">
                        <img src="img/categorias/tendencia.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    CATEGORÍA
                                </div>
                                <div class="project-name">
                                    Tendencias
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                   <div class="col-lg-3 col-sm-6 no-espacio">
                    <a href="Busqueda" class="portfolio-box" value="Otros">
                        <img src="img/categorias/chicas.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    CATEGORÍA
                                </div>
                                <div class="project-name">
                                    Otros
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <br><br><br><br>





    <!-- jQuery  -->
    <script src="js/jquery.min.js"></script>
   

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>

    <!-- Plugin JavaScript
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
     -->

    <!-- Theme JavaScript -->
    
	<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="js/Validaciones.js"></script>

    <script type="text/javascript">

        $('.portfolio-box').click(function(e){
    e.preventDefault();
    var catABuscar = $(this).attr("value");
    $('#search').val(catABuscar);
    $('#btnsearch').trigger("click");
});

    </script>
    
</body>
</html>
