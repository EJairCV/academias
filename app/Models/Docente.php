<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $table = "docente";
    protected $guarded = [];


    //relacion de uno a muchos
    public function clases(){
        return $this->hasMany('App\Models\Clases');
    }
    public function cuenta()
    {
        return $this->morphOne(Cuenta::class, 'cuentable');
    }
    public function fotos()
    {
        return $this->morphOne(Foto::class, 'imageable');
    }
}
