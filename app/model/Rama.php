<?php namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Rama extends Model {

    /**
     * Generated
     */

    protected $table = 'rama';
    protected $fillable = ['id', 'nombre'];


    public function users() {
        return $this->belongsToMany(\App\Models\User::class, 'clases_particulares', 'rama_id', 'usuario_id');
    }

    public function carreras() {
        return $this->hasMany(\App\Models\Carrera::class, 'rama_id', 'id');
    }

    public function clasesParticulares() {
        return $this->hasMany(\App\Models\ClasesParticulare::class, 'rama_id', 'id');
    }


}
