@extends('master')
@section('maintitle') Academias @endsection
@section("contenido")

    <div class="row">
        <div class="col col-lg-8">

            <div id="map"></div>

        </div>

        <div class="col col-lg-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-book"></i> Academias
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col col-lg-12 col-xs-12">

                            <span style="font-weight: bold"> Academia 20</span> <image width="80" height="20" src="http://wp.production.patheos.com/blogs/tippling/files/2016/06/5-Gold-Stars1.jpg"></image>
                            <br>
                            <span class="fa fa-phone"> <a  style="text-decoration: none; color: grey" href="tel:9673663736">9673663736</a></span>
                            <br>
                            <span class="fa fa-envelope-o"> <a style="text-decoration: none; color: gre" href="mailto:academiaarcos@arcos.com">academia20@academia20.com</a></span>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col col-lg-12 col-xs-12">

                            <span style="font-weight: bold"> Academia los arcos</span>
                            <br>
                            <span class="fa fa-phone"> <a  style="text-decoration: none; color: grey" href="tel:9673663736">9673663739</a></span>
                            <br>
                            <span class="fa fa-envelope-o"> <a style="text-decoration: none; color: gre" href="mailto:academiaarcos@arcos.com">academiaarcos@arcos.com</a></span>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col col-lg-12 col-xs-12">

                            <span style="font-weight: bold"> Academia B1 full</span>
                            <br>
                            <span class="fa fa-phone"> <a  style="text-decoration: none; color: grey" href="tel:9673663736">9673663726</a></span>
                            <br>
                            <span class="fa fa-envelope-o"> <a style="text-decoration: none; color: gre" href="mailto:academiaarcos@arcos.com">academiafullb1@fullenglish.com</a></span>
                        </div>
                    </div>
                    <hr>

                </div>

        </div>
    </div>

    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                    <i class="fa fa-book modal-icon"></i>
                    <h4 class="modal-title">Academia los arcos</h4>
                </div>
                <div class="modal-body">

                    <div class="row descripcion"> En nuestra academia obtendras el B1 de ingles en menos de 2 meses</div>
                    <br>
                    <div class="row tel"> <span class="fa fa-phone fa-lg"> <a style="text-decoration: none" href="tel:9673663736">9673663736</a></span></div>
                    <br>
                    <div class="row tel"><span class="fa fa-envelope-o fa-lg"> <a style="text-decoration: none" href="mailto:academiaarcos@arcos.com">academiaarcos@arcos.com</a></span></div>

                </div>

            </div>
        </div>
    </div>

    @endsection

    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>


<script>

    function initMap() {
        var myLatlng = {lat: 38.3837805, lng: -0.510998};
        var myLatlng2 = {lat: 38.3887805, lng: -0.510998};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: myLatlng
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Click to zoom'
        });


        marker.addListener('click', function() {
            $('#myModal').modal('show');
        });

        marker = new google.maps.Marker({
            position: myLatlng2,
            map: map,
            title: 'Click to zoom'
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0yxKsdh9V8RwSyilhkQXugfbSKyZDCCo&callback=initMap"
        async defer></script>

