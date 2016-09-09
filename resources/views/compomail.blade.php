@extends('master')
@section('maintitle') Proyecto @endsection

@section("css")

    <link href="{{ URL::asset('front/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('front/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('front/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('front/css/style.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('front/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">

    <link href="{{ URL::asset('front/css/plugins/select2/select2.min.css')}}" rel="stylesheet">



@endsection

@section('contenido')

    <div class="row">

        <div class="col-lg-2 col-xs-2">

            @include("sections/inbox_left")
        </div>

        <div class="col-lg-10 col-xs-10 animated fadeInRight">
            <div class="mail-box-header">
                <div class="pull-right tooltip-demo">
                </div>
                <h2>
                    Nuevo mensaje
                </h2>
            </div>
            <div class="mail-box">


                <div class="mail-body">


                    <form class="form-horizontal" method="get">
                        <div class="form-group"><label class="col-lg-2 control-label pull-left">Para:</label>

                            <div class="col-lg-10">

                                @if(isset($userClases))
                                <input type="text" name="nombre_receptor" class="form-control" value="{{$userClases->nombre}}" readonly>
                                    <input type="hidden" name="id_receptor" id="id_receptor" value="{{$userClases->id}}">

                                    @else



                                    <select class="js-example-basic-multiple col col-lg-6" id="id_receptor">
                                        <option></option>
                                        @foreach($follow as $f)

                                            <option value="{{$f->usuario_id2}}"> {{$f->nombre}}</option>
                                            @endforeach
                                    </select>

                                @endif


                            </div>
                        </div>

                    </form>

                </div>

                <div class="mail-text h-200">

                    <div class="summernote">


                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="mail-body text-right tooltip-demo">
                    <button  class="btn btn-sm btn-primary enviar" data-toggle="tooltip" data-placement="top" title="Send"><i class="fa fa-reply"></i> Enviar</button>
                </div>
                <div class="clearfix"></div>



            </div>
        </div>
    </div>

@endsection

@section("jquery")


    <script src="{{ URL::asset('front/js/plugins/summernote/summernote.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('front/js/plugins/select2/select2.full.min.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function(){

            $('.summernote').summernote();
        });

        var unread= "{{$unread}}";

        $(".total-inbox-indicator").text(unread);

        $(".enviar").click(function(e){

            var tipo = "{{ $tipo }}";

            var aHTML = $('.summernote').code();


            $.ajax({
                type: "POST",
                url: "{{URL::route('SendMessage')}}",
                data: {msg: aHTML, tipo: tipo, _token: "{{ csrf_token()}}", receptor: $("#id_receptor").val()},
                success: function (data) {
                    swal({
                        title: "Mensaje enviado con éxito",
                        text: "fiiiu",
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


    </script>


        <script type="text/javascript">
                $(".js-example-basic-multiple").select2({

                    placeholder: "Destinarario"
                });
    </script>



@endsection
