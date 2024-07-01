<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model implements AuthenticatableContract
{
    use Authenticatable;

    // Otros atributos y métodos de tu modelo Cuenta
}
