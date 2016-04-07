<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioParticipaProyecto extends Model {

    /**
     * Generated
     */

    protected $table = 'usuario_participa_proyecto';
    protected $fillable = ['usuario_id', 'proyecto_id'];


    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id', 'id');
    }

    public function proyecto() {
        return $this->belongsTo(\App\Models\Proyecto::class, 'proyecto_id', 'id');
    }


}
