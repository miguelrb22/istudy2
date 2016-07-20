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

        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Modificar perfil</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form role="form">
                                <div class="form-group"><label>Puedes elegir un nombre mas molón</label> <input
                                            type="text" placeholder="Enter email" class="form-control" name="nombre">
                                </div>
                                <div class="form-group"><label>Modulo gente</label> <span
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

    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Cambiar Contraseña</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form role="form">
                                <div class="form-group"><label>Password</label> <input type="password"
                                                                                       placeholder="Password"
                                                                                       class="form-control"></div>
                                <div class="form-group"><label>Nueva Contraseña</label> <input type="password"
                                                                                               placeholder="Password"
                                                                                               class="form-control">
                                </div>
                                <div class="form-group"><label>Repetir Nueva Contraña</label> <input type="password"
                                                                                                     placeholder="Password"
                                                                                                     class="form-control">
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary pull-right" type="submit">
                                        <strong>Cambiar</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section("jquery")

    <script src="{{ URL::asset('front/js/bootstrap-filestyle.min.js')}}"></script>

@endsection


