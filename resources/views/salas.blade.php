@extends('master')
@section('maintitle') Salas @endsection
@section('contenido')


    <div class="row">
        @for($i = 0; $i<21; $i++)
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="widget-head-color-box  blue-bg navy-bg p-lg text-center">
                <div class="m-b-md">
                    <h2 class="font-bold no-margins">
                        Alex Smith
                    </h2>
                    <small>Founder of Groupeq</small>
                </div>
                <div>
                    <span>10 participantes</span> |
                    <span>350 Mensajes</span> |
                    <span>61 Archivos</span>
                </div>
            </div>
            <div class="widget-text-box ">
                <div class="text-right">
                    <a href="{{ route('sala',[1])}}" class="btn btn-xs btn-danger"><i class="fa fa-thumbs-up"></i> Abandonar </a>
                    <a class="btn  btn-xs btn-primary"><i class="fa fa-heart"></i> Acceder </a>
                </div>
            </div>
        </div>
            @endfor

    </div>
    @endsection