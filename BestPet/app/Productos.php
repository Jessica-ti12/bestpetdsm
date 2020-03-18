<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait ;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
 

class Productos extends Eloquent 
{
    protected $table = 'productos';

    protected $fillable = ['nombre', 'precio', 'existencias', 'categoria'];

}
