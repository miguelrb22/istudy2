<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioParticipaEventoDeportivo extends Model {

    /**
     * Generated
     */

    protected $table = 'usuario_participa_evento_deportivo';
    protected $fillable = ['usuario_id', 'evento_deportivo_id'];


    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id', 'id');
    }

    public function eventoDeportivo() {
        return $this->belongsTo(\App\Models\EventoDeportivo::class, 'evento_deportivo_id', 'id');
    }


}
