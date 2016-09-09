@extends('master')
@section('maintitle') <image height="20" src="http://www.clker.com/cliparts/5/4/4/d/1224784575930693112schoolfreeware_Tennis_Ball.svg"> Tenis</image> @endsection
@section("css")

    <link href="{{ URL::asset('front/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">

@endsection
@section('contenido')


    <div class="row">

        <div class="col-lg-7">

            <div class="col-lg-6">

                <div class="panel panel-danger">
                    <div class="panel-heading">
                Equipo Rojo

                    </div>
                    <div class="panel-body equiporojo" style="min-height: 400px">

                        <div class="row" data-team = "1" data-nombre="Miguel Ruiz">
                            <div class="col-lg-12">
                        <div> <span class="pull-left" style="font-weight: bold"> Miguel Ruiz</span> <button class="pull-right btn btn-xs btn-success change"><span class="fa fa-arrow-right"></span></button></div>
                        </div>
                            <br>
                            <br>

                        </div>

                    </div>

                </div>

            </div>
            <div class="col-lg-6">

                <div class="panel panel-success">
                    <div class="panel-heading">
Equipo azul
                    </div>
                    <div class="panel-body equipoazul" style="min-height: 400px">

                        <div class="row" data-team = "2" data-nombre="daniel">
                            <div class="col-lg-12">
                                <div> <span class="pull-right" style="font-weight: bold">Daniel</span> <button class="pull-left btn btn-xs btn-danger change"><span class="fa fa-arrow-left"></span></button></div>
                            </div>
                            <br>
                            <br>

                        </div>

                    </div>

                </div>
            </div>


        </div>
        <div class="col-lg-5">
            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox chat-view">

                        <div class="ibox-title">

                            Chat
                        </div>


                        <div class="ibox-content">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="chat-discussion">

                                        <center><a class="show-more-chats" style="display: none" onclick="moreChats()">Ver mensajes anteriores</a></center>

                                        <div class="chat-discussions"></div>
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="chat-message-form">

                                        <div class="form-group">

                                                            <textarea class="form-control message-input areamensaje" name="message"
                                                                      placeholder="Enter message text"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section("jquery")

    <script type="text/javascript">


        var total_chats;
        var aux_last_chat;

        var db = firebase.database();
        var mensajes = db.ref('rooms/' + "{{$room}}").limitToLast(5);

        var mensajesCount = db.ref('rooms/' + "{{$room}}");
        mensajesCount.once("value", function(snapshot) {

            total_chats = snapshot.numChildren()-5;

            if(total_chats > 0){

                $(".show-more-chats").css("display","block");
            }

        });

        mensajes.on('child_added', function(data) {

            //addCommentElement(postElement, data.key, data.val().text, data.val().author);
            sendMessageUI(data.val().user, data.val().mensaje, data.val().date, data.val().nombre, data.val().url, data.key);


        });

    </script>

    <script src="{{ URL::asset('front/js/bootstrap-filestyle.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/plugins/sweetalert/sweetalert.min.js') }}"></script>


    <script type="text/javascript">

        $('.areamensaje').keyup(function (event) {


            if (event.keyCode == 13) {
                var content = this.value;
                var caret = getCaret(this);
                if(event.shiftKey){
                } else {

                    mensaje = $(this).val();
                    $(this).val("");
                    //sendMessageUI("Alberto",mensaje);


                    $.ajax({
                        type: "POST",
                        url: "{{URL::route('sendchat')}}",
                        data: {room: "{{$room}}", user: "{{Auth::User()->id}}", msg: mensaje, date: getNow2(), _token: "{{ csrf_token() }}" },
                        success: function (data) {

                        },
                        error: function (data) {

                        }
                    });
                }
            }
        });


        function getCaret(el) {
            if (el.selectionStart) {
                return el.selectionStart;
            } else if (document.selection) {
                el.focus();
                var r = document.selection.createRange();
                if (r == null) {
                    return 0;
                }
                var re = el.createTextRange(), rc = re.duplicate();
                re.moveToBookmark(r.getBookmark());
                rc.setEndPoint('EndToStart', re);
                return rc.text.length;
            }
            return 0;
        }




        //Escribe un mensaje en el chat
        function sendMessageUI(id,mensaje, fecha, nombre, img, key){

            if(id == "{{Auth::User()->id}}")
                $(".chat-discussions").append('<div class="chat-message right" data-key="'+ key +'"> <img class="message-avatar" src="{{ URL::asset('images/profiles')}}'+ '/'+ img +'" alt=""><div class="message"> <a class="message-author" href="#"> ' + nombre + ' </a> <span class="message-date"> '+ fecha +' </span> <span class="message-content">'+ mensaje +' </span> </div> </div>');
            else
                $(".chat-discussions").append('<div class="chat-message left" data-key="'+ key +'"> <img class="message-avatar" src="{{ URL::asset('images/profiles')}}'+ '/' + img +'" alt=""><div class="message"> <a class="message-author" href="#"> ' + nombre + ' </a> <span class="message-date"> '+ fecha +' </span> <span class="message-content">'+ mensaje +' </span> </div> </div>');

            $container = $('.chat-discussion');
            $container[0].scrollTop = $container[0].scrollHeight;
        }


        //previene el scroll dentro de un div
        $('.chat-discussion').bind('mousewheel DOMMouseScroll', function (e) {
            var e0 = e.originalEvent, delta = e0.wheelDelta || -e0.detail;

            this.scrollTop += ( delta < 0 ? 1 : -1 ) * 30;
            e.preventDefault();
        });

        function getNow2(){


            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();

            var hour = today.getHours();
            var minutes = today.getMinutes();

            if(minutes<10) {
                minutes='0'+minutes
            }

            if(dd<10) {
                dd='0'+dd
            }

            if(mm<10) {
                mm='0'+mm
            }

            today = mm+'/'+dd+'/'+yyyy+' '+hour+':'+minutes;
            return today;
        }

        $container = $('.chat-discussion');
        $container[0].scrollTop = $container[0].scrollHeight;


        function  moreChats(){


            var a = $(".chat-discussions").children(0).first().data("key");
            aux_last_chat = $(".chat-discussions").children(0).first();

            var mensajesn = db.ref('rooms/' + "{{$room}}").orderByKey().limitToLast(11).endAt(a);

            var i = 1;
            mensajesn.on('child_added', function(data) {

                if(a != data.key) {

                    if(i == 1)
                        sendMessageUIAfter(data.val().user, data.val().mensaje, data.val().date, data.val().nombre, data.val().url, data.key);
                    else
                        sendMessageUIBefore(data.val().user, data.val().mensaje, data.val().date, data.val().nombre, data.val().url, data.key);


                    i++;
                }
            });

            total_chats = total_chats-10;

            if(total_chats <= 0){

                $(".show-more-chats").remove();
            }
        }

        function sendMessageUIAfter(id,mensaje, fecha, nombre, img, key){

            if(id == "{{Auth::User()->id}}")
                aux_last_chat.before('<div class="chat-message right" data-key="'+ key +'"> <img class="message-avatar" src="{{ URL::asset('images/profiles')}}'+ '/'+ img +'" alt=""><div class="message"> <a class="message-author" href="#"> ' + nombre + ' </a> <span class="message-date"> '+ fecha +' </span> <span class="message-content">'+ mensaje +' </span> </div> </div>');
            else
                aux_last_chat.before('<div class="chat-message left" data-key="'+ key +'"> <img class="message-avatar" src="{{ URL::asset('images/profiles')}}'+ '/' + img +'" alt=""><div class="message"> <a class="message-author" href="#"> ' + nombre + ' </a> <span class="message-date"> '+ fecha +' </span> <span class="message-content">'+ mensaje +' </span> </div> </div>');


            aux_last_chat = $(".chat-discussions").children(0).first();

        }

        function sendMessageUIBefore(id,mensaje, fecha, nombre, img, key){


            var a;
            if(id == "{{Auth::User()->id}}") {

                a = $('<div class="chat-message right" data-key="' + key + '"> <img class="message-avatar" src="{{ URL::asset('images/profiles')}}' + '/' + img + '" alt=""><div class="message"> <a class="message-author" href="#"> ' + nombre + ' </a> <span class="message-date"> ' + fecha + ' </span> <span class="message-content">' + mensaje + ' </span> </div> </div>');
                aux_last_chat.after(a);
            }

            else {

                a = $('<div class="chat-message left" data-key="' + key + '"> <img class="message-avatar" src="{{ URL::asset('images/profiles')}}' + '/' + img + '" alt=""><div class="message"> <a class="message-author" href="#"> ' + nombre + ' </a> <span class="message-date"> ' + fecha + ' </span> <span class="message-content">' + mensaje + ' </span> </div> </div>');
                aux_last_chat.after(a);

            }
            aux_last_chat = a;

        }
    </script>

    <script type="text/javascript">

        $(document).on("click",".change", function (e) {

            var team = $(this).parent().parent().parent().data("team");
            var nombre = $(this).parent().parent().parent().data("nombre");

            $(this).parent().parent().parent().remove();
            if(team == 1){


                $(".equipoazul").append('<div class="row" data-team = "2" data-nombre="'+nombre+'"> <div class="col-lg-12"> <div> <span class="pull-right" style="font-weight: bold">' + nombre +'</span> <button class="pull-left btn btn-xs btn-danger change"><span class="fa fa-arrow-left"></span></button></div> </div> <br> <br></div>')
            }else{

                $(".equiporojo").append('<div class="row" data-team = "1" data-nombre="'+nombre+'"> <div class="col-lg-12"> <div> <span class="pull-left" style="font-weight: bold">'+ nombre +'</span> <button class="pull-right btn btn-xs btn-success change"><span class="fa fa-arrow-right"></span></button></div> </div><br> <br></div>')

            }
        });
    </script>

@endsection