<?php

Use Illuminate\Support\Facades\Route;
Use App\model\Carrera;

/**
 * Indice principal
 */

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', ["as" => "home", function () {
        return view('home');
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

    //abandonar una sala
    Route::post('leave-room', ['as' => 'leave-room', 'uses' => 'SalaController@leave']);

    //unirse a una sala
    Route::post('get-in', ['as' => 'get-in', 'uses' => 'SalaController@join']);


    //render files
    //Renderiza la vista de archivos
    Route::post('renderfiles', ['as' => 'renderfiles', 'uses' => 'SalaController@renderfile']);

    //Send chat message
    Route::post('sendchat', ['as' => 'sendchat', 'uses' => 'SalaController@sendChatMessage']);


    /**
     * Rutas para una sala
     */

    //crea un nuevo post
    Route::post('new-post', ['as' => 'new-post', 'uses' => 'SalaController@NewPost']);


    //descargar archivo
    Route::get('get-file-{id}', ['as' => 'get-file', 'uses' => 'SalaController@getfile']);

    /**
     * Rutas usuario
     */


    Route::get('modificar-perfil', ['as' => 'modificar-perfil', 'uses' => 'UsuarioController@ShowModify']);

    Route::post('edit-perfil', ['as' => 'edit-perfil', 'uses' => 'UsuarioController@edit']);

    Route::post('change-pass', ['as' => 'change-pass', 'uses' => 'UsuarioController@changePass']);



    /**
     * Clases
     *
     */

    Route::get('clases', ['as' => 'clases', 'uses' => 'ClasesController@show']);
    Route::post('create-clase', ['as' => 'create-clase', 'uses' => 'ClasesController@create']);
    Route::post('get-clases', ['as' => 'get-clases', 'uses' => 'ClasesController@getClases']);
    Route::get('MsgClass-{receptor}', ['as' => 'MsgClass', 'uses' => 'ClasesController@sendMessage']);
    Route::post('SendMessage', ['as' => 'SendMessage', 'uses' => 'PrivateMessageController@SendMessage']);



    /**
     * Deportes
     */

    Route::get('deportes', ['as' => 'deportes', 'uses' => 'DeportesController@show']);
    Route::get('deporte-{id}', ['as' => 'deporte', 'uses' => 'DeportesController@showRoom']);



    /**
     * Momentos
     */

    Route::get('momentos', ['as' => 'momentos', 'uses' => 'MomentosController@show']);
    Route::post('changebanner', ['as' => 'changebanner', 'uses' => 'MomentosController@ChangeBanner']);
    Route::post('changesobremi', ['as' => 'changesobremi', 'uses' => 'MomentosController@ChangeSobreMi']);
    Route::post('newmoment', ['as' => 'newmoment', 'uses' => 'MomentosController@NewMoment']);
    Route::post('moremoments', ['as' => 'moremoments', 'uses' => 'MomentosController@moreMoments']);


    Route::get('momentosUser-{id}', ['as' => 'momentosUser', 'uses' => 'MomentosController@showUser']);
    Route::post('moremomentsUser', ['as' => 'moremomentsUser', 'uses' => 'MomentosController@moreMomentsUser']);

    Route::get('Direct-{receptor}', ['as' => 'Direct', 'uses' => 'MomentosController@sendMessage']);








    /**
     * Proyectos
     */

    Route::get('proyectos', ['as' => 'proyectos', 'uses' => 'ProyectosController@show']);

    /**
     * Email
     */

    Route::get('mailbox-{type}', ['as' => 'mailbox', 'uses' => 'PrivateMessageController@show']);
    Route::post('getPrivateMessagesSended', ['as' => 'getPrivateMessagesSended', 'uses' => 'PrivateMessageController@getPrivateMessagesSended']);

    Route::get('viewmail-{id}', ['as' => 'viewmail', 'uses' => 'PrivateMessageController@viewmail']);

    Route::get('composemail', ['as' => 'composemail', 'uses' => 'PrivateMessageController@compose']);

    Route::post('deletemailtemp', ['as' => 'deletemailtemp', 'uses' => 'PrivateMessageController@deleteTemp']);
    Route::post('reliveMail', ['as' => 'reliveMail', 'uses' => 'PrivateMessageController@reliveMail']);
    Route::post('deletemailtempOut', ['as' => 'deletemailtempOut', 'uses' => 'PrivateMessageController@deleteTempOut']);
    Route::post('reliveMailOut', ['as' => 'reliveMailOut', 'uses' => 'PrivateMessageController@reliveMailOut']);
    Route::post('fullDelete', ['as' => 'fullDelete', 'uses' => 'PrivateMessageController@fullDelete']);
    Route::post('fullDeleteOut', ['as' => 'fullDeleteOut', 'uses' => 'PrivateMessageController@fullDeleteOut']);



    /**
     * Contactos
     */

    Route::get('contactos', ['as' => 'contactos', 'uses' => 'ContactosController@Index']);
    Route::post('buscar-contactos', ['as' => 'buscar-contactos', 'uses' => 'ContactosController@Search']);
    Route::post('follow', ['as' => 'follow', 'uses' => 'ContactosController@Follow']);

    /**
     * Academias
     */

    Route::get('academias', ['as' => 'academias', 'uses' => 'AcademiasController@Index']);


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
    $json = substr($json, 5);
    $json = substr($json, 0, strlen($json) - 1);

    $json = json_decode($json);

    foreach ($json as $j) {

        $carrera = new Carrera();
        $carrera->nombre = $j->NOMBRETITULACION;
        $carrera->rama_id = $j->RAMAENSENANZA;
        $carrera->save();

        //https://dev.datos.ua.es/uapi/MtusbVQaX2JvJdxkFvvA/datasets/7/data
        //https://dev.datos.ua.es/uapi/MtusbVQaX2JvJdxkFvvA/datasets/1004/data
    }

}]);

