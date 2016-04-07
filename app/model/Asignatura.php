<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model {

    /**
     * Generated
     */

    protected $table = 'asignatura';
    protected $fillable = ['id', 'nombre', 'curso', 'carrera_id'];


    public function carrera() {
        return $this->belongsTo(\App\Models\Carrera::class, 'carrera_id', 'id');
    }

    public function salas() {
        return $this->hasMany(\App\Models\Sala::class, 'asignatura_id', 'id');
    }


}
