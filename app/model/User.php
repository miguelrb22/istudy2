<?php

namespace App\model;

use App\Models\Momento;
use Illuminate\Database\Eloquent\Model;

class User extends Model {

    /**
     * Generated
     */

    protected $table = 'users';
    protected $fillable = ['id', 'email', 'password', 'seguidores', 'gente', 'nombre','carrera_id','img_url','sobremi','img_url_banner'];

    public function momentos($id){

        return Momento::where("usuario_id", $id)->count();
    }

}
