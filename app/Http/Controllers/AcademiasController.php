<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AcademiasController extends Controller
{
    public function Index(){

        return view('academias');

    }
}
