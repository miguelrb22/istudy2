<?php $i = 1; ?>
<?php $total = count($usuarios) ?>

@if($total == 0)

    <div class="col col-lg-12">
        <label> No sigues a ningun contacto </label>
    </div>
@endif
@foreach($usuarios as $user)

    @if($i==1 || $i%5==0) <div class="row"> @endif


        <?php $useraux = \App\User::find($user->usuario_id2); ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="contact-box">
                <div class="col-sm-4">
                    <div class="text-center">
                        <img alt="image" class="img-circle m-t-xs img-responsive" src="{{ URL::asset('images/profiles/').'/'.$useraux->img_url}}">

                    </div>
                </div>
                <div class="col-sm-8">
                    <h3><strong>{{$useraux->nombre}}</strong></h3>


                    <a><button class="btn btn-info btn-xs">Ver perfil</button></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        @if($i%4==0 || $i==$total)     </div> @endif


    <?php $i++ ?>
@endforeach
