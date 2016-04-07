<?php

namespace App\model;


use Illuminate\Database\Eloquent\Model;

class Archivo extends Model {

    /**
     * Generated
     */

    protected $table = 'archivo';
    protected $fillable = ['id', 'url', 'descripcion', 'sala_id', 'usuario_id'];


    public function sala() {
        return $this->belongsTo(\App\Models\Sala::class, 'sala_id', 'id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id', 'id');
    }

    public function users() {
        return $this->belongsToMany(\App\Models\User::class, 'momento', 'archivo_id', 'usuario_id');
    }

    public function mensajes() {
        return $this->hasMany(\App\Models\Mensaje::class, 'archivo_id', 'id');
    }

    public function momentos() {
        return $this->hasMany(\App\Models\Momento::class, 'archivo_id', 'id');
    }


}
