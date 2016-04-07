<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deporte extends Model {

    /**
     * Generated
     */

    protected $table = 'deporte';
    protected $fillable = ['id', 'nombre'];


    public function eventoDeportivos() {
        return $this->hasMany(\App\Models\EventoDeportivo::class, 'deporte_id', 'id');
    }


}
