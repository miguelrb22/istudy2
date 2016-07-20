@extends('master')
@section('maintitle') Sala @endsection
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
                                                 src="http://www.tugestor.es/demo/dist/img/default_user.png">
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


                            <div class="social-feed-box">

                                <div class="pull-right social-action dropdown">
                                    <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu m-t-xs">
                                        <li><a href="#">Config</a></li>
                                    </ul>
                                </div>
                                <div class="social-avatar">
                                    <a href="" class="pull-left">
                                        <img alt="image" src="http://www.tugestor.es/demo/dist/img/default_user.png">
                                    </a>

                                    <div class="media-body">
                                        <a href="#">
                                            Andrew Williams
                                        </a>
                                        <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                                    </div>
                                </div>
                                <div class="social-body">
                                    <p>
                                        Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                        their
                                        default model text, and a search for 'lorem ipsum' will uncover many web sites
                                        still
                                        in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                        default model text.
                                    </p>

                                    <div class="btn-group">
                                        <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!
                                        </button>
                                        <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment
                                        </button>
                                        <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                                    </div>
                                </div>
                                <div class="social-footer">
                                    <div class="social-comment">
                                        <a href="" class="pull-left">
                                            <img alt="image"
                                                 src="http://www.tugestor.es/demo/dist/img/default_user.png">
                                        </a>

                                        <div class="media-body">
                                            <a href="#">
                                                Andrew Williams
                                            </a>
                                            Internet tend to repeat predefined chunks as necessary, making this the
                                            first true generator on the Internet. It uses a dictionary of over 200 Latin
                                            words.
                                            <br>
                                            <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like this!</a>
                                            -
                                            <small class="text-muted">12.06.2014</small>
                                        </div>
                                    </div>

                                    <div class="social-comment">
                                        <a href="" class="pull-left">
                                            <img alt="image"
                                                 src="http://www.tugestor.es/demo/dist/img/default_user.png">
                                        </a>

                                        <div class="media-body">
                                            <a href="#">
                                                Andrew Williams
                                            </a>
                                            Making this the first true generator on the Internet. It uses a dictionary
                                            of.
                                            <br>
                                            <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a>
                                            -
                                            <small class="text-muted">10.07.2014</small>
                                        </div>
                                    </div>

                                    <div class="social-comment">
                                        <a href="" class="pull-left">
                                            <img alt="image"
                                                 src="http://www.tugestor.es/demo/dist/img/default_user.png">
                                        </a>

                                        <div class="media-body">
                                            <textarea class="form-control" placeholder="Write comment..."></textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="social-feed-box">

                                <div class="pull-right social-action dropdown">
                                    <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu m-t-xs">
                                        <li><a href="#">Config</a></li>
                                    </ul>
                                </div>
                                <div class="social-avatar">
                                    <a href="" class="pull-left">
                                        <img alt="image" src="http://www.tugestor.es/demo/dist/img/default_user.png">
                                    </a>

                                    <div class="media-body">
                                        <a href="#">
                                            Andrew Williams
                                        </a>
                                        <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                                    </div>
                                </div>
                                <div class="social-body">
                                    <p>
                                        Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                        their
                                        default model text, and a search for 'lorem ipsum' will uncover many web sites
                                        still
                                        in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                        default model text.
                                    </p>

                                    <p>
                                        Lorem Ipsum as their
                                        default model text, and a search for 'lorem ipsum' will uncover many web sites
                                        still
                                        in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                        default model text.
                                    </p>
                                    <img src="http://www.tugestor.es/demo/dist/img/default_user.png"
                                         class="img-responsive">

                                    <div class="btn-group">
                                        <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!
                                        </button>
                                        <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment
                                        </button>
                                        <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                                    </div>
                                </div>
                                <div class="social-footer">
                                    <div class="social-comment">
                                        <a href="" class="pull-left">
                                            <img alt="image"
                                                 src="http://www.tugestor.es/demo/dist/img/default_user.png">
                                        </a>

                                        <div class="media-body">
                                            <a href="#">
                                                Andrew Williams
                                            </a>
                                            Internet tend to repeat predefined chunks as necessary, making this the
                                            first true generator on the Internet. It uses a dictionary of over 200 Latin
                                            words.
                                            <br>
                                            <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like this!</a>
                                            -
                                            <small class="text-muted">12.06.2014</small>
                                        </div>
                                    </div>

                                    <div class="social-comment">
                                        <a href="" class="pull-left">
                                            <img alt="image"
                                                 src="http://www.tugestor.es/demo/dist/img/default_user.png">
                                        </a>

                                        <div class="media-body">
                                            <a href="#">
                                                Andrew Williams
                                            </a>
                                            Making this the first true generator on the Internet. It uses a dictionary
                                            of.
                                            <br>
                                            <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a>
                                            -
                                            <small class="text-muted">10.07.2014</small>
                                        </div>
                                    </div>

                                    <div class="social-comment">
                                        <a href="" class="pull-left">
                                            <img alt="image"
                                                 src="http://www.tugestor.es/demo/dist/img/default_user.png">
                                        </a>

                                        <div class="media-body">
                                            <a href="#">
                                                Andrew Williams
                                            </a>
                                            Making this the first true generator on the Internet. It uses a dictionary
                                            of.
                                            <br>
                                            <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a>
                                            -
                                            <small class="text-muted">10.07.2014</small>
                                        </div>
                                    </div>

                                    <div class="social-comment">
                                        <a href="" class="pull-left">
                                            <img alt="image"
                                                 src="http://www.tugestor.es/demo/dist/img/default_user.png">
                                        </a>

                                        <div class="media-body">
                                            <textarea class="form-control" placeholder="Write comment..."
                                                      style="margin: 0px -0.5px 0px 0px; height: 69px; width: 451px;"></textarea>
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <div class="social-feed-box">

                                <div class="pull-right social-action dropdown">
                                    <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu m-t-xs">
                                        <li><a href="#">Config</a></li>
                                    </ul>
                                </div>
                                <div class="social-avatar">
                                    <a href="" class="pull-left">
                                        <img alt="image" src="img/a4.jpg">
                                    </a>

                                    <div class="media-body">
                                        <a href="#">
                                            Andrew Williams
                                        </a>
                                        <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                                    </div>
                                </div>
                                <div class="social-body">
                                    <p>
                                        Packages and web page editors now use Lorem Ipsum as their
                                        default model text. Page editors now use Lorem Ipsum as their
                                        default model text.
                                    </p>

                                    <div class="btn-group">
                                        <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!
                                        </button>
                                        <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment
                                        </button>
                                        <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                                    </div>
                                </div>
                                <div class="social-footer">


                                    <div class="social-comment">
                                        <a href="" class="pull-left">
                                            <img alt="image" src="img/a8.jpg">
                                        </a>

                                        <div class="media-body">
                                            <a href="#">
                                                Andrew Williams
                                            </a>
                                            Making this the first true generator on the Internet. It uses a dictionary
                                            of.
                                            <br>
                                            <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a>
                                            -
                                            <small class="text-muted">10.07.2014</small>
                                        </div>
                                    </div>

                                    <div class="social-comment">
                                        <a href="" class="pull-left">
                                            <img alt="image" src="img/a3.jpg">
                                        </a>

                                        <div class="media-body">
                                            <textarea class="form-control" placeholder="Write comment..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

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

                                                    "

                                            >


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
                                        <img alt="image" class="img-circle m-t-xs img-responsive" src="img/a2.jpg">

                                        <div class="m-t-xs font-bold">Graphics designer</div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h3><strong>John Smith</strong></h3>

                                    <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p>

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

        var db = firebase.database();
        var mensajes = db.ref('mensajes/' + "{{$id}}").limitToLast(5);

        mensajes.on('child_added', function(data) {
            //addCommentElement(postElement, data.key, data.val().text, data.val().author);
            sendMessageUI(data.val().user, data.val().mensaje, data.val().date, data.val().nombre, data.val().url);


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
                    swal({
                        title: "Gracias!",
                        text: "Tu aportación ya está disponible para todos los usuarios",
                        type: "success",
                        showConfirmButton: true
                    });

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

        /**window.setInterval(function(){

            $(".chat-discussion").append('<div class="chat-message left"> <img class="message-avatar" src="C:\Users/Miguel/Desktop/Proyecto/istudy/storage/app/profiles/1dqwdh2.jpg" alt=""><div class="message"> <a class="message-author" href="#"> Michael Smith </a> <span class="message-date"> Mon Jan 26 2015 - 18:39:23 </span> <span class="message-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span> </div> </div>');
        }, 5000);

        window.setInterval(function(){

            $(".chat-discussion").append('<div class="chat-message right"> <img class="message-avatar" src="{{ URL::asset('front/img/a5.jpg')}}" alt=""><div class="message"> <a class="message-author" href="#"> Michael Smith </a> <span class="message-date"> Mon Jan 26 2015 - 18:39:23 </span> <span class="message-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span> </div> </div>');
        }, 7000);
**/

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
        function sendMessageUI(id,mensaje, fecha, nombre, img){

            if(id == "{{Auth::User()->id}}")
                $(".chat-discussion").append('<div class="chat-message right"> <img class="message-avatar" src="{{ $storage}}'+img+'" alt=""><div class="message"> <a class="message-author" href="#"> ' + nombre + ' </a> <span class="message-date"> '+ fecha +' </span> <span class="message-content">'+ mensaje +' </span> </div> </div>');
            else
                $(".chat-discussion").append('<div class="chat-message left"> <img class="message-avatar" src="{{ $storage}}'+img+'" alt=""><div class="message"> <a class="message-author" href="#"> ' + nombre + ' </a> <span class="message-date"> '+ fecha +' </span> <span class="message-content">'+ mensaje +' </span> </div> </div>');

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
    </script>


@endsection