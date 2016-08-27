@foreach($emails as $email)

    <tr class="@if($mail->read) unread @endif">
        <td class="check-mail">
            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>
        </td>
        <td class="mail-ontact"><a href="mail_detail.html">Anna Smith</a></td>
        <td class="mail-subject"><a href="mail_detail.html">Lorem ipsum dolor noretek imit set.</a></td>
        <td class=""><i class="fa fa-paperclip"></i></td>
        <td class="text-right mail-date">6.10 AM</td>
    </tr>

@endforeach