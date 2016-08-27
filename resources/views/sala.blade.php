@extends('master')
@section('maintitle') Sala <br> <span style="font-size: 12px !important;">Pass: <span style="font-weight: bold"> {{ $codigo }} </span> (solo tu ves esta información)</span> @endsection
@section("css")

    <link href="{{ URL::asset('front/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">

@endsection
@section('contenido')


    <div class="row">

        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Participación</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Archivos</a></li>
                <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Usuarios</a></li>

            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">

                        <div class="col-lg-6">


                            <div class="social-feed-box">
                                <div class="social-footer">

                                    <div class="social-comment">
                                        <a href="" class="pull-left">
                                            <img alt="image"
                                                 src="{{ URL::asset('images/profiles')."/".\Illuminate\Support\Facades\Auth::user()->img_url}}">
                                        </a>

                                        <div class="media-body">
                                            <form id="newpost" accept-charset="UTF-8" enctype="multipart/form-data">

                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                <input type="hidden" name="sala" value="{{ $id }}">


                                                <textarea class="form-control reset"
                                                          placeholder="¿Que tienes que contarnos?"
                                                          style="resize:vertical; margin-bottom: 10px"
                                                          name="mensaje-nuevo" rows="5" required></textarea>

                                                <input id="adjunto" type="file" class="filestyle reset"
                                                       data-buttonBefore="true"
                                                       data-buttonName="btn-success" data-buttonText="Adjunto"
                                                       data-size="sm" style="margin-top: 10px" name="adjunto">
                                                
                                                <textarea id="file-description" class="form-control reset"
                                                          placeholder="Describe brevemente que contiene el archivo"
                                                          style="resize:none; margin-bottom: 10px; margin-top: 10px; display: none;"
                                                          maxlength="140" rows="3" name="file-description"></textarea>

                                                <button type="submit" class="btn btn-primary btn-xs pull-right"
                                                        style="margin-top: 10px">Publicar
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="master-boxes">
                                <div class="social-feeds-boxes"></div>
                            </div>

                            <div class="show-more" style="display: none"> <button  class="btn btn-info" onclick="moreposts()">Ver más</button></div>



                        </div>
                        <div class="col-lg-6">
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
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body panel-files">

                        @foreach($archivos as $file)
                            <div class="file-box">
                                <div class="file">
                                    <a href="{{URL::route('get-file',[$file->id])}}">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa

                                        @if($file->tipo == 1)
                                                    fa-file-image-o
                                                       @elseif($file->tipo == 2)
                                                    fa-file-pdf-o

                                                    @endif

                                                    ">

                                            </i>
                                        </div>
                                        <div class="file-name">
                                            {{$file->descripcion}}
                                            <br>
                                            <small>{{$file->created_at}}</small>
                                        </div>
                                    </a>
                                </div>

                            </div>

                        @endforeach

                    </div>
                </div>
                <div id="tab-3" class="tab-pane">
                    <div class="panel-body">

                        <div class="col-lg-3">
                            <div class="contact-box">
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <img alt="image" class="img-circle m-t-xs img-responsive" src="{{ URL::asset('front/img/a1.jpg')}}">

                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h3><strong>Juan Carlos</strong></h3>


                                    <button class="btn btn-info btn-xs">Ver perfil</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="contact-box">
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <img alt="image" class="img-circle m-t-xs img-responsive" src="{{ URL::asset('front/img/a5.jpg')}}">

                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h3><strong>Maria Elena</strong></h3>


                                    <button class="btn btn-info btn-xs">Ver perfil</button>
                                </div>
                                <div class="clearfix"></div>
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

        var total_posts;
        var aux_last_post;

        var total_chats;
        var aux_last_chat;

        var db = firebase.database();
        var mensajes = db.ref('rooms/' + "{{$room}}").limitToLast(5);
        var posts = db.ref('publicaciones/' + "{{$room}}").limitToLast(5);

        var mensajesCount = db.ref('rooms/' + "{{$room}}");
        mensajesCount.once("value", function(snapshot) {

            total_chats = snapshot.numChildren()-5;

            if(total_chats > 0){

                $(".show-more-chats").css("display","block");
            }

        });


        var postsCount = db.ref('publicaciones/' + "{{$room}}");
        postsCount.once("value", function(snapshot) {

            total_posts = snapshot.numChildren()-5;

            if(total_posts > 0){

                $(".show-more").css("display","block");
            }

        });

        mensajes.on('child_added', function(data) {

            //addCommentElement(postElement, data.key, data.val().text, data.val().author);
            sendMessageUI(data.val().user, data.val().mensaje, data.val().date, data.val().nombre, data.val().url, data.key);


        });


        posts.on('child_added', function(data) {

            sendPostUI(data.key, data.val().avatar, data.val().date, data.val().likes, data.val().mensaje, data.val().nombre, data.val().reposts);


            var reposts = db.ref('publicaciones/' + "{{$room}}" + "/" + data.key + "/reposts");

            reposts.on('child_added', function(data) {

                addRepost(data.val().parent, data.val().mensaje, data.val().nombre, data.val().date, data.val().img);

            });
        });

    </script>

    <script src="{{ URL::asset('front/js/bootstrap-filestyle.min.js')}}"></script>
    <script src="{{ URL::asset('front/js/plugins/sweetalert/sweetalert.min.js') }}"></script>


    <script type="text/javascript">


        $("#newpost").submit(function (e) {

            e.preventDefault();
            $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});

            $.ajax({
                type: "POST",
                url: "{{URL::route('new-post')}}",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                data: new FormData($(this)[0]),
                success: function (data) {

                    $('#myModal').modal('toggle');


                    $(".reset").val('');
                    $("#file-description").css("display", "none");
                    $("#file-description").attr("required", false);

                    renderFile("{{$id}}");


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


        $("#adjunto").change(function (e) {


            $("#file-description").css("display", "block");
            $("#file-description").attr("required", true);


        });


        function renderFile(id) {

            $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});

            $.ajax({
                type: "POST",
                url: "{{URL::route('renderfiles')}}",
                data: {id: id},
                success: function (data) {

                    $(".panel-files").html(data);
                    $('[data-toggle="tooltip"]').tooltip();

                }
            });
        }

        renderFile("{{$id}}");


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
                        data: {sala: "{{$id}}", user: "{{Auth::User()->id}}", msg: mensaje, date: getNow2() },
                        success: function (data) {

                        },
                        error: function (data) {

                        }
                    });
                }
            }
        });

        $(document).on("keyup",".repost",function (event) {


            if (event.keyCode == 13) {
                var content = this.value;
                var caret = getCaret(this);
                if(event.shiftKey){
                } else {

                    mensaje = $(this).val();
                    $(this).val("");

                    if(mensaje.length > 0){


                        var ref = "publicaciones/" + "{{$room}}"+ "/" + $(this).data("key")+"/reposts";
                        db.ref(ref).push({mensaje : mensaje, parent:$(this).data("key"), nombre: "{{\Illuminate\Support\Facades\Auth::user()->nombre}}", date: getNow2(), img: "{{\Illuminate\Support\Facades\Auth::user()->img_url}}"});

                    }
                    //sendMessageUI("Alberto",mensaje);

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

        function sendPostUI(key, avatar, date, likes, mensaje, nombre, repost) {

            $(".social-feeds-boxes").prepend(' <div class="social-feed-box" data-key="'+ key +'"> <div class="pull-right social-action dropdown"> <button data-toggle="dropdown" class="dropdown-toggle btn-white"> <i class="fa fa-angle-down"></i> </button> <ul class="dropdown-menu m-t-xs"> <li><a href="#">Config</a></li> </ul> </div> <div class="social-avatar"> <div class="pull-left"> <img alt="image" src="{{ URL::asset('images/profiles')}}'+ '/'+ avatar +'"> </div> <div class="media-body"> <a href="#"> '+ nombre+' </a> <small class="text-muted">'+ date+'</small> </div> </div> <div class="social-body"> <p> ' + mensaje +' </p> <div class="btn-group"> <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this! </button> </div> </div> <div class="social-footer '+ key +'"> <div class="social-comment"> <a href="" class="pull-left"> <img alt="image" src="{{ URL::asset('images/profiles')."/".\Illuminate\Support\Facades\Auth::user()->img_url}}"> </a> <div class="media-body"> <textarea data-key="'+ key +'" class="form-control repost" placeholder="Write comment..."></textarea> </div> </div> </div> </div> ');


        }

        function addRepost(key, mensaje, nombre, date, avatar){

            $("."+key).append('<div class="social-comment"> <a href="" class="pull-left"> <img alt="image" src="{{ URL::asset('images/profiles')}}'+ '/'+ avatar +'"> </a> <div class="media-body"> <a href="#">' + nombre + '</a> '+ mensaje + '<br><small class="text-muted">'+ date +'</small> </div> </div>')

        }

        function moreposts(){

            var i = 1;

            var a = $(".social-feeds-boxes").children(0).last().data("key");
            var postsn = db.ref('publicaciones/' + "{{$room}}").orderByKey().limitToLast(6).endAt(a);

            postsn.on('child_added', function(data) {

                if(a != data.key) {

                    if(i==1)
                    sendPostUIAfter(data.key, data.val().avatar, data.val().date, data.val().likes, data.val().mensaje, data.val().nombre, data.val().reposts);
                            else
                        sendPostUIBefore(data.key, data.val().avatar, data.val().date, data.val().likes, data.val().mensaje, data.val().nombre, data.val().reposts);

                    i++;
                    var reposts = db.ref('publicaciones/' + "{{$room}}" + "/" + data.key + "/reposts");

                    reposts.on('child_added', function (data) {

                        addRepost(data.val().parent, data.val().mensaje, data.val().nombre, data.val().date, data.val().img);

                    });


                }
            });

            total_posts = total_posts-5;

            if(total_posts <= 0){

                $(".show-more").remove();
            }

        }

        function sendPostUIAfter(key, avatar, date, likes, mensaje, nombre, repost) {


            var a = $(' <div class="social-feed-box antes" data-key="'+ key +'"> <div class="pull-right social-action dropdown"> <button data-toggle="dropdown" class="dropdown-toggle btn-white"> <i class="fa fa-angle-down"></i> </button> <ul class="dropdown-menu m-t-xs"> <li><a href="#">Config</a></li> </ul> </div> <div class="social-avatar"> <div class="pull-left"> <img alt="image" src="{{ URL::asset('images/profiles')}}'+ '/'+ avatar +'"> </div> <div class="media-body"> <a href="#"> '+ nombre+' </a> <small class="text-muted">'+ date+'</small> </div> </div> <div class="social-body"> <p> ' + mensaje +' </p> <div class="btn-group"> <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this! </button> </div> </div> <div class="social-footer '+ key +'"> <div class="social-comment"> <a href="" class="pull-left"> <img alt="image" src="{{ URL::asset('images/profiles')."/".\Illuminate\Support\Facades\Auth::user()->img_url}}"> </a> <div class="media-body"> <textarea data-key="'+ key +'" class="form-control repost" placeholder="Write comment..."></textarea> </div> </div> </div> </div> ');
            $(".social-feeds-boxes").children(0).last().after(a);
            aux_last_post = a;

        }

        function sendPostUIBefore(key, avatar, date, likes, mensaje, nombre, repost) {


            var a = $(' <div class="social-feed-box antes" data-key="'+ key +'"> <div class="pull-right social-action dropdown"> <button data-toggle="dropdown" class="dropdown-toggle btn-white"> <i class="fa fa-angle-down"></i> </button> <ul class="dropdown-menu m-t-xs"> <li><a href="#">Config</a></li> </ul> </div> <div class="social-avatar"> <div class="pull-left"> <img alt="image" src="{{ URL::asset('images/profiles')}}'+ '/'+ avatar +'"> </div> <div class="media-body"> <a href="#"> '+ nombre+' </a> <small class="text-muted">'+ date+'</small> </div> </div> <div class="social-body"> <p> ' + mensaje +' </p> <div class="btn-group"> <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this! </button> </div> </div> <div class="social-footer '+ key +'"> <div class="social-comment"> <a href="" class="pull-left"> <img alt="image" src="{{ URL::asset('images/profiles')."/".\Illuminate\Support\Facades\Auth::user()->img_url}}"> </a> <div class="media-body"> <textarea data-key="'+ key +'" class="form-control repost" placeholder="Write comment..."></textarea> </div> </div> </div> </div> ');
            aux_last_post.before(a);
            aux_last_post = a;


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

@endsection