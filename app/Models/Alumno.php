<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//use Illuminate\Foundation\Auth\Alumno as Authenticatable;

class Alumno extends Model
{

    use HasApiTokens, HasFactory, Notifiable;


    protected $table="alumnos"; 
    protected $guarded=[];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
