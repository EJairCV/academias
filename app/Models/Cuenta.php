<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Cuenta extends Model implements AuthenticatableContract
{
    protected $table = "cuentas";
    protected $guarded = [];
    protected $fillable = [
         'email', 'password', 'rol','cuentable_id','cuentable_type'
    ];
    use HasFactory;
    use Authenticatable;


    public function cuentable()
    {
        return $this->morphTo();
    }

    public function hasRole($role)
    {
        return $this->rol === $role;
    }
}
