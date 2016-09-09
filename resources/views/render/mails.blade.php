
@if($emails->isEmpty())


    <tr>
        <td class="check-mail">

            <span style="font-weight: bold">Sin resultados</span>
        </td>

    </tr>
    @endif

@foreach($emails as $mail)

    {{ $user = \App\model\User::find($mail->emisor) }}
    <tr class="@if($mail->read ==false && $mail->emisor != \Illuminate\Support\Facades\Auth::user()->id) unread @endif" id="mail{{$mail->id}}">

        @if($type == "entry")
        <td class="check-mail">
            <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash" onclick="deleteMail({{$mail->id}})"><i class="fa fa-trash-o"></i> </button>
        </td>
        @elseif($type == "sended")
            <td class="check-mail">
                <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash" onclick="deleteMailOut({{$mail->id}})"><i class="fa fa-trash-o"></i> </button>
            </td>
            @endif

        @if($type == "deleted_in")
            <td class="check-mail">
                <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash" onclick="fullDelete({{$mail->id}})"><i class="fa fa-trash-o"></i> </button>
            </td>
            <td class="check-mail">
                <button class="btn btn-info btn-xs" style="margin-left: -20px" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash" onclick="reliveMail({{$mail->id}})"><i class="fa fa-arrow-circle-o-up"></i> </button>
            </td>
        @endif

        @if($type == "deleted_out")
            <td class="check-mail">
                <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash" onclick="fullDeleteOut({{$mail->id}})"><i class="fa fa-trash-o"></i> </button>
            </td>
            <td class="check-mail">
                <button class="btn btn-info btn-xs" style="margin-left: -20px" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash" onclick="reliveMailOut({{$mail->id}})"><i class="fa fa-arrow-circle-o-up"></i> </button>
            </td>
        @endif
        <td class="mail-ontact"><a href="{{  URL::route('viewmail',["id" => $mail->id])}}"> {{$user->nombre}}</a></td>
        <td class="mail-subject"><a href="{{ URL::route('viewmail',["id" => $mail->id]) }}"> {{ substr($mail->cuerpo,0,20) }}</a></td>
        <td class="text-right mail-date">{{$mail->created_at}}</td>
    </tr>

@endforeach
