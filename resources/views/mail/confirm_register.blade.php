<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="description" content="The HTML5 Herald">

</head>

<body>
<h1>Bienvenido a IStudy</h1>
<p>Por favor, para completar el registro, pulse en el enlace a continuación</p>
<a target="_blank" href="{{ route('confirmar-registro',[$usuario,$token]) }}">Confirmar cuenta</a>

</body>
</html>