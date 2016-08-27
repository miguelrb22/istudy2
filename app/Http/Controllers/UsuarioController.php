<?php

namespace App\Http\Controllers;

use App\model\PendingUser;
use Illuminate\Database\QueryException;
use App\model\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\CountValidator\Exception;
use Symfony\Component\CssSelector\Exception\ExpressionErrorException;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;


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

    /**
     * Editar un usuario
     * @param Request $request
     */
    public function edit(Request $request){

        $file = $request->file('img_profile');

        $user = User::find(Auth::user()->id);

        $user->nombre = $request->input("nombre");

        $gente = $request->input("gente");

        if($gente == null){

            $user->gente = false;
        }else $user->gente = true;

        if($file != null) {

            $disk = \Storage::disk('profiles');

            $nuevo_nombre = str_random(30) . Auth::User()->id;

            $extension = $file->getClientOriginalExtension();

            $disk->put($nuevo_nombre . '.' . $extension, File::get($file));


            $old_file_name = $user->img_url;

            $user->img_url =  $nuevo_nombre. '.' .$extension;


            $disk->delete($old_file_name);

        }

        $user->save();


    }

    public function changePass(Request $request)
    {


        $login = false;

        $user = Auth::user();

        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->input("pass")])) {

            $user->password = bcrypt($request->input("newpass"));
            $user->save();

            $login = true;
        }else{

            throw new Exception("Contraseña incorrecta");
        }

        Auth::login($user);


    }
}

