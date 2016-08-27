<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClasesParticulare extends Model {

    /**
     * Generated
     */

    protected $table = 'clases_particulares';
    protected $fillable = ['id', 'nombre', 'descripcion', 'usuario_id', 'rama_id','precio'];





}
