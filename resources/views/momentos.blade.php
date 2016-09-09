<?php $user = new \App\model\User();?>
@extends('master')
@section('maintitle') Momentos @endsection

@section("css")

    <link href="{{ URL::asset('front/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">

<style>
    textarea { resize:none; }

    @keyframes heartbeat
    {
        0%
        {
            transform: scale( .75 );
        }

        50%
        {
            transform: scale( 1 );
        }

        100%
        {
            transform: scale( 0.75 );
        }
    }

    div#heart
    {
        width: 50px;
        height: 50px;
        animation: heartbeat 4s infinite;
    }
</style>
@endsection
@section('contenido')

    <div class="row">

        <div class="col-md-5">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Perfil


                        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#ModalNewImage"><i class="fa fa-upload"></i></button>

                    </h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right bannerimg">
                        <img alt="image" class="img-responsive" src="{{ URL::asset('images/banners/')}}/{{\Illuminate\Support\Facades\Auth::user()->img_url_banner}}">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>Miguel Ruiz</strong></h4>
                        <h5>
                            Sobre Mi  <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#ModalNewDescription"><i class="fa fa-pencil"></i></button>
                        </h5>
                        <p>

                           {{\Illuminate\Support\Facades\Auth::user()->sobremi}}
                        </p>
                        <div class="row m-t-lg">
                            <div class="col-md-4">
                                <span class="bar" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><rect fill="#1ab394" x="0" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="3.3" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect><rect fill="#1ab394" x="6.6" y="0" width="2.3" height="16"></rect><rect fill="#d7d7d7" x="9.899999999999999" y="5.333333333333334" width="2.3" height="10.666666666666666"></rect><rect fill="#1ab394" x="13.2" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="16.5" y="0" width="2.3" height="16"></rect><rect fill="#1ab394" x="19.799999999999997" y="3.555555555555557" width="2.3" height="12.444444444444443"></rect><rect fill="#d7d7d7" x="23.099999999999998" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect><rect fill="#1ab394" x="26.4" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="29.7" y="12.444444444444445" width="2.3" height="3.5555555555555554"></rect></svg>
                                <h5><strong id="postsdata">{{ $user->momentos(\Illuminate\Support\Facades\Auth::user()->id)}}</strong> Momentos</h5>
                            </div>
                            <div class="col-md-4">
                                <span class="line" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><polygon fill="#1ab394" points="0 15 0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666 32 15"></polygon><polyline fill="transparent" points="0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666" stroke="#169c81" stroke-width="1" stroke-linecap="square"></polyline></svg>
                                <h5><strong id="followingdata">28</strong> Sigues</h5>
                            </div>
                            <div class="col-md-4">
                                <span class="bar" style="display: none;">5,3,2,-1,-3,-2,2,3,5,2</span><svg class="peity" height="16" width="32"><rect fill="#1ab394" x="0" y="0" width="2.3" height="10"></rect><rect fill="#d7d7d7" x="3.3" y="4" width="2.3" height="6"></rect><rect fill="#1ab394" x="6.6" y="6" width="2.3" height="4"></rect><rect fill="#d7d7d7" x="9.899999999999999" y="10" width="2.3" height="2"></rect><rect fill="#1ab394" x="13.2" y="10" width="2.3" height="6"></rect><rect fill="#d7d7d7" x="16.5" y="10" width="2.3" height="4"></rect><rect fill="#1ab394" x="19.799999999999997" y="6" width="2.3" height="4"></rect><rect fill="#d7d7d7" x="23.099999999999998" y="4" width="2.3" height="6"></rect><rect fill="#1ab394" x="26.4" y="0" width="2.3" height="10"></rect><rect fill="#d7d7d7" x="29.7" y="6" width="2.3" height="4"></rect></svg>
                                <h5><strong id="followersdata">240</strong> Seguidores</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Momentos</h5>
                    <div class="ibox-tools">

                        <a data-toggle="modal" data-target="#ModalNewMoment">
                           Nuevo <i class="fa fa-plus fa-2x"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">

                    <div>
                        <div class="feed-activity-list">

                            @foreach($momentos as $moment)

                                <?php $author = \App\model\User::find($moment->usuario_id)?>
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="{{ URL::asset('images/profiles/')}}/{{$author->img_url}}">
                                </a>
                                <div class="media-body ">

                                    <a href="{{URL::route("momentosUser",["id" => $author->id])}}"><strong>{{$author->nombre}}</strong> </a><br>
                                    <small class="text-muted">{{$moment->created_at}}</small>


                                    <div class="well">
                                        <span style="font-size:14px">{{ $moment->texto }} </span>
                                    </div>

                                    @if($moment->url != null)
                                    <br>
                                    <img alt="image" class="img-responsive" src="{{ URL::asset('images/banners')}}/{{$moment->url}}">
                                    <br>
                                    @endif
                                    <div class="pull-right megusta">
                                        <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                    </div>

                                </div>
                            </div>
                                @endforeach
                        </div>

                        <div class="divvermas" style="display: inline-block">
                        <button class="btn btn-primary btn-block m" onclick="moreMoments()"><i class="fa fa-arrow-down"></i> Ver mas</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="modal inmodal" id="ModalNewImage" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                    <i class="fa fa-file-image-o modal-icon"></i>
                    <h4 class="modal-title">Cambiar banner</h4>
                </div>
                <div class="modal-body">

                    <form id="newBanner" class="m-t" role="form" accept-charset="UTF-8" enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <input type="file" class="form-control" placeholder="Nueva imagen..."
                                   required="required" name="banner" accept="image/x-png, image/jpeg">
                        </div>

                        <div class="form-group ">


                            <br>
                            <button type="submit" style="float: right;" class="submit ladda-button btn btn-primary"
                                    data-style="zoom-in">Cambiar
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

    <div class="modal inmodal" id="ModalNewDescription" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                    <i class="fa fa-file-text modal-icon"></i>
                    <h4 class="modal-title">Cuentanos sobre tí</h4>
                </div>
                <div class="modal-body">

                    <form id="new_description" class="m-t" role="form">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">

                            <textarea class="form-control" rows="5" placeholder="Escribe algo sobre ti..." name="descripcion"></textarea>
                        </div>


                        <div class="form-group ">


                            <br>
                            <button type="submit" style="float: right;" class="submit ladda-button btn btn-primary"
                                    data-style="zoom-in">Cambiar
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


    <div class="modal inmodal" id="ModalNewMoment" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                    <i class="fa fa-bullhorn modal-icon"></i>
                    <h4 class="modal-title">Cuéntanos</h4>
                </div>
                <div class="modal-body">

                    <form id="newMoment" class="m-t" role="form" accept-charset="UTF-8" enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="comment">Escribe</label>
                            <textarea class="form-control" rows="5" name="escribe" maxlength="300"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="comment">Ilustra</label>

                            <input type="file" class="form-control" placeholder="Nueva imagen..."
                                    name="ilustra" accept="image/x-png, image/jpeg">
                        </div>

                        <div class="form-group ">


                            <br>
                            <button type="submit" style="float: right;" class="submit ladda-button btn btn-primary"
                                    data-style="zoom-in">Publicar
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

    <script type="text/javascript">

        $("#newBanner").submit(function (e) {

            e.preventDefault();


                $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});

                $.ajax({
                    type: "POST",
                    url: "{{URL::route('changebanner')}}",
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData($(this)[0]),
                    success: function (data) {

                        location.reload();
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


        });
    </script>

    <script type="text/javascript">

        $("#new_description").submit(function (e) {

            e.preventDefault();


            $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});

            $.ajax({
                type: "POST",
                url: "{{URL::route('changesobremi')}}",
                data: $("#new_description").serialize(),
                success: function (data) {

                    location.reload();

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


        });
    </script>


    <script type="text/javascript">

        $("#newMoment").submit(function (e) {

            e.preventDefault();


            $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});

            $.ajax({
                type: "POST",
                url: "{{URL::route('newmoment')}}",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                data: new FormData($(this)[0]),
                success: function (data) {
                    location.reload();

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


        });
    </script>

    <script type="text/javascript">

        var page = 1;
        function moreMoments(){

            $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{URL::route('moremoments')}}",
                data: {page: page},
                success: function (data) {

                    page++;
                    var remain = data["total"];
                    $(".feed-activity-list").append(data["result"]);

                    if(remain < 10) {

                        $(".divvermas").html("No hay mas momentos que mostrar");

                    }
                },
                error: function (data) {

                }
            });
        }
    </script>

    <script type="text/javascript">

        $(".megusta").click(function(e){

            $(this).html('<div id="heart" style="margin: 0"><img class="bottom" src="https://goo.gl/nN8Haf" width="20px"></div>')
        });
    </script>


@endsection
