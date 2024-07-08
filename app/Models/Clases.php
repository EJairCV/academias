<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clases extends Model
{
    use HasFactory;
    protected $table = "clases";
    protected $guarded = [];


    //relacion de muchos a uno
    public function docente(){
        return $this->belongsTo('App\Models\Docente','id_docente');
    }
    public function alumnos(){
        return $this->belongsToMany(Usuario::class,'clases_usuario', 'clases_id' ,'usuario_id');
    }
    public function campo(){
        return $this->belongsTo('App\Models\Campo','id_campo');
    }
}
