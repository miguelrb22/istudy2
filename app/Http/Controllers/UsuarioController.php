<?php

namespace App\Http\Controllers;

use App\Models\PendingUser;
use Illuminate\Database\QueryException;
use App\model\User;

use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Mail;

class UsuarioController extends Controller
{
    public function create(Request $request)
    {

        $email = $request->input("email");

        try {

            $exist = User::where("email", "=", $email)->get()->count() + PendingUser::where("usuario", "=", $email)->get()->count();
            if ($exist > 0) {

                throw new Exception("El email introducido ya está siendo usado");
            }

            $emailsplit = explode("@", $email);

            if (strcasecmp($emailsplit[1], "alu.ua.es") != 0) {

                //return 3;
                //descomentar para activar el registro solo usuarios de la ua

            };


            $usuario = new PendingUser();
            $usuario->usuario = $request->input("email");
            $usuario->pass = bcrypt($request->input("password"));
            $usuario->nombre = $request->input("nombre");
            $usuario->carrera = $request->input("carrera");
            $usuario->token = Uuid::generate(1);
            $usuario->save();

            $this->sendMail($email,$usuario->token);

            return 1;

        } catch (QueryException $d) {

            return 3;
        } catch (Exception $e) {

            return 2;

        }
    }

    public function sendMail($email,$token){

        $data["token"] = $token;
        $data["usuario"]=$email;

        Mail::send('mail.confirm_register', $data, function ($message) use ($email) {

            $message->from('miguelruizbas@gmail.com', 'IStudy');
            $message->subject("Confirmación de IStudy");

            $message->to($email);
        });

    }

    public function confirm($user,$token){

        $pending = PendingUser::where("usuario",$user)->first();

        if($pending->usuario == $user && $pending->token == $token){

            $pending->confirmed = 1;
            $pending->save();
            return view('confirmation')->with("msg","success");
        }else{
            return view('confirmation')->with("msg","fail");
        }
    }

    public function ShowModify(){


        return view('profile');

    }
}