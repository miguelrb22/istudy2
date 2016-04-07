<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model {

    /**
     * Generated
     */

    protected $table = 'proyecto';
    protected $fillable = ['id', 'nombre', 'descripcion', 'perfiles', 'creador', 'room_id'];


    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'creador', 'id');
    }

    public function room() {
        return $this->belongsTo(\App\Models\Room::class, 'room_id', 'id');
    }

    public function users() {
        return $this->belongsToMany(\App\Models\User::class, 'usuario_participa_proyecto', 'proyecto_id', 'usuario_id');
    }

    public function usuarioParticipaProyectos() {
        return $this->hasMany(\App\Models\UsuarioParticipaProyecto::class, 'proyecto_id', 'id');
    }


}
