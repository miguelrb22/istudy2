<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClasesParticulare extends Model {

    /**
     * Generated
     */

    protected $table = 'clases_particulares';
    protected $fillable = ['id', 'nombre', 'descripcion', 'usuario_id', 'rama_id'];


    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id', 'id');
    }

    public function rama() {
        return $this->belongsTo(\App\Models\Rama::class, 'rama_id', 'id');
    }


}
