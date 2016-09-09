@extends('master')
@section('maintitle') Clases @endsection

@section("css")

    <link href="{{ URL::asset('front/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('front/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('front/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">

@endsection
@section('contenido')

    <div class="row">
        <div class="col col-lg-2 col-md-2 col-sm-12 col-xs-12 ">

            <button class="btn btn-primary btn-xs dim" data-toggle="modal" data-target="#myModal"><i
                        class="fa fa-plus"></i> Publicar oferta
            </button>
        </div>

        <div class="col col-lg-4 col-md-4 col-sm-12 col-xs-12 ">


            <select class="form-control" name="a_mostrar" id="clases_Select">
                <option value="0">Mostrando todas las materias</option>
                @foreach($asignaturas as $asignatura)
                    <option value="{{$asignatura->id}}">{{$asignatura->nombre}}</option>

                @endforeach
                <option value="99">Publicadas por mi</option>

            </select>

        </div>

    </div>
    <div class="container-fluid" id="listado">


    </div>
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-success col col-lg-12" style="display: none">Ver mas antiguas</button>
        </div>
    </div>

    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                    <i class="fa fa-book modal-icon"></i>
                    <h4 class="modal-title">Nueva oferta de clases</h4>
                    <small class="font-bold">Rellena los campos a continuacion para publicar una nueva oferta de clases particulares</small>
                </div>
                <div class="modal-body">

                    <form id="new_clases" class="m-t" role="form">

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

                            <label style="float: left" for="carrera">Rama</label>

                            <select class="form-control" name="a_dar" id="">
                                @foreach($asignaturas as $asignatura)
                                    <option value="{{$asignatura->id}}">{{$asignatura->nombre}}</option>

                                @endforeach
                            </select>

                            </select>
                        </div>

                        <div class="form-group">

                            <p class="font-bold">
                            Precio por hora
                            </p>
                            <input id="demo1" type="text" value="1" name="precio" readonly="readonly">
                        </div>



                        <div class="form-group ">


                            <br>
                            <button type="submit" style="float: right;" class="submit ladda-button btn btn-primary"
                                    data-style="zoom-in">A enseñar!
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
    <link href="{{ URL::asset('front/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">


    <script>
        $("input[name='precio']").TouchSpin({
            min: 0,
            max: 100,
            step: 1,
            decimals: 0,
            boostat: 5,
            maxboostedstep: 5
        });
    </script>

    <script type="text/javascript">


        $("#new_clases").submit(function (e) {

            e.preventDefault();
            $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});

            $.ajax({
                type: "POST",
                url: "{{URL::route('create-clase')}}",
                data: $("#new_clases").serialize(),
                success: function (data) {

                    $('#myModal').modal('toggle');
                    swal({
                        title: "Bien hecho!",
                        text: "Pronto se pondrán en contacto contigo!",
                        type: "success",
                        showConfirmButton: true
                    });
                },
                error: function (data) {

                    swal({
                        title: "Error!",
                        text: "Se ha producido un error que ni tu ni yo comprendemos, intentalo mas tarde",
                        type: "error",
                        showConfirmButton: true
                    });

                }
            });
        });

        function getClases(actual){


                $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});

                $.ajax({
                    type: "POST",
                    url: "{{URL::route('get-clases')}}",
                    data: {tipo: actual},
                    success: function (data) {

                        $("#listado").html(data);
                    },
                    error: function (data) {


                    }
                });
        }

        getClases(0);

    </script>

    <script type="text/javascript">

        $( "#clases_Select" ).change(function() {
           var actual =  $(this).val();
            getClases(actual);
        });
    </script>


@endsection


