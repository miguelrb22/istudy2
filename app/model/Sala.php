<?php namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model {

    /**
     * Generated
     */

    protected $table = 'sala';
    protected $fillable = ['id', 'nombre', 'descripcion', 'creador', 'asignatura_id', 'pass', 'requisito', 'room_id'];

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'creador', 'id');
    }

    public function asignatura() {
        return $this->belongsTo(\App\Models\Asignatura::class, 'asignatura_id', 'id');
    }

    public function room() {
        return $this->belongsTo(\App\Models\Room::class, 'room_id', 'id');
    }

    public function users() {
        return $this->belongsToMany(\App\Models\User::class, 'pertenece_sala', 'sala_id', 'usuario_id');
    }

    public function archivos() {
        return $this->hasMany(\App\Models\Archivo::class, 'sala_id', 'id');
    }

    public function perteneceSalas() {
        return $this->hasMany(\App\Models\PerteneceSala::class, 'sala_id', 'id');
    }


}
