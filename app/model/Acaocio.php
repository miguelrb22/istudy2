<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Acaocio extends Model {

    /**
     * Generated
     */

    protected $table = 'acaocio';
    protected $fillable = ['id', 'tipo', 'nombre', 'descripcion', 'calle', 'numero', 'provincia', 'poblacion', 'cp', 'email', 'telefono', 'megusta'];



}
