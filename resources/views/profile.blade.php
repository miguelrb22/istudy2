@extends('master')
@section('maintitle') Perfil @endsection

@section("css")

    <link href="{{ URL::asset('front/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}"
          rel="stylesheet">
    <link href="{{ URL::asset('front/css/plugins/ladda/ladda-themeless.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('front/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">


@endsection
@section('contenido')

    <div class="row">

        <div class="col col-lg-6 col-md-6">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Modificar perfil</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form id="form-basic-info" accept-charset="UTF-8" enctype="multipart/form-data">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group"><label>Puedes elegir un nombre mas molón</label>
                                        <input type="text" placeholder="New name" class="form-control" name="nombre" pattern=".{3,}"   required value="{{\Illuminate\Support\Facades\Auth::user()->nombre}}">
                                    </div>
                                    <div class="form-group"><label>Aparecer en los resultados de busqueda</label> <span
                                                class="fa fa-question fa-lg"></span>

                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" checked="" class="onoffswitch-checkbox" id="example1"
                                                       name="gente">
                                                <label class="onoffswitch-label" for="example1">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group"><label>Cambiar imagen de perfil</label>

                                        <input id="adjunto" type="file" class="filestyle reset"
                                               data-buttonBefore="true" accept="image/*"
                                               data-buttonName="btn-success" data-buttonText="Adjunto"
                                               data-size="sm" style="margin-top: 10px" name="img_profile">
                                    </div>


                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right" type="submit">
                                            <strong>Modificar</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Cambiar Contraseña</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form role="form" id="form-newpass">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group"><label>Password</label> <input type="password"
                                                                                           placeholder="Password"
                                                                                           class="form-control" name="pass" required></div>

                                    <div class="form-group"><label>Nueva Contraseña</label> <input id="pass" type="password"
                                                                                                   placeholder="Password"
                                                                                                   class="form-control" name="newpass" required>

                                        <span style="margin-top: 20px;" id="passstrength"></span>

                                    </div>
                                    <div class="form-group"><label>Repetir Nueva Contraña</label> <input type="password"
                                                                                                         placeholder="Password"
                                                                                                         class="form-control" name="renewpass" required>
                                    </div>
                                    <div>
                                        <button id="submit" disabled class="btn btn-sm btn-primary pull-right" type="submit">
                                            <strong>Cambiar</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6">

            <div class="col-lg-6"  >
                <div class="widget style1 navy-bg" style="height: 120px;">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-share-alt fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span> Salas</span>
                            <h2 class="font-bold">2</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="widget style1 lazur-bg" style="height: 120px;">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-file fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span> Archivos compartidos </span>
                            <h2 class="font-bold">7</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="widget style1 blue-bg" style="height: 120px">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-soccer-ball-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span> Partidos disputados </span>
                            <h2 class="font-bold">1</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="widget style1 yellow-bg" style="height: 120px">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span> Momentos </span>
                            <h2 class="font-bold">26</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="widget style1 red-bg" style="height: 120px">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-book fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span> Clases</span>
                            <h2 class="font-bold">2</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="widget style1 lazur-bg" style="height: 120px">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-area-chart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span>Proyectos</span>
                            <h2 class="font-bold">0</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="widget style1 navy-bg" style="height: 120px">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span> Seguidores</span>
                            <h2 class="font-bold">269</h2>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

@endsection

@section("jquery")

    <script src="{{ URL::asset('front/js/bootstrap-filestyle.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/plugins/sweetalert/sweetalert.min.js') }}"></script>


    <script type="text/javascript">

        $("#form-basic-info").submit(function (e) {

            e.preventDefault();
            $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});

            $.ajax({
                type: "POST",
                url: "{{URL::route('edit-perfil')}}",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                data: new FormData($(this)[0]),
                success: function (data) {

                    swal({
                        title: "Bien :)",
                        text: "Tus datos se han modificado correctamente",
                        type: "success",
                        showConfirmButton: true

                    }, function(){    location.reload()
                            }
                    );

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
    </script>

    <script type="text/javascript">

        $('#pass').keyup(function (e) {


            var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
            var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
            var enoughRegex = new RegExp("(?=.{6,}).*", "g");
            if (false == enoughRegex.test($(this).val())) {
                $('#passstrength').html('Contraseña muy corta');
                $('#submit').attr("disabled", true);
                $('#passstrength').css("color", "grey");

            }

            else if (strongRegex.test($(this).val())) {
                $('#passstrength').html('Contraseña fuerte');
                $('#submit').removeAttr("disabled");
                $('#passstrength').css("color", "green");

            }

            else if (mediumRegex.test($(this).val())) {
                $('#passstrength').html('Contraseña seguridad media');
                $('#submit').removeAttr("disabled");
                $('#passstrength').css("color", "orange");


            }

            else {
                $('#passstrength').html('Contraseña muy debil');
                $('#submit').attr("disabled", true);
                $('#passstrength').css("color", "red");


            }
            return true;
        });
    </script>

    <script type="text/javascript">



        $("#form-newpass").submit(function (e) {

            e.preventDefault();

            if($('[name="newpass"]').val() !== $('[name="renewpass"]').val() ){

                swal({
                    title: "Error!",
                    text: "Las contraseñas no coinciden",
                    type: "error",
                    showConfirmButton: true
                });
            }else {
                $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});

                $.ajax({
                    type: "POST",
                    url: "{{URL::route('change-pass')}}",
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData($(this)[0]),
                    success: function (data) {

                        swal({
                                    title: "Bien :)",
                                    text: "Tus datos se han modificado correctamente",
                                    type: "success",
                                    showConfirmButton: true

                                }, function () {
                                }
                        );

                    },
                    error: function (data) {

                        swal({
                            title: "Error!",
                            text: "Contraseña incorrecta",
                            type: "error",
                            showConfirmButton: true
                        });

                    }
                });
            }

        });
    </script>

@endsection


