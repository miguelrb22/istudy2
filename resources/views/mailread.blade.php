@extends('master')
@section('maintitle') Mensajes privados @endsection

@section("css")


@endsection
@section('contenido')

    <div class="row">

        <div class="col-lg-2">
            @include("sections/inbox_left")
        </div>
        <div class="col-lg-10 animated fadeInRight">
            <div class="mail-box-header">
                <div class="pull-right tooltip-demo">
                </div>

                <div class="mail-tools tooltip-demo">

                    <h5>
                        <span class="pull-right font-noraml">{{ $mensaje->created_at }}</span>
                        <span class="font-noraml">De: </span> {{ $emisor->nombre }}
                    </h5>
                </div>
            </div>
            <div class="mail-box">


                <div class="mail-body">
                   {!! $mensaje->cuerpo !!}
                </div>
                <div class="mail-body text-right tooltip-demo">
                    <a class="btn btn-sm btn-white" href="mail_compose.html"><i class="fa fa-reply"></i> Contestar</a>
                </div>


            </div>
        </div>

    </div>

@endsection

@section("jquery")

    <script type="text/javascript">
        var unread= "{{$unread}}";

        $(".total-inbox-indicator").text(unread);
    </script>

@endsection
