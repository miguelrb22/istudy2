<?php

namespace App\Http\Controllers;

use App\model\Asignatura;
use App\model\PerteneceSala;
use App\model\Room;
use App\model\Sala;
use App\model\UsuarioSalaView;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\File;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $salas = UsuarioSalaView::where("usuario_id",Auth::User()->id)->get();
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


        if($privada === "on"){

            $sala->requisito = true;
            echo "El codigo para invitar a otros usuarios es: ". $sala->pass;
        }else{

            $sala->requisito = false;
            echo "Ya puedes avisar a tus amigos :)";
        }

        $sala->save();

        $disk = \Storage::disk('salas');
        $disk->makeDirectory($sala->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('sala',compact("id"));
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


    public function leave(Request $request)
    {

        $sala = Sala::where("creador",Auth::User()->id)->where("id",$request->input("id_sala"))->first();

        if(count($sala) > 0){

            $aux = Sala::find($request->input("id_sala"));
            $aux->delete();
            $disk = \Storage::disk('salas');
            $disk->deleteDirectory($sala->id);
        }else{

            PerteneceSala::where('usuario_id',Auth::User()->id)->where('sala_id',$request->input("id_sala"))->delete();

        }
    }


    public function join(Request $request){

        $sala = Sala::where("pass",$request->input("codigo"))->first();

        if(count($sala) > 0){

            if(PerteneceSala::where("usuario_id",Auth::User()->id)->where("sala_id",$sala->id)->get()->count() == 0) {
                $pertenece = new PerteneceSala();
                $pertenece->usuario_id = Auth::User()->id;
                $pertenece->sala_id = $sala->id;
                $pertenece->save();
            }else{
                throw new Exception("Error");
            }
        }else{

            throw new Exception("Error");
        }

    }


    public function NewPost(Request $request){



        //DISCO DONDE SE GUARDARA LA IMAGEN
        $disk = \Storage::disk('salas');


        //ARCHIVO REQUEST
        $file = $request->file('adjunto');

        //EXTENSION DEL ARCHIVO
        $extension = $file->getClientOriginalExtension();

        //NUEVO NOMBRE
        $nuevo_nombre = str_random(30).Auth::User()->id;

        //MOVER EL ARCHIVO
        $disk->put($request->input("sala")."/".$nuevo_nombre.'.'.$extension,File::get($file));


    }



}
