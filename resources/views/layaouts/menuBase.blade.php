
	<title> @yield('titulo')</title>


    <!-- Theme CSS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="/css/inicio.css" rel="stylesheet" type="text/css" >


@section('contenido')
	<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span><span class="glyphicon glyphicon-menu-hamburger"></span> <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="/Inicio"><img style="float: left; position: relative;" width="20%" height="100%" src="/img/logo2.png"/></a>
               <!-- <a class="navbar-brand page-scroll" href="#page-top">Between Books</a>-->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                   
                    
                    <li>
                        {!! Form::open(['url' => 'Busqueda', 'method' => 'GET', 'class' => 'navbar-left', 'role' => 'search']) !!}
                            <div class="form-group">
                                <input id="search" type="text" class="form-control busqueda" placeholder="Buscar" name="buscar"/>
                               <a><button id="btnsearch" type="submit" class="btn-busqueda btn btn-default"><span class="glyphicon glyphicon-search"></span></button></a>
                            </div>
                        {!! Form::close()!!} 
            
                    </li>


                     <li>
                        <a class="page-scroll" href="/Escribir"><span class="glyphicon glyphicon-pencil"></span> CREAR</a>
                    </li>

                    <li>
                        <a class="page-scroll" href="/MiPerfil"><img class="img-circle special-img" src="/imagenesPerfil/{{ Auth::user()->nombreFotoP }}"/>{{ Auth::user()->name }}</a>
                    </li>
                    <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    OPCIONES <span class="caret"></span>
                    </a>
                        <ul class="dropdown-menu">
                            <li><a href="/MiPerfil" style="color: black;"><span class="glyphicon glyphicon-user"></span> Mi perfil</a></li>
                            <li><a href="/Configuracion" style="color: black;"><span class="glyphicon glyphicon-cog"></span> Configuración</a></li>
                            <li class="divider"></li>


                            <li><a href="/CerrarSesion" style="color: black;"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
                        </ul>
                    </li>                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    @show




    <!-- jQuery  -->
    <script src="/js/jquery.min.js"></script>
   

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.js"></script>

    
    <script src="/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script language="javascript" type="text/javascript" src="/js/Validaciones.js"></script>