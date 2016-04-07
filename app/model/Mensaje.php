<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model {

    /**
     * Generated
     */

    protected $table = 'mensaje';
    protected $fillable = ['id', 'cuerpo', 'room_id', 'archivo_id', 'mensaje_id', 'second_level', 'megusta'];


    public function room() {
        return $this->belongsTo(\App\Models\Room::class, 'room_id', 'id');
    }

    public function archivo() {
        return $this->belongsTo(\App\Models\Archivo::class, 'archivo_id', 'id');
    }

    public function mensaje() {
        return $this->belongsTo(\App\Models\Mensaje::class, 'mensaje_id', 'id');
    }

    public function mensajes() {
        return $this->hasMany(\App\Models\Mensaje::class, 'mensaje_id', 'id');
    }


}
