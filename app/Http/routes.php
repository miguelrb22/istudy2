<?php

Use Illuminate\Support\Facades\Route;

/**
 * Indice principal
 */

Route::group(['middleware' => 'auth'], function(){

    Route::get('/', function () { return view('master'); });

    /**
     * Rutas para las salas
     */

//A esta ruta se accede desde el menu principal al pinchar en salas, devuelve la vista principal donde se listan todas las salas
    Route::get('salas', ['as' => 'salas', 'uses' => 'SalaController@index']);

//A esta ruta se accede al pinchar en una de las salas, devuelve la vista principal de una sala
    Route::get('sala-{id}', ['as' => 'sala', 'uses' => 'SalaController@show']);

});



//Register

Route::get('register', ['as' => 'register', function () { return view('register'); }]);
Route::post('registerp', ['as' => 'registerp', 'uses' => 'UsuarioController@create']);

Route::get('login', ['as' => 'login', function () { return view('login'); }]);
Route::post('loginp', ['as' => 'loginp', 'uses' => 'Auth\AuthController@store']);

Route::get('logout',['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);


