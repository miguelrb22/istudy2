<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Istudy</title>

    <link href="{{ URL::asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('front/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('front/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('front/css/style.css')}}" rel="stylesheet">
    @yield("css")

</head>

<body class="">

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation" >
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-rounded" src="{{URL::asset('images/profiles').'/'.\Illuminate\Support\Facades\Auth::user()->img_url}}" height="80"/>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ \Illuminate\Support\Facades\Auth::user()->nombre }} <b
                                                class="caret"></b> </strong>
                             </span>  </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="{{URL::route('modificar-perfil')}}">Perfil</a></li>
                            <li><a href="{{URL::route('contactos')}}">Contactos</a></li>
                            <li><a href="{{ URL::route('mailbox')}}">Mensajes privados</a></li>
                            <li class="divider"></li>
                            <li><a href="{{URL::route('logout')}}">Cerrar sesion</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IS
                    </div>
                </li>

                <li>
                    <a href="{{ URL::route('home')}}"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
                </li>
                <li>
                    <a href="{{ URL::route('salas')}}"><i class="fa fa-leanpub"></i> <span class="nav-label">Salas</span></a>
                </li>
                <li>
                    <a href="{{ URL::route('momentos')}}"><i class="fa fa-users"></i> <span class="nav-label">Momentos</span></a>
                </li>

                <li>
                    <a href="{{ URL::route('clases')}}"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Clases</span></a>
                </li>
                <li>
                    <a href="{{ URL::route('deportes')}}"><i class="fa fa-soccer-ball-o"></i> <span class="nav-label">Eventos deportivos</span></a>
                </li>

                <li>
                    <a href="{{ URL::route('proyectos')}}"><i class="fa fa-lightbulb-o"></i> <span class="nav-label">Proyectos/ideas</span></a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Academias <small style="color: red; font-size: 9px"> Proximamente</small></span></a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-glass"></i> <span class="nav-label">Ocio <small style="color: red; font-size: 9px"> Proximamente</small></span></a>
                </li>


            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>

                </div>
                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i> <span class="label label-warning"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="text-center link-block">
                                    <strong>Nada para mostrar</strong>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i> <span class="label label-primary"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">

                            <li>
                                <div class="text-center link-block">
                                    <strong>Nada para mostrar</strong>
                                </div>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{URL::route('logout')}}">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>@yield('maintitle')</h2>
            </div>

        </div>

        <div class="wrapper wrapper-content">

            @yield('contenido')


        </div>

    </div>
</div>

<script src="https://www.gstatic.com/firebasejs/3.2.0/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyD_6MMqLXlNTaNqquSnXGu-DzGWu0jSQnw",
        authDomain: "istudy-3f8dc.firebaseapp.com",
        databaseURL: "https://istudy-3f8dc.firebaseio.com",
        storageBucket: ""
    };
    firebase.initializeApp(config);
</script>
<!-- Mainly scripts -->
<script src="{{ URL::asset('front/js/jquery-2.1.1.js') }}"></script>
<script src="{{ URL::asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('front/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src=" {{ URL::asset('front/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ URL::asset('front/js/inspinia.js')}}"></script>
<script src="{{ URL::asset('front/js/plugins/pace/pace.min.js')}}"></script>

@yield("jquery")


</body>

</html>
