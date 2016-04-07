<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Momento extends Model {

    /**
     * Generated
     */

    protected $table = 'momento';
    protected $fillable = ['id', 'usuario_id', 'texto', 'adjunto', 'url', 'archivo_id'];


    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id', 'id');
    }

    public function archivo() {
        return $this->belongsTo(\App\Models\Archivo::class, 'archivo_id', 'id');
    }


}
