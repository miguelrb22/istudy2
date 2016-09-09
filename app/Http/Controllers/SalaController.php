<?php

namespace App\Http\Controllers;

use App\model\Archivo;
use App\model\Asignatura;
use App\model\PerteneceSala;
use App\model\Room;
use App\model\Sala;
use App\model\UsuarioSalaView;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Mockery\CountValidator\Exception;
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
        $archivos = Archivo::where("sala_id",$id)->get();


        $storage = storage_path('app\profiles/');
        $storage = str_replace('\\','/',$storage);

        $sala= Sala::find($id);
        $room = $sala->room_id;
        $codigo = $sala->pass;

        $participantes = UsuarioSalaView::where("sala_id",$id)->get();

        return view('sala',compact("id","archivos",'storage','room','codigo','part'));
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
     * @param Request $request
     * Abandonar una sala
     */
    public function leave(Request $request)
    {

        $sala = Sala::where("creador",Auth::User()->id)->where("id",$request->input("id_sala"))->first();

        if(count($sala) > 0){

            $aux = Sala::find($request->input("id_sala"));
            $aux->delete();
            $disk = \Storage::disk('salas');
            $disk->deleteDirectory($sala->id);
            $firebase = new \Firebase\FirebaseLib("https://istudy-3f8dc.firebaseio.com/", "mE8deJKGTm59u5mpQF7lnZdO7dL0uCSFGKXkZpaI");
            $firebase->delete("rooms/".$sala->room_id);
        }else{

            PerteneceSala::where('usuario_id',Auth::User()->id)->where('sala_id',$request->input("id_sala"))->delete();

        }
    }


    /**
     * @param Request $request
     * Unirse a una sala
     */
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

            throw new Exception("No hay salas con ese codigo");
        }

    }


    /**
     * @param Request $request
     * Crea un nuevo post dentro de una sala
     */
    public function NewPost(Request $request){

        //DISCO DONDE SE GUARDARA LA IMAGEN
        $disk = \Storage::disk('salas');

        //ARCHIVO REQUEST
        $file = $request->file('adjunto');

        $archivo = new Archivo();


        if($file != null) {
            //EXTENSION DEL ARCHIVO
            $extension = $file->getClientOriginalExtension();

            //NUEVO NOMBRE
            $nuevo_nombre = str_random(30) . Auth::User()->id;

            //MOVER EL ARCHIVO
            $disk->put($request->input("sala") . "/" . $nuevo_nombre . '.' . $extension, File::get($file));


            $archivo->sala_id = $request->input("sala");
            $archivo->url = $request->input("sala") . "/" . $nuevo_nombre . '.' . $extension;
            $archivo->descripcion = $request->input("file-description");
            $archivo->usuario_id = Auth::User()->id;
            $archivo->tipo = $this->getTipo($extension);
            $archivo->save();
        }

        $firebase = new \Firebase\FirebaseLib("https://istudy-3f8dc.firebaseio.com/", "mE8deJKGTm59u5mpQF7lnZdO7dL0uCSFGKXkZpaI");

        $data = array(
            "mensaje" => $request->input("mensaje-nuevo"),
            "date" => date("d-m-Y H:i:s"),
            "nombre" => Auth::User()->nombre,
            "avatar" => Auth::User()->img_url,
            "id" => Auth::user()->id
        );

        $sala = Sala::find($request->input("sala"));
        $firebase->push("publicaciones/".$sala->room_id,$data);

    }


    /**
     * @param $tipo
     * @return int
     * Devuelve el tipo de archivo para guardarlo como informacion en la base de datos
     */
    private function getTipo($tipo){

        $tipo = strtolower($tipo);

            if($tipo =="jpg") return 1;
            else if($tipo == "pdf")  return 2;
            else return 5;

    }


    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * Descar un archivo guardado
     */
    public function getfile($id){

        //HABRA QUE COMPROBAR SI EL USUARIO TIENE PERMISO PARA DESCARGAR ESE ARCHIVO


        $disk = \Storage::disk('salas');
        $archivo = Archivo::find($id);

        return response()->download(storage_path()."/app/salas/".$archivo->url);

    }


    /**
     * Guarda un mensaje de chat en la base de datos FireBase
     * @param Request $request
     */
    public function sendChatMessage(Request $request){


        $firebase = new \Firebase\FirebaseLib("https://istudy-3f8dc.firebaseio.com/", "mE8deJKGTm59u5mpQF7lnZdO7dL0uCSFGKXkZpaI");

        $data = array(
            "user" => $request->input("user"),
            "mensaje" => $request->input("msg"),
            "date" => $request->input("date"),
            "nombre" => Auth::User()->nombre,
            "url" => Auth::User()->img_url
        );

        $firebase->push("rooms/".$request->input("room"),$data);
    }


    /**
     * Funcion que rendecira los archivos de una sala para mostrarlos en la vista
     * @param Request $request
     */
    public function renderFile(Request $request){

        $archivos = Archivo::where("sala_id",$request->input("id"))->get();
        $render = View::make('render/files', ['archivos' => $archivos]);
        echo $render->render();

    }



}
