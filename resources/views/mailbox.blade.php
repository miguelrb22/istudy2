@extends('master')
@section('maintitle') Mensajes privados @endsection

@section("css")

    <link href="{{ URL::asset('front/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">


@endsection
@section('contenido')

    <div class="row">

        <div class="col-lg-2">
            @include("sections/inbox_left")
        </div>
        <div class="col-lg-10 animated fadeInRight">
            <div class="mail-box-header">

                <form method="get" action="index.html" class="pull-right mail-search">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" name="search" placeholder="Buscar email">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-sm btn-primary">
                                Buscar
                            </button>
                        </div>
                    </div>
                </form>
                <h2>
                Mensajes privados
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">
                    <div class="btn-group pull-right">
                        <p class="demo2"></p>

                    </div>

                </div>
            </div>
            <div class="mail-box">

                <table class="table table-hover table-mail" cellspacing="0" cellpadding="0">
                    <tbody class="messageslist">

                    </tbody>
                </table>


            </div>
        </div>

    </div>

@endsection

@section("jquery")


    <script src="{{ URL::asset('front/js/plugins/bootpag/bootpag.min.js') }}"></script>
    <script src="{{ URL::asset('front/js/plugins/toastr/toastr.min.js') }}"></script>


    <script type="text/javascript">



        var type = "{{$type}}";

        function  getMessages(){

            $.ajax({
                type: "POST",
                url: "{{URL::route('getPrivateMessagesSended')}}",
                data: {_token: "{{ csrf_token()}}", page: 1, type: type},
                success: function (data) {

                    $(".messageslist").html(data);

                }
            });
        }

        var total = "{{$total}}";
        var unread= "{{$unread}}";
        var pages = total/10;
        var resto = total%10;

        if(resto >= 0) pages= Math.floor(pages)+1;


        $(".total-inbox-indicator").text(unread);



        $('.demo2').bootpag({
            total: pages,
            page: 1,
            maxVisible: 3
        }).on('page', function(event, num){
            $.ajax({
                type: "POST",
                url: "{{URL::route('getPrivateMessagesSended')}}",
                data: {_token: "{{ csrf_token()}}", page: num, type: type},
                success: function (data) {

                    $(".messageslist").html(data);

                }
            });
        });

        getMessages();

        function  deleteMail(id){

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": false,
                "preventDuplicates": true,
                "positionClass": "toast-top-full-width",
                "onclick": null,
                "showDuration": "400",
                "hideDuration": "1000",
                "timeOut": "7000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error("Has eliminado el mensaje, aunque aun se puede recuperar en la sección de borrados", "Borrado");

            $.ajax({
                type: "POST",
                url: "{{URL::route('deletemailtemp')}}",
                data: {_token: "{{ csrf_token()}}", id: id},
                success: function (data) {

                    $("#mail"+id).remove();
                }
            });
        }

        function  reliveMail(id){

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": false,
                "preventDuplicates": true,
                "positionClass": "toast-top-full-width",
                "onclick": null,
                "showDuration": "400",
                "hideDuration": "1000",
                "timeOut": "7000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("Mensaje recuperado correctamente", "Ha vuelto!");

            $.ajax({
                type: "POST",
                url: "{{URL::route('reliveMail')}}",
                data: {_token: "{{ csrf_token()}}", id: id},
                success: function (data) {

                    $("#mail"+id).remove();
                }
            });
        }

        function  deleteMailOut(id){

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": false,
                "preventDuplicates": true,
                "positionClass": "toast-top-full-width",
                "onclick": null,
                "showDuration": "400",
                "hideDuration": "1000",
                "timeOut": "7000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error("Has eliminado el mensaje, aunque aun se puede recuperar en la sección de borrados", "Borrado");

            $.ajax({
                type: "POST",
                url: "{{URL::route('deletemailtempOut')}}",
                data: {_token: "{{ csrf_token()}}", id: id},
                success: function (data) {

                    $("#mail"+id).remove();
                }
            });
        }

        function  reliveMailOut(id){

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": false,
                "preventDuplicates": true,
                "positionClass": "toast-top-full-width",
                "onclick": null,
                "showDuration": "400",
                "hideDuration": "1000",
                "timeOut": "7000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("Mensaje recuperado correctamente", "Ha vuelto!");

            $.ajax({
                type: "POST",
                url: "{{URL::route('reliveMailOut')}}",
                data: {_token: "{{ csrf_token()}}", id: id},
                success: function (data) {

                    $("#mail"+id).remove();
                }
            });
        }

        function  fullDelete(id){

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": false,
                "preventDuplicates": true,
                "positionClass": "toast-top-full-width",
                "onclick": null,
                "showDuration": "400",
                "hideDuration": "1000",
                "timeOut": "7000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error("Mensaje eliminado permanentemente", "Bye bye!");

            $.ajax({
                type: "POST",
                url: "{{URL::route('fullDelete')}}",
                data: {_token: "{{ csrf_token()}}", id: id},
                success: function (data) {

                    $("#mail"+id).remove();
                }
            });
        }

        function  fullDeleteOut(id){

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": false,
                "preventDuplicates": true,
                "positionClass": "toast-top-full-width",
                "onclick": null,
                "showDuration": "400",
                "hideDuration": "1000",
                "timeOut": "7000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error("Mensaje eliminado permanentemente", "Bye bye!");

            $.ajax({
                type: "POST",
                url: "{{URL::route('fullDeleteOut')}}",
                data: {_token: "{{ csrf_token()}}", id: id},
                success: function (data) {

                    $("#mail"+id).remove();
                }
            });
        }
    </script>

@endsection
