<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait ;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
 

class Compras extends Eloquent 
{
    protected $table = 'compras';

    protected $fillable = [
    	'nombre_com',
        'apellidos_com',
        'direccion',
        'tipo',
        'forma_pago',
        'total',
    ];

}


