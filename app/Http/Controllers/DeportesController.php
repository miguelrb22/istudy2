<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use Illuminate\Http\Request;

use App\Http\Requests;

class DeportesController extends Controller
{
    public function show(){

        $deportes = Deporte::all();
        return view("deportes",compact("deportes"));
    }

    public function showRoom($id){

        $room = 4;
        return view("deporte", compact("room","id"));
    }
}
