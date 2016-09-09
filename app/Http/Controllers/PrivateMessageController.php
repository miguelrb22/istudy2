<?php

namespace App\Http\Controllers;

use App\model\Follow;
use App\Models\MensajePrivado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PrivateMessageController extends Controller
{
    public function show($type){

        $unread = MensajePrivado::where("receptor", Auth::user()->id)->where("half_deleted_receptor",false)->where("read", false)->count();


        if($type == "entry") {
            $total = MensajePrivado::where("receptor", Auth::user()->id)->where("half_deleted_receptor",false)->count();
        }else if($type == "sended"){
            $total = MensajePrivado::where("emisor", Auth::user()->id)->where("half_deleted_emisor",false)->count();
        }else if($type == "deleted_in"){

            $total = MensajePrivado::where("receptor", Auth::user()->id)->where("half_deleted_receptor",true)->where("full_deleted_receptor",false)->count();
        }
        else if($type == "deleted_out"){

            $total = MensajePrivado::where("emisor", Auth::user()->id)->where("half_deleted_emisor",true)->where("full_deleted_emisor",false)->count();
        }

        return view("mailbox", compact("total","unread","sended","deleted","type"));
    }

    public function SendMessage(Request $request){

        $message = new MensajePrivado();
        $message->emisor = Auth::user()->id;
        $message->receptor = $request->input("receptor");
        $message->cuerpo = $request->input("msg");
        $message->tipo = $request->input("tipo");

        $message->save();
    }

    public function getPrivateMessagesSended(Request $request){

        $page = $request->input("page");
        $type = $request->input("type");

        if($type == "entry") {
            $mensajes = MensajePrivado::where("receptor", Auth::user()->id)->where("half_deleted_receptor",false)->orderBy("id", "DESC")->take(10)->skip((10 * $page) - 10)->get();
            $total = MensajePrivado::where("receptor", Auth::user()->id)->where("half_deleted_receptor",false)->count();
        }else if($type=="sended"){

            $mensajes = MensajePrivado::where("emisor", Auth::user()->id)->where("half_deleted_emisor",false)->orderBy("id", "DESC")->take(10)->skip((10 * $page) - 10)->get();
            $total = MensajePrivado::where("emisor", Auth::user()->id)->where("half_deleted_emisor",false)->count();
        }
        else if($type == "deleted_in"){
            $mensajes = MensajePrivado::where("receptor", Auth::user()->id)->where("half_deleted_receptor",true)->where("full_deleted_receptor",false)->orderBy("id", "DESC")->take(10)->skip((10 * $page) - 10)->get();
            $total = MensajePrivado::where("receptor", Auth::user()->id)->where("half_deleted_receptor",true)->where("full_deleted_receptor",false)->count();

        }else if($type == "deleted_out"){
            $mensajes = MensajePrivado::where("emisor", Auth::user()->id)->where("half_deleted_emisor",true)->where("full_deleted_emisor",false)->orderBy("id", "DESC")->take(10)->skip((10 * $page) - 10)->get();
            $total = MensajePrivado::where("emisor", Auth::user()->id)->where("half_deleted_emisor",true)->where("full_deleted_emisor",false)->count();
        }

        $render = View::make('render/mails', ['emails' => $mensajes, 'total' => $total, 'type' => $type]);
        echo $render->render();

    }


    public function viewmail($id){

        $mensaje = MensajePrivado::find($id);
        $emisor =\App\model\User::find($mensaje->emisor);
        $unread = MensajePrivado::where("receptor", Auth::user()->id)->where("half_deleted_receptor",false)->where("read", false)->count();


        if(Auth::user()->id != $emisor->id) {
            $mensaje->read = true;
        }
        $mensaje->save();
        return view("mailread", compact("mensaje", "emisor","unread"));
    }

    public function compose(){

        $tipo = 0;

        $unread = MensajePrivado::where("receptor", Auth::user()->id)->where("half_deleted_receptor",false)->where("read", false)->count();

        $follow = Follow::where("usuario_id", Auth::user()->id)->get();

        return view("compomail",compact("tipo","follow","unread"));
    }

    public function deleteTemp(Request $request){

        $mensaje = MensajePrivado::find($request->input("id"));
        $mensaje->half_deleted_receptor = true;
        $mensaje->save();

    }

    public function reliveMail(Request $request){

        $mensaje = MensajePrivado::find($request->input("id"));
        $mensaje->half_deleted_receptor = false;
        $mensaje->save();

    }

    public function deleteTempOut(Request $request){

        $mensaje = MensajePrivado::find($request->input("id"));
        $mensaje->half_deleted_emisor = true;
        $mensaje->save();

    }

    public function reliveMailOut(Request $request){

        $mensaje = MensajePrivado::find($request->input("id"));
        $mensaje->half_deleted_emisor = false;
        $mensaje->save();

    }

    public function  fullDelete(Request $request){

        $mensaje = MensajePrivado::find($request->input("id"));
        $mensaje->full_deleted_receptor = true;
        $mensaje->save();
    }

    public function  fullDeleteOut(Request $request){

        $mensaje = MensajePrivado::find($request->input("id"));
        $mensaje->full_deleted_emisor = true;
        $mensaje->save();
    }
}
