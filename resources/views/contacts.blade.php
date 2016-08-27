@extends('master')
@section('maintitle') Contactos @endsection
@section('contenido')

    <div class="row">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Usuarios a los que sigo</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Buscar</a></li>

            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body follow">

                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body panel-files">

                        <div class="row">

                            <div class="col col-lg-6 col-md-6">
                                <form id="form-search">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <label>Nombre (mínimo 3 caracteres)</label>

                                    <div class="form-group form-inline">
                                        <input type="text" placeholder="Nombre" class="form-control" name="nombre" pattern=".{3,}" required="">
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <strong>Buscar</strong></button>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="row resultados"></div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('jquery')

    <script type="text/javascript">

        $("#form-search").submit(function (e) {

            e.preventDefault();
            $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});

            $.ajax({
                type: "POST",
                url: "{{URL::route('buscar-contactos')}}",
                data: $("#form-search").serialize(),
                success: function (data) {

                    $(".resultados").html(data);

                },
                error: function (data) {



                }
            });
        });

        function Follow(){

            $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});

            $.ajax({
                type: "POST",
                url: "{{URL::route('follow')}}",
                data: {id: 1},
                success: function (data) {

                    $(".follow").html(data);

                },
                error: function (data) {


                }
            });

        }

        Follow();
    </script>
    @endsection
