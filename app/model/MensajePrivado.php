<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MensajePrivado extends Model {

    /**
     * Generated
     */

    protected $table = 'mensaje_privado';
    protected $fillable = ['id', 'emisor', 'destinatario', 'cuerpo','subject', 'tipo'];


}
