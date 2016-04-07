<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model {

    /**
     * Generated
     */

    protected $table = 'room';
    protected $fillable = ['id'];


    public function eventoDeportivos() {
        return $this->hasMany(\App\Models\EventoDeportivo::class, 'room_id', 'id');
    }

    public function mensajes() {
        return $this->hasMany(\App\Models\Mensaje::class, 'room_id', 'id');
    }

    public function proyectos() {
        return $this->hasMany(\App\Models\Proyecto::class, 'room_id', 'id');
    }

    public function salas() {
        return $this->hasMany(\App\Models\Sala::class, 'room_id', 'id');
    }


}
