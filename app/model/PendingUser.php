<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingUser extends Model {

    /**
     * Generated
     */

    protected $table = 'pending_user';
    protected $fillable = ['id', 'usuario', 'pass','confirmed', 'token','nombre','carrera'];



}