Route::get('insert-asignaturas', ['as' => 'insert-asignaturas', function () {

    $json = file_get_contents('https://dev.datos.ua.es/uapi/MtusbVQaX2JvJdxkFvvA/datasets/1004/data');
    $json = substr($json, 5);
    $json = substr($json, 0, strlen($json) - 1);

    $json = json_decode($json);

    foreach ($json as $j) {

        try {
            $carrera = Carrera::where("nombre", $j->NOMEST)->first();
            $asignatura = new \App\model\Asignatura();
            $asignatura->nombre = $j->nomasicorto;
            $asignatura->curso = $j->desccurso;
            $asignatura->carrera_id = $carrera["id"];
            $asignatura->save();
        } catch (\Illuminate\Database\QueryException $e) {
        }

        //https://dev.datos.ua.es/uapi/MtusbVQaX2JvJdxkFvvA/datasets/7/data
        //https://dev.datos.ua.es/uapi/MtusbVQaX2JvJdxkFvvA/datasets/1004/data
    }

}]);
Route::post('loginp', ['as' => 'loginp', 'uses' => 'Auth\AuthController@store']);


Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

//confirmar registro

Route::get('confirmar-registro/{user}/{token}', ['as' => 'confirmar-registro', 'uses' => 'UsuarioController@confirm']);



Route::get('/fakeusers',function(){

    $faker = Faker\Factory::create('es_ES');

    $limit = 100000;

        for ($i = 0; $i < $limit; $i++) {

            $user = new \Illuminate\Foundation\Auth\User();
            $user->nombre = $faker->name();
            $user->email = $faker->freeEmail();
            $user->password = bcrypt(str_random(10));
            $user->seguidores = $faker->numberBetween(0, 200);
            $user->gente = $faker->numberBetween(0, 1);
            $user->sobremi = $faker->realText(200);

            $user->save();

        }
    echo "echo";
});

