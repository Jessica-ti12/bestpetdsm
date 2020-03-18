<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait ;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
 

class Guarderia extends Eloquent 
{
    protected $table = 'guarderia';

    protected $fillable = [
    	'Nombre_p',
        'Telefono_p',
        'Especie_a',
        'Nombre_m',
        'Tiempo_estancia',
        'Fecha_ingreso',
        'Fecha_salida',
        'Total_pagar'
    ];

}

