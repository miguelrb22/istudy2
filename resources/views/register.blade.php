<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Register</title>

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

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>

        <h2 style="font-weight: bold">Registrate en IStudy</h2>
        <p style="font-weight: bold">Rellena el siguiente formulario</p>
        <form class="m-t" role="form" method="POST" action="{{URL::route('registerp')}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nombre" required="" name="nombre">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" required="" name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="" name="password">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Registrarse</button>

            <h3 class="text-muted text-center">¿Ya tienes una cuenta?</h3>
            <a class="btn btn-sm btn-white btn-block" href="{{URL::route('login')}}">Iniciar sesión</a>
        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ URL::asset('front/js/jquery-2.1.1.js') }}"></script>
<script src="{{ URL::asset('front/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->

</body>

</html>
