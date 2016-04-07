<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioSigueUsuario extends Model {

    /**
     * Generated
     */

    protected $table = 'usuario_sigue_usuario';
    protected $fillable = ['usuario_id', 'usuario_id2', 'mutuo'];


    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id', 'id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id2', 'id');
    }


}
