<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model {

    /**
     * Generated
     */

    protected $table = 'carrera';
    protected $fillable = ['id', 'nombre', 'rama_id'];


    public function rama() {
        return $this->belongsTo(\App\Models\Rama::class, 'rama_id', 'id');
    }

    public function asignaturas() {
        return $this->hasMany(\App\Models\Asignatura::class, 'carrera_id', 'id');
    }


}
