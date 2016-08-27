@extends('master')
@section('maintitle') Deportes @endsection

@section("css")

    <link href="{{ URL::asset('front/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('front/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet">


@endsection
@section('contenido')

    <div class="row">
        <div class="col col-lg-2 col-md-2 col-sm-12 col-xs-12 ">

            <button class="btn btn-primary btn-xs dim" data-toggle="modal" data-target="#myModal"><i
                        class="fa fa-plus"></i> Organizar nuevo
            </button>


        </div>

        <div class="col col-lg-4 col-md-4 col-sm-12 col-xs-12 ">


            <select class="form-control" name="a_mostrar" id="deportes_Select">
                <option value="0">Mostrando todos</option>
            </select>

        </div>

    </div>
<div class="row">

    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-info-circle"></i> Partido de tenis
            </div>
            <div class="panel-body" style="height: 120px">
                <p>Se buscan amantes de este deporte para jugar el viernes a las 6 ¿ alquien se apunta?</p>
            </div>
            <div class="panel-footer"> Se buscan 3 personas <button class="pull-right btn btn-danger btn-xs">Participar</button></div>

        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-info-circle"></i> Partido de futbol
            </div>
            <div class="panel-body" style="height: 120px">
                <p>Haber si organizamos dos equipos y jugamos un partidillo de futbol</p>
            </div>
            <div class="panel-footer"> Se buscan 22 personas <button class="pull-right btn btn-danger btn-xs">Participar</button></div>

        </div>
    </div>

</div>
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-success col col-lg-12" style="display: none;">Ver mas antiguos</button>
        </div>
    </div>

    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                    <i class="fa fa-soccer-ball-o modal-icon"></i>
                    <h4 class="modal-title">Nuevo evento deportivo</h4>
                    <small class="font-bold">Rellena los campos a continuacion para organizar un nuevo evento deportivo</small>
                </div>
                <div class="modal-body">

                    <form id="new_sala" class="m-t" role="form">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Titulo" id="nombre_sala"
                                   required="required" name="nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Descripcion" required
                                   name="descripcion" id="descripcion">
                        </div>
                        <div class="form-group">

                            <label style="float: left" for="carrera">Deporte</label>

                            <select class="form-control m-b" name="asignatura_id" id="asignatura">

                            </select>
                        </div>

                        <div class="form-group">

                            <p class="font-bold">
                            Cuantos juegadores necesitas
                            </p>
                            <input id="demo1" type="text" value="1" name="demo1" readonly="readonly">
                        </div>



                        <div class="form-group ">


                            <br>
                            <button type="submit" style="float: right;" class="submit ladda-button btn btn-primary"
                                    data-style="zoom-in">A jugar
                            </button>

                            <button type="button" style="float: right; margin-right: 2%" class="btn btn-white"
                                    data-dismiss="modal">Cerrar
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@section("jquery")


    <script src="{{ URL::asset('front/js/plugins/ladda/spin.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>

    <script>
        $("input[name='demo1']").TouchSpin({
            min: 1,
            max: 100,
            step: 1,
            decimals: 0,
            boostat: 5,
            maxboostedstep: 5
        });
    </script>


@endsection
