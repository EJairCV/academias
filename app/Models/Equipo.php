<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = "equipos";
    protected $guarded = [];
    public function alumnos(){
        return $this->belongsToMany(Usuario::class, 'equipo_usuario','equipo_id','usuario_id');
    }
    public function evento(){
        return $this->belongsToMany(Evento::class, 'equipo_evento','equipo_id','evento_id');
    }
}
