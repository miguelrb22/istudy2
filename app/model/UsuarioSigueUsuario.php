<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioSigueUsuario extends Model {

    /**
     * Generated
     */

    protected $table = 'usuario_sigue_usuario';
    protected $fillable = ['usuario_id', 'usuario_id2', 'mutuo'];




}
