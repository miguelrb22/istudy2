@extends('master')
@section('maintitle') Salas @endsection

@section("css")

    <link href="{{ URL::asset('front/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}"
          rel="stylesheet">
    <link href="{{ URL::asset('front/css/plugins/ladda/ladda-themeless.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('front/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">

@endsection
@section('contenido')


    <div class="row">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <button class="btn btn-primary btn-xs dim" data-toggle="modal" data-target="#myModal"><i
                        class="fa fa-plus"></i> Nueva
            </button>
            <button class="btn btn-info btn-xs dim" data-toggle="modal" data-target="#myModal2"><i
                        class="fa fa-share-square"></i> Unirse
            </button>

        </div>
    </div>

    <?php $i=1; ?>
    <?php $total = count($salas) ?>
    @foreach($salas as $sala)

        @if($i==1 || $i%4==0) <div class="row"> @endif
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget-head-color-box  blue-bg navy-bg p-lg text-center">
                        <div class="m-b-md">
                            <h2 class="font-bold no-margins">
                                {{$sala->nombre}}
                            </h2>
                            <small>{{$sala->descripcion}}</small>
                        </div>
                        <div>
                            <span>{{2 + 1}} participantes</span> |
                            <span>{{3 + 2}} Mensajes</span> |
                            <span>{{2}} Archivos</span>
                        </div>
                    </div>
                    <div class="widget-text-box ">
                        <div class="text-right">
                            <a class="btn btn-xs btn-danger" onclick="eliminar_sala({{$sala->sala_id}})"><i
                                        class="fa fa-thumbs-up"></i> Abandonar </a>
                            <a href="{{ route('sala',[$sala->sala_id])}}" class="btn  btn-xs btn-primary"><i
                                        class="fa fa-heart"></i> Acceder </a>
                        </div>
                    </div>
                </div>

            @if($i%4==0 || $i==$total)     </div> @endif


        <?php $i++ ?>

    @endforeach

    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                    <i class="fa fa-book modal-icon"></i>
                    <h4 class="modal-title">Nueva sala</h4>
                    <small class="font-bold">Rellena los campos a continuacion para crear una nueva sala</small>
                </div>
                <div class="modal-body">

                    <form id="new_sala" class="m-t" role="form">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre de la sala" id="nombre_sala"
                                   required="required" name="nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Descripcion" required
                                   name="descripcion" id="descripcion">
                        </div>
                        <div class="form-group">

                            <label style="float: left" for="carrera">Dinos para que asignatura será la sala</label>

                            <select class="form-control m-b" name="asignatura_id" id="asignatura">
                                @foreach($asignaturas as $asignatura)
                                    <option value="{{$asignatura->id}}"> {{$asignatura->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">

                            <div class="checkbox checkbox-success">
                                <input id="checkbox3" type="checkbox" name="sala_privada">
                                <label for="checkbox3">
                                    Sala privada (Podrás invitar personas mediante un codigo)
                                </label>
                            </div>

                        </div>

                        <div class="form-group ">


                            <br>
                            <button type="submit" style="float: right;" class="submit ladda-button btn btn-primary"
                                    data-style="zoom-in">Crear sala
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

    <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated lightSpeedIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                    <i class="fa fa-rocket modal-icon"></i>
                    <h4 class="modal-title">Unirse a una sala</h4>
                    <small class="font-bold">Introduce el codigo que te han facilitado para unirte</small>
                </div>
                <div class="modal-body">

                    <form id="join_sala" class="m-t" role="form">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Código" required="required"
                                   name="codigo" id="codigo">
                        </div>

                        <div class="form-group ">


                            <br>
                            <button type="submit" style="float: right;" class="submit ladda-button2 btn btn-primary"
                                    data-style="zoom-in">Unirse
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
    <script src="{{ URL::asset('front/js/plugins/ladda/ladda.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/plugins/ladda/ladda.jquery.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/plugins/sweetalert/sweetalert.min.js') }}"></script>



    <script type="text/javascript">

        $('#myModal').on('hidden.bs.modal', function () {

            $("#nombre_sala").val("");
            $("#descripcion").val("");
        });

        var l = $('.ladda-button').ladda();
        var l2 = $('.ladda-button2').ladda();


        $("#new_sala").submit(function (e) {

            e.preventDefault();

            l.ladda('start');

            $.ajax({
                type: "POST",
                url: "{{URL::route('create-room')}}",
                data: $("#new_sala").serialize(),
                success: function (data) {

                    l.ladda('stop');
                    $('#myModal').modal('toggle');
                    swal({
                        title: "Sala creada correctamente",
                        text: data,
                        type: "success",
                        showConfirmButton: true
                    });

                },
                error: function (data) {

                    l.ladda('stop');

                }
            });
        });


        $("#join_sala").submit(function (e) {

            e.preventDefault();

            l2.ladda('start');

            $.ajax({
                type: "POST",
                url: "{{URL::route('get-in')}}",
                data: $("#join_sala").serialize(),
                success: function (data) {

                    l2.ladda('stop');
                    $('#myModal2').modal('toggle');
                    swal({
                        title: "Te has unido correctamente",
                        text: ":)",
                        type: "success",
                        showConfirmButton: true
                    });

                },
                error: function (data) {

                    swal({
                        title: "Error al unirse a la sala",
                        text: ":(",
                        type: "error",
                        showConfirmButton: true
                    });
                    l2.ladda('stop');

                }
            });
        });

        function eliminar_sala(id) {
            swal({
                title: "¿Esta seguro que desea abandonar la sala?",
                text: "Si eres el creador de esta sala, esta se eliminará :(",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, borrarla",
                closeOnConfirm: false
            }, function () {

                $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});
                $.ajax({
                    type: "POST",
                    url: "{{URL::route('leave-room')}}",
                    data: {id_sala: id},
                    success: function (data) {

                        swal("Has abandonado la sala", "Esperamos verte por aqui pronto", "success");


                    },
                    error: function (data) {

                        swal("Error", "No se ha podido eliminar la sala por algun misterio desconocido, intentalo mas tarde", "error");

                    }
                });
            });

        }


    </script>
@endsection


