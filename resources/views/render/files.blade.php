<?php $i = 1; ?>
<?php $total = count($archivos) ?>
@foreach($archivos as $file)

    @if($i==1 || $i%5==0) <div class="row"> @endif


            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="file-box">
                    <div class="file">
                        <a href="{{URL::route('get-file',[$file->id])}}" data-toggle="tooltip" data-placement="bottom" title="{{$file->descripcion}}">
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
                                <br>
                                <small>{{$file->created_at}}</small>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

            @if($i%4==0 || $i==$total)     </div> @endif


    <?php $i++ ?>
@endforeach
