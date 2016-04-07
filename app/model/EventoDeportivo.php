<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventoDeportivo extends Model {

    /**
     * Generated
     */

    protected $table = 'evento_deportivo';
    protected $fillable = ['id', 'fecha', 'descripcion', 'lugar', 'num_participantes', 'creador', 'deporte_id', 'room_id'];


    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'creador', 'id');
    }

    public function deporte() {
        return $this->belongsTo(\App\Models\Deporte::class, 'deporte_id', 'id');
    }

    public function room() {
        return $this->belongsTo(\App\Models\Room::class, 'room_id', 'id');
    }

    public function users() {
        return $this->belongsToMany(\App\Models\User::class, 'usuario_participa_evento_deportivo', 'evento_deportivo_id', 'usuario_id');
    }

    public function usuarioParticipaEventoDeportivos() {
        return $this->hasMany(\App\Models\UsuarioParticipaEventoDeportivo::class, 'evento_deportivo_id', 'id');
    }


}
