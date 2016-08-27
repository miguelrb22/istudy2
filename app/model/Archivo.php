<?php

namespace App\model;


use Illuminate\Database\Eloquent\Model;

class Archivo extends Model {

    /**
     * Generated
     */

    protected $table = 'archivo';
    protected $fillable = ['id', 'url', 'descripcion', 'sala_id', 'usuario_id','tipo','created_at'];



}
