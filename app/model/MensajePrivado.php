<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MensajePrivado extends Model {

    /**
     * Generated
     */

    protected $table = 'mensaje_privado';
    protected $fillable = ['id', 'emisor', 'destinatario', 'cuerpo'];


    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'emisor', 'id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'destinatario', 'id');
    }


}
