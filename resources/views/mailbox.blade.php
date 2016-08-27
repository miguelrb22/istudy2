@extends('master')
@section('maintitle') Mensajes privados @endsection

@section("css")


@endsection
@section('contenido')

    <div class="row">

        <div class="col-lg-2">
            <div class="ibox float-e-margins">
                <div class="ibox-content mailbox-content">
                    <div class="file-manager">
                        <a class="btn btn-block btn-primary compose-mail" href="mail_compose.html">Nuevo</a>
                        <div class="space-25"></div>
                        <h5>Folders</h5>
                        <ul class="folder-list m-b-md" style="padding: 0">
                            <li><a href="mailbox.html"> <i class="fa fa-inbox "></i> Inbox <span class="label label-warning pull-right">16</span> </a></li>
                            <li><a href="mailbox.html"> <i class="fa fa-envelope-o"></i> Enviados</a></li>
                            <li><a href="mailbox.html"> <i class="fa fa-trash-o"></i> Borrados</a></li>
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
        </div>
        <div class="col-lg-10 animated fadeInRight">
            <div class="mail-box-header">

                <form method="get" action="index.html" class="pull-right mail-search">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" name="search" placeholder="Buscar email">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-sm btn-primary">
                                Buscar
                            </button>
                        </div>
                    </div>
                </form>
                <h2>
                   Entrada (2)
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">
                    <div class="btn-group pull-right">
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>

                    </div>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-refresh"></i> Inicio </button>

                </div>
            </div>
            <div class="mail-box">

                <table class="table table-hover table-mail">
                    <tbody class="messageslist">
                    <tr class="unread">
                        <td class="check-mail">
                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>
                        </td>
                        <td class="mail-ontact"><a href="mail_detail.html">Anna Smith</a></td>
                        <td class="mail-subject"><a href="mail_detail.html">Lorem ipsum dolor noretek imit set.</a></td>
                        <td class=""><i class="fa fa-paperclip"></i></td>
                        <td class="text-right mail-date">6.10 AM</td>
                    </tr>
                    <tr class="unread">
                        <td class="check-mail">
                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>
                        </td>
                        <td class="mail-ontact"><a href="mail_detail.html">Jack Nowak</a></td>
                        <td class="mail-subject"><a href="mail_detail.html">Aldus PageMaker including versions of Lorem Ipsum.</a></td>
                        <td class=""></td>
                        <td class="text-right mail-date">8.22 PM</td>
                    </tr>
                    <tr class="read">
                        <td class="check-mail">
                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>
                        </td>
                        <td class="mail-ontact"><a href="mail_detail.html">Facebook</a> <span class="label label-warning pull-right">Clients</span> </td>
                        <td class="mail-subject"><a href="mail_detail.html">Many desktop publishing packages and web page editors.</a></td>
                        <td class=""></td>
                        <td class="text-right mail-date">Jan 16</td>
                    </tr>
                    <tr class="read">
                        <td class="check-mail">
                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>
                        </td>
                        <td class="mail-ontact"><a href="mail_detail.html">Mailchip</a></td>
                        <td class="mail-subject"><a href="mail_detail.html">There are many variations of passages of Lorem Ipsum.</a></td>
                        <td class=""></td>
                        <td class="text-right mail-date">Mar 22</td>
                    </tr>

                    </tbody>
                </table>


            </div>
        </div>

    </div>

@endsection

@section("jquery")


@endsection
