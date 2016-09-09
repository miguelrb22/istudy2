@foreach($momentos as $moment)

    <?php $author = \App\model\User::find($moment->usuario_id)?>
    <div class="feed-element">
        <a href="#" class="pull-left">
            <img alt="image" class="img-circle" src="{{ URL::asset('images/profiles/')}}/{{$author->img_url}}">
        </a>
        <div class="media-body ">

            <a href="{{URL::route("momentosUser",["id" => $author->id])}}"><strong>{{$author->nombre}}</strong> </a><br>
            <small class="text-muted">{{$moment->created_at}}</small>


            <div class="well">
                <span style="font-size:14px">{{ $moment->texto }} </span>
            </div>

            @if($moment->url != null)
                <br>
                <img alt="image" class="img-responsive" src="{{ URL::asset('images/banners')}}/{{$moment->url}}">
                <br>
            @endif
            <div class="pull-right">
                <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                <div id="heart" >
                    <img class="bottom" src="https://goo.gl/nN8Haf" width="30px">
                </div>
            </div>

        </div>
    </div>
@endforeach