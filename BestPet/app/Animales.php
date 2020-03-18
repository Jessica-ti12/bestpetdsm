<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait ;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
 

class Animales extends Eloquent 
{
    protected $table = 'Animales';

    protected $fillable = ['nombre', 'especie_a', 'edad_a', 'status_a'];

}