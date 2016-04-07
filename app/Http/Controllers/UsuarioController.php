<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use App\model\User;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function create(Request $request){

        try {
            $usuario = new User();
            $usuario->email = $request->input("email");
            $usuario->password = bcrypt($request->input("password"));
            $usuario->save();
        }catch (QueryException $d){}

        return redirect('login');

    }
}