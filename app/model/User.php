<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    /**
     * Generated
     */

    protected $table = 'users';
    protected $fillable = ['id', 'email', 'password', 'seguidores', 'gente', 'nombre','carrera_id'];


    public function ramas() {
        return $this->belongsToMany(\App\Models\Rama::class, 'clases_particulares', 'usuario_id', 'rama_id');
    }

    public function users() {
        return $this->belongsToMany(\App\Models\User::class, 'mensaje_privado', 'emisor', 'destinatario');
    }

    public function usersI() {
        return $this->belongsToMany(\App\Models\User::class, 'mensaje_privado', 'destinatario', 'emisor');
    }

    public function archivos() {
        return $this->belongsToMany(\App\Models\Archivo::class, 'momento', 'usuario_id', 'archivo_id');
    }

    public function salas() {
        return $this->belongsToMany(\App\Models\Sala::class, 'pertenece_sala', 'usuario_id', 'sala_id');
    }

    public function eventoDeportivos() {
        return $this->belongsToMany(\App\Models\EventoDeportivo::class, 'usuario_participa_evento_deportivo', 'usuario_id', 'evento_deportivo_id');
    }

    public function proyectos() {
        return $this->belongsToMany(\App\Models\Proyecto::class, 'usuario_participa_proyecto', 'usuario_id', 'proyecto_id');
    }

    public function users3() {
        return $this->belongsToMany(\App\Models\User::class, 'usuario_sigue_usuario', 'usuario_id', 'usuario_id2');
    }

    public function users2() {
        return $this->belongsToMany(\App\Models\User::class, 'usuario_sigue_usuario', 'usuario_id2', 'usuario_id');
    }

    public function archivos2() {
        return $this->hasMany(\App\Models\Archivo::class, 'usuario_id', 'id');
    }

    public function clasesParticulares() {
        return $this->hasMany(\App\Models\ClasesParticulare::class, 'usuario_id', 'id');
    }

    public function eventoDeportivos2() {
        return $this->hasMany(\App\Models\EventoDeportivo::class, 'creador', 'id');
    }

    public function mensajePrivados() {
        return $this->hasMany(\App\Models\MensajePrivado::class, 'emisor', 'id');
    }

    public function mensajePrivados1() {
        return $this->hasMany(\App\Models\MensajePrivado::class, 'destinatario', 'id');
    }

    public function momentos() {
        return $this->hasMany(\App\Models\Momento::class, 'usuario_id', 'id');
    }

    public function perteneceSalas() {
        return $this->hasMany(\App\Models\PerteneceSala::class, 'usuario_id', 'id');
    }

    public function proyectos1() {
        return $this->hasMany(\App\Models\Proyecto::class, 'creador', 'id');
    }

    public function salas1() {
        return $this->hasMany(\App\Models\Sala::class, 'creador', 'id');
    }

    public function usuarioParticipaEventoDeportivos() {
        return $this->hasMany(\App\Models\UsuarioParticipaEventoDeportivo::class, 'usuario_id', 'id');
    }

    public function usuarioParticipaProyectos() {
        return $this->hasMany(\App\Models\UsuarioParticipaProyecto::class, 'usuario_id', 'id');
    }

    public function usuarioSigueUsuarios() {
        return $this->hasMany(\App\Models\UsuarioSigueUsuario::class, 'usuario_id', 'id');
    }

    public function usuarioSigueUsuarios1() {
        return $this->hasMany(\App\Models\UsuarioSigueUsuario::class, 'usuario_id2', 'id');
    }


}
