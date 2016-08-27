<?php

namespace App\Http\Controllers;

use App\model\Rama;
use App\Models\ClasesParticulare;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ClasesController extends Controller
{

    public function show()
    {

        $asignaturas = Rama::all();

        return view("clases", compact("asignaturas"));
    }

    public function create(Request $request)
    {

        $clase = new ClasesParticulare();
        $clase->nombre = $request->input("nombre");
        $clase->descripcion = $request->input("descripcion");
        $clase->usuario_id = Auth::user()->id;
        $clase->rama_id = $request->input("a_dar");
        $clase->save();
    }

    public function getClases(Request $request)
    {


        if ($request->input("tipo") == 0) {

            $clases = ClasesParticulare::all();

        } else {

            $clases = ClasesParticulare::where("rama_id", $request->input("tipo"))->get();
        }

        $render = View::make('render/clases', ['clases' => $clases]);
        echo $render->render();
    }

    public function sendMessage($receptor)
    {

        $userClases = User::find($receptor);
        $tipo = 2; //clases
        return view("compomail", compact("userClases","tipo"));
    }

    public function SendMessageClases(Request $request)
    {


    }
}
