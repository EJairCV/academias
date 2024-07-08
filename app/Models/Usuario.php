<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = "usuario";

    // protected $fillable = ['name', 'password', 'email','edad','dni','telefono','direccion'];

    protected $guarded = [];


    public function equipos(){
        return $this->belongsToMany(Equipo::class, 'equipo_usuario','usuario_id','equipo_id');
    }
    public function clases(){
        return $this->belongsToMany(Clases::class, 'clases_usuario', 'usuario_id', 'clases_id');
    }

    public function cuenta()
    {
        return $this->morphOne(Cuenta::class, 'cuentable');
    }
    public function fotos()
    {
        return $this->morphOne (Foto::class, 'imageable');
    }

}
