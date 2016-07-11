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


                                                <textarea class="form-control" placeholder="Write comment..."
                                                          style="resize:vertical; margin-bottom: 10px" name="mensaje-nuevo"></textarea>

                                                <input type="file" class="filestyle" data-buttonBefore="true"
                                                       data-buttonName="btn-success" data-buttonText="Adjunto"
                                                       data-size="sm" style="margin-top: 10px" name="adjunto">

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

                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                        <strong>Donec quam felis</strong>

                        <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the
                            stalks, and grow familiar with the countless indescribable forms of the insects
                            and flies, then I feel the presence of the Almighty, who formed us in his own image, and the
                            breath </p>

                        <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of
                            souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                            sense of mere tranquil existence, that I neglect my talents. I should be incapable of
                            drawing a single stroke at the present moment; and yet.</p>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane">
                    <div class="panel-body">
                        <strong>Donec quam felis</strong>

                        <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the
                            stalks, and grow familiar with the countless indescribable forms of the insects
                            and flies, then I feel the presence of the Almighty, who formed us in his own image, and the
                            breath </p>

                        <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of
                            souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                            sense of mere tranquil existence, that I neglect my talents. I should be incapable of
                            drawing a single stroke at the present moment; and yet.</p>
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

        $("#newpost").submit(function (e) {

            e.preventDefault();
            $.ajaxSetup( { headers: { 'X-CSRF-Token': $('input[name="_token"]').val()} });

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
                        title: "Sala creada correctamente",
                        text: data,
                        type: "success",
                        showConfirmButton: true
                    });

                },
                error: function (data) {


                }
            });
        });
    </script>
@endsection