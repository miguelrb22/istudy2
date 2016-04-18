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

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>

        <h2 style="font-weight: bold">Registrate en IStudy</h2>
        <p style="font-weight: bold">Rellena el siguiente formulario</p>
        <form id="register" class="m-t" role="form">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nombre de pila" required="" name="nombre">
            </div>
            <div class="form-group" id="femail">
                <input type="email" class="form-control" placeholder="Email" required="" name="email" id="email">
                <span class="help-block m-b-none " style="color: red; display: none; font-weight: bold" id="error-msg">Este email ya está siendo usado por otro usuario</span>

            </div>
            <div class="form-group" >
                <input type="password" class="form-control" placeholder="Password" required="" name="password" id="pass">
                <span style="margin-top: 10px; font-weight: bold" id="passstrength"></span>

            </div>
            <button id="submit" disabled type="submit" class="btn btn-primary block full-width m-b">Registrarse</button>

            <h3 class="text-muted text-center">¿Ya tienes una cuenta?</h3>
            <a class="btn btn-sm btn-white btn-block" href="{{URL::route('login')}}">Iniciar sesión</a>
        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ URL::asset('front/js/jquery-2.1.1.js') }}"></script>
<script src="{{ URL::asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('front/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('front/js/blockUI.js') }}"></script>

<!-- iCheck -->
<script>

    $( document ).ready(function() {


        $('#pass').keyup(function(e) {


        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{6,}).*", "g");
        if (false == enoughRegex.test($(this).val())) {
            $('#passstrength').html('Contraseña muy corta');
            $('#submit').attr("disabled",true);
            $('#passstrength').css("color","grey");

        }

        else if (strongRegex.test($(this).val())) {
            $('#passstrength').html('Contraseña fuerte');
            $('#submit').removeAttr("disabled");
            $('#passstrength').css("color","green");

        }

        else if (mediumRegex.test($(this).val())){
            $('#passstrength').html('Contraseña seguridad media');
            $('#submit').removeAttr("disabled");
            $('#passstrength').css("color","orange");


        }

        else {
        $('#passstrength').html('Contraseña muy debil');
            $('#submit').attr("disabled",true);
            $('#passstrength').css("color","red");


        }
    return true;
    });

        $( document ).ajaxStart(function() {
            $.blockUI({ message: null });
        });

        $( document ).ajaxStop(function() {
            $.unblockUI();
        });

        $("#register").submit(function(e){

            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "{{URL::route('registerp')}}",
                data: $("#register").serialize(),
                success: function (data) {

                    if(data == 2){

                        $("#femail").addClass("has-error");
                        $("#error-msg").css("display","block");



                    }else if (data == 1){

                        setTimeout(function(){            window.location.replace("{{URL::route('login')}}");
                        },8000);
                        swal({
                            title: "Correo de confirmación enviado",
                            text: "Hemos enviado un correo de confirmación a su cuenta de correo. Por favor revise el mensaje para activar su cuenta",
                            type: "success",
                            showConfirmButton: false,
                            timer: 8000
                        });
                    }
                }
            });
        });

        $('#email').keydown(function(e) {

            $("#femail").removeClass("has-error");
            $("#error-msg").css("display","none");
        });



    });

</script>
</body>

</html>
