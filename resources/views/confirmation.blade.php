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
    <link href="{{ URL::asset('front/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">

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


<!-- Mainly scripts -->
<script src="{{ URL::asset('front/js/jquery-2.1.1.js') }}"></script>
<script src="{{ URL::asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('front/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

<!-- iCheck -->
<script>

    $( document ).ready(function() {


        var msg = "{{ $msg }}";

        if(msg == "success") {

            swal({
                title: "Cuenta confirmada con éxito",
                text: "Espere por favor...",
                type: "success",
                showConfirmButton: false,
                timer: 3990
            });
        }else{

            swal({
                title: "Error al confirmar la cuenta",
                text: "Cuenta ya confirmada con anterioridad o token inválido",
                type: "warning",
                showConfirmButton: false,
                timer: 3990
            });
        }

        setTimeout(function () {
            window.location.replace("{{URL::route('login')}}");
        }, 4000);


    });

</script>
</body>

</html>
