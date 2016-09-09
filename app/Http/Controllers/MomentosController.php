<?php

namespace App\Http\Controllers;

use App\model\Follow;
use App\model\User;
use App\Models\Momento;
use App\Models\UsuarioSigueUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\MensajePrivado;

class MomentosController extends Controller
{
    public function show(){

        $id = Auth::user()->id;
        $momentos = DB::select(DB::raw('select * from momento where usuario_id IN(select usuario_id2 from usuario_sigue_usuario where usuario_id = '.$id.' and confirmed = true) or usuario_id = '.$id.' order by created_at DESC limit 0,10 '));
        return view("momentos",compact("momentos"));
    }

    public function moreMoments(Request $request){

        $id = Auth::user()->id;
        $page = $request->input("page");
        $momentos = DB::select(DB::raw('select * from momento where usuario_id IN(select usuario_id2 from usuario_sigue_usuario where usuario_id = '.$id.' and confirmed = true) or usuario_id = '.$id.' order by created_at DESC limit '. ($page *10).',10 '));

        $total = count($momentos);
        $render = View::make('render/momentos', ['momentos' => $momentos]);

        $result = ["result" => $render->render(), "total" => $total];
        echo json_encode($result);
    }

    public function ChangeBanner(Request $request){


        $file = $request->file('banner');

        $user = User::find(Auth::user()->id);

        if($file != null) {

            $disk = \Storage::disk('banners');

            $nuevo_nombre = "banner" . Auth::User()->id;

            $extension = $file->getClientOriginalExtension();

            $disk->put($nuevo_nombre . '.' . $extension, File::get($file));

            $user->img_url_banner =  $nuevo_nombre . '.' . $extension;

            $user->save();

        }

        return "";

    }

    public function ChangeSobreMi(Request $request){


        $user = User::find(Auth::user()->id);
        $user->sobremi=$request->input("descripcion");
        $user->save();
    }

    public function NewMoment(Request $request){


        $momento = new Momento();
        $momento->usuario_id = Auth::user()->id;
        $momento->texto = $request->input("escribe");

        $file = $request->file('ilustra');

        if($file != null){

            $disk = \Storage::disk('banners');

            $nuevo_nombre = str_random(40) . Auth::User()->id;

            $extension = $file->getClientOriginalExtension();

            $disk->put($nuevo_nombre . '.' . $extension, File::get($file));

            $momento->url = $nuevo_nombre . '.' . $extension;

        }

        $momento->save();

    }

    public function sendMessage($receptor)
    {
        $unread = MensajePrivado::where("receptor", Auth::user()->id)->where("half_deleted_receptor",false)->where("read", false)->count();

        $userClases = User::find($receptor);
        $tipo = 3; //Direct
        return view("compomail", compact("userClases","tipo","unread"));
    }

    public function showUser($id){

        $usuario = User::find($id);
        $momentos = Momento::where("usuario_id",$id)->take(10)->get();

        $follow = UsuarioSigueUsuario::where("usuario_id", Auth::user()->id)->where("usuario_id2",$id)->first();

        return view("momentosusuario",compact("momentos","usuario","follow"));
    }

    public function moreMomentsUser(Request $request){

        $id = $request->input("id");
        $page = $request->input("page");

        $momentos = Momento::where("usuario_id", $id)->skip($page*10)->take(10)->get();

        $total = count($momentos);
        $render = View::make('render/momentos', ['momentos' => $momentos]);

        $result = ["result" => $render->render(), "total" => $total];
        echo json_encode($result);
    }
}
