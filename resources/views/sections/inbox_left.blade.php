<div class="ibox float-e-margins">
    <div class="ibox-content mailbox-content">
        <div class="file-manager">
            <a class="btn btn-block btn-primary compose-mail" href="{{ URL::route("composemail") }}">Nuevo</a>
            <div class="space-25"></div>
            <h5>Folders</h5>
            <ul class="folder-list m-b-md" style="padding: 0">
                <li><a href="{{URL::route("mailbox",["type" => "entry"])}}"> <i class="fa fa-inbox "></i> Inbox <span class="label label-warning pull-right total-inbox-indicator"></span> </a></li>
                <li><a href="{{URL::route("mailbox",["type" => "sended"])}}"> <i class="fa fa-envelope-o"></i> Enviados </a></li>
                <li><a href="{{URL::route("mailbox",["type" => "deleted_in"])}}"> <i class="fa fa-trash-o"></i> Borrados (Recibidos)</a></li>
                <li><a href="{{URL::route("mailbox",["type" => "deleted_out"])}}"> <i class="fa fa-trash-o"></i> Borrados (Enviados)</a></li>
            </ul>
            <h5>Categories</h5>
            <ul class="category-list" style="padding: 0">
                <li><a href="#"> <i class="fa fa-circle text-navy"></i> Work </a></li>
                <li><a href="#"> <i class="fa fa-circle text-danger"></i> Documents</a></li>
                <li><a href="#"> <i class="fa fa-circle text-primary"></i> Social</a></li>
                <li><a href="#"> <i class="fa fa-circle text-info"></i> Advertising</a></li>
                <li><a href="#"> <i class="fa fa-circle text-warning"></i> Clients</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
