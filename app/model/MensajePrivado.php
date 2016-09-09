<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MensajePrivado extends Model {

    /**
     * Generated
     */

    protected $table = 'mensaje_privado';
    protected $fillable = ['id', 'emisor', 'receptor', 'cuerpo','subject', 'tipo','read','deleted','half_deleted_emisor','half_deleted_receptor','full_deleted_emisor','full_deleted_receptor'];


}
