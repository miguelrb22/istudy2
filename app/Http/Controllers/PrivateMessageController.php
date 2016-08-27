<?php

namespace App\Http\Controllers;

use App\Models\MensajePrivado;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PrivateMessageController extends Controller
{
    public function show(){

        //return view("mailbox");
        return view("mailbox");
    }

    public function SendMessage(Request $request){


        $message = new MensajePrivado();
        $message->emisor = Auth::user()->id;
        $message->destinatario = $request->input("receptor");
        $message->cuerpo = $request->input("msg");
        $message->tipo = $request->input("tipo");
        $message->save();
    }
}
