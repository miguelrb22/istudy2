<?php

namespace App\Http\Controllers;

use App\model\Follow;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ContactosController extends Controller
{


    public function Index(){

        return view("contacts");
    }

    public function Search(Request $request){

        $nombre = $request->input("nombre");
        $users = User::where('nombre','like',"%".$nombre."%")->where('id','!=',Auth::user()->id)->get();
        $render = View::make('render/contacts', ['usuarios' => $users]);
        echo $render->render();

    }

    public function Follow(Request $request){

        $follow = Follow::where("usuario_id",Auth::user()->id)->get();

        $render = View::make('render/follow', ['usuarios' => $follow]);
        echo $render->render();

    }
}
