@extends('master')
@section('maintitle') Inicio @endsection

@section('contenido')

    <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <a href="{{ URL::route('salas')}}">
                <div class="widget red-bg p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-leanpub fa-4x"></i>
                        <br>
                        <br>
                        <h3 class="font-bold no-margins">
                            Salas
                        </h3>
                        <br>
                        <small>Crea salas y comparte archivos con tus compañeros</small>
                        <br>
                        <br>
                        <br>
                        <br>

                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <a href="{{ URL::route('momentos')}}">
                <div class="widget blue-bg p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-users fa-4x"></i>
                        <br>
                        <br>
                        <h3 class="font-bold no-margins">
                            Momentos
                        </h3>
                        <br>
                        <small>Comparte lo que piensas o lo que te gusta y descubre cosas sobre los demas</small>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <a href="{{ URL::route('clases')}}">
                <div class="widget yellow-bg p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-newspaper-o fa-4x"></i>
                        <br>
                        <br>
                        <h3 class="font-bold no-margins">
                            Clases
                        </h3>
                        <br>
                        <small>¿Te sobra conocimiento? Ofrécelo </small>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </a>
        </div><div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <a href="{{ URL::route('deportes')}}">
                <div class="widget lazur-bg p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-soccer-ball-o fa-4x"></i>
                        <br>
                        <br>
                        <h3 class="font-bold no-margins">
                            Eventos deportivos
                        </h3>
                        <br>
                        <small>Organiza un partido del deporte que mas te guste</small>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </a>
        </div><div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <a href="{{ URL::route('salas')}}">
                <div class="widget navy-bg p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-leanpub fa-4x"></i>
                        <br>
                        <br>
                        <h3 class="font-bold no-margins">
                            Proyectos o ideas
                        </h3>
                        <br>
                        <small>¿Tienes una idea y necesitas ayuda? Encuentra lo que necesitas aquí</small>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </a>
        </div><div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <a href="{{ URL::route('salas')}}">
                <div class="widget white-bg p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-leanpub fa-4x"></i>
                        <br>
                        <br>
                        <h3 class="font-bold no-margins">
                            Ocio
                        </h3>
                        <br>
                        <small>Proximamente</small>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <a href="{{ URL::route('salas')}}">
                <div class="widget jumbotron p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-leanpub fa-4x"></i>
                        <br>
                        <br>
                        <h3 class="font-bold no-margins">
                            Academias
                        </h3>
                        <br>
                        <small>Próximamente</small>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </a>
        </div>


    </div>

    @endsection