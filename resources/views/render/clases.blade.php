<?php $i = 1; ?>
<?php $total = count($clases) ?>

@if($total == 0)

    <div class="col col-lg-12">
        <label> No hay resultados </label>
    </div>
@endif
@foreach($clases as $clase)

    @if($i==1 || $i%4==0) <div class="row"> @endif


        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="panel

            @if($clase->rama_id ==1)
                    panel-warning
            @elseif($clase->rama_id ==2)
                    panel-default
            @elseif($clase->rama_id ==3)
                    panel-danger
            @elseif($clase->rama_id ==4)
                    panel-info
                    @else
                    panel-success
                    @endif
            ">
                <div class="panel-heading">
                    <i class="fa fa-info-circle"></i> {{ $clase->nombre }}
                </div>
                <div class="panel-body" style="height: 120px">
                    <p>{{ $clase->descripcion }}</p>
                </div>
                <div class="panel-footer">

                    @if($clase->precio == 0 )

                        Gratis
                        @else

                        {{$clase->precio}} €/hora
                        @endif

                    <a href="{{URL::route('MsgClass', ['receptor' => $clase->usuario_id])}}"><button class="pull-right btn btn-danger btn-xs">Enviar mensaje</button></a></div>

            </div>        </div>

        @if($i%3==0 || $i==$total)     </div> @endif


    <?php $i++ ?>
@endforeach
