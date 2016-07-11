<?php namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PerteneceSala extends Model {

    /**
     * Generated
     */

    protected $table = 'pertenece_sala';
    protected $fillable = ['usuario_id', 'sala_id'];


}
