<?php

namespace App\Http\Controllers;

use App\model\Asignatura;
use App\model\Room;
use App\model\Sala;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = Sala::where("creador",Auth::User()->id)->get();
        $asignaturas = Asignatura::where("carrera_id",Auth::User()->carrera_id)->groupby("nombre")->get();
        return view('salas', compact("asignaturas","salas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre = $request->input('nombre_sala');
        $descripcion = $request->input('descripcion');
        $asignatura = $request->input('asignatura');
        $privada = $request->input('sala_privada');

        $room = new Room();
        $room->save();

        $sala = new Sala($request->all());
        $sala->creador = Auth::User()->id;
        $sala->pass = str_random(8).Auth::User()->id;
        $sala->room_id = $room->id;

        $sala->save();

        if($privada === "on"){

            echo "El codigo para invitar a otros usuarios es: ". $sala->pass;
        }else{

            echo "Ya puedes avisar a tus amigos :)";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('sala');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
