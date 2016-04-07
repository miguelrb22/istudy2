
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login 2</title>

    <link href="{{ URL::asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('front/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('front/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('front/css/style.css')}}" rel="stylesheet">

    <style>

        body {

            background-image: url("{{ URL::asset('images/register20.jpg')}}");
            background-position: center top;
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
    </style>

</head>

<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-6">
            <h2 class="font-bold">Bienvenido a IStudy</h2>


        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <form class="m-t" role="form" method="POST" action="{{URL::route('loginp')}}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Usuario" required="" name="email">
                    </div>
                    <div class="form-group">

                        <input type="password" class="form-control" placeholder="Contraseña" required="" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Iniciar sesión</button>

                    <a href="#">
                        <small>He olvidado la contraseña</small>
                    </a>

                    <p class="text-muted text-center">
                        <small>¿No tienes una cuenta?</small>
                    </p>
                    <a class="btn btn-sm btn-white btn-block" href="{{URL::route('register')}}">Crear una cuenta</a>
                </form>
                <p class="m-t">
                    <small>IStudy social edu network &copy; 2016</small>
                </p>
            </div>
        </div>
    </div>
    <hr/>
</div>

</body>

</html>
