@extends('master')
@section('maintitle') Momentos @endsection

@section("css")

    <link href="{{ URL::asset('front/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">


@endsection
@section('contenido')

    <div class="row">

        <div class="col-md-5">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Perfil</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" src="{{ URL::asset('images/backgrounds/default.jpg')}}">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>Miguel Ruiz</strong></h4>
                        <h5>
                            Sobre Mi
                        </h5>
                        <p>

                            Realizando el proyecto final de carrera
                        </p>
                        <div class="row m-t-lg">
                            <div class="col-md-4">
                                <span class="bar" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><rect fill="#1ab394" x="0" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="3.3" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect><rect fill="#1ab394" x="6.6" y="0" width="2.3" height="16"></rect><rect fill="#d7d7d7" x="9.899999999999999" y="5.333333333333334" width="2.3" height="10.666666666666666"></rect><rect fill="#1ab394" x="13.2" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="16.5" y="0" width="2.3" height="16"></rect><rect fill="#1ab394" x="19.799999999999997" y="3.555555555555557" width="2.3" height="12.444444444444443"></rect><rect fill="#d7d7d7" x="23.099999999999998" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect><rect fill="#1ab394" x="26.4" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="29.7" y="12.444444444444445" width="2.3" height="3.5555555555555554"></rect></svg>
                                <h5><strong id="postsdata">169</strong> Momentos</h5>
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
                        <div class="user-button">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Enviar mensaje</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Invitar a un cafe</button>
                                </div>
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

                        <a>
                           Nuevo <i class="fa fa-plus fa-2x"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">

                    <div>
                        <div class="feed-activity-list">
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="{{ URL::asset('images/backgrounds/default.jpg')}}">
                                </a>
                                <div class="media-body ">

                                    <a href="#"><strong>Miguel Ruiz</strong> </a><br>
                                    <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>


                                    <div class="well">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                        Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                    </div>

                                    <br>
                                    <img alt="image" class="img-responsive" src="{{ URL::asset('images/backgrounds/default.jpg')}}">
                                    <br>
                                    <div class="pull-right">
                                        <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> Ver mas</button>

                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

@section("jquery")


    <script src="{{ URL::asset('front/js/plugins/ladda/spin.min.js')}}"></script>

@endsection
