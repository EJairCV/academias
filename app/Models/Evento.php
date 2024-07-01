<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = "eventos";
    protected $guarded = [];
    public function equipos(){
        return $this->belongsToMany(Equipo::class, 'equipo_evento','evento_id','equipo_id');
    }
    public function tipo()
    {
        return $this->belongsTo(TipoEvento::class);
    }
}
