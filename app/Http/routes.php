<?php

Use Illuminate\Support\Facades\Route;
Use App\Models\Carrera;

/**
 * Indice principal
 */

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', ["as" => "home", function () {
        return view('master');
    }]);

    /**
     * Rutas para las salas
     */

//A esta ruta se accede desde el menu principal al pinchar en salas, devuelve la vista principal donde se listan todas las salas
    Route::get('salas', ['as' => 'salas', 'uses' => 'SalaController@index']);

//A esta ruta se accede al pinchar en una de las salas, devuelve la vista principal de una sala
    Route::get('sala-{id}', ['as' => 'sala', 'uses' => 'SalaController@show']);


    //crear una sala
    Route::post('create-room', ['as' => 'create-room', 'uses' => 'SalaController@store']);

});


//Register

Route::get('register', ['as' => 'register', function () {

    $carreras = Carrera::all();
    return view('register', compact("carreras"));
}]);
Route::post('registerp', ['as' => 'registerp', 'uses' => 'UsuarioController@create']);

Route::get('login', ['as' => 'login', function () {
    return view('login');
}]);

Route::get('insert-carreras', ['as' => 'insert-carreras', function () {

    $json = file_get_contents('https://dev.datos.ua.es/uapi/MtusbVQaX2JvJdxkFvvA/datasets/7/data');
    $json = substr($json,5);
    $json = substr($json,0,strlen($json)-1);

    $json = json_decode($json);

    foreach($json as $j){

        $carrera = new Carrera();
        $carrera->nombre = $j->NOMBRETITULACION;
        $carrera->rama_id = $j->RAMAENSENANZA;
        $carrera->save();

        //https://dev.datos.ua.es/uapi/MtusbVQaX2JvJdxkFvvA/datasets/7/data
        //https://dev.datos.ua.es/uapi/MtusbVQaX2JvJdxkFvvA/datasets/1004/data
    }
    dd($json);

}]);

Route::get('insert-asignaturas', ['as' => 'insert-asignaturas', function () {

    $json = file_get_contents('https://dev.datos.ua.es/uapi/MtusbVQaX2JvJdxkFvvA/datasets/1004/data');
    $json = substr($json,5);
    $json = substr($json,0,strlen($json)-1);

    $json = json_decode($json);

    foreach($json as $j){

        try {
            $carrera = Carrera::where("nombre", $j->NOMEST)->first();
            $asignatura = new \App\model\Asignatura();
            $asignatura->nombre = $j->nomasicorto;
            $asignatura->curso = $j->desccurso;
            $asignatura->carrera_id = $carrera["id"];
            $asignatura->save();
        }catch (\Illuminate\Database\QueryException $e){}

        //https://dev.datos.ua.es/uapi/MtusbVQaX2JvJdxkFvvA/datasets/7/data
        //https://dev.datos.ua.es/uapi/MtusbVQaX2JvJdxkFvvA/datasets/1004/data
    }

}]);
Route::post('loginp', ['as' => 'loginp', 'uses' => 'Auth\AuthController@store']);


Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

//confirmar registro

Route::get('confirmar-registro/{user}/{token}', ['as' => 'confirmar-registro', 'uses' => 'UsuarioController@confirm']);



