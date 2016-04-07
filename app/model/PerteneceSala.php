<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerteneceSala extends Model {

    /**
     * Generated
     */

    protected $table = 'pertenece_sala';
    protected $fillable = ['usuario_id', 'sala_id'];


    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id', 'id');
    }

    public function sala() {
        return $this->belongsTo(\App\Models\Sala::class, 'sala_id', 'id');
    }


}
