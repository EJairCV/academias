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
}
