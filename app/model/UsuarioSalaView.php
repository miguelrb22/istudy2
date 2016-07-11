<?php namespace App\model;

use Illuminate\Database\Eloquent\Model;

class UsuarioSalaView extends Model {

    /**
     * Generated
     */

    protected $table = 'usuario_pertenece_sala';
    protected $fillable = ['usuario_id', 'sala_id','nombre', 'descripcion', 'creador', 'asignatura_id', 'pass', 'requisito', 'room_id'];




}
