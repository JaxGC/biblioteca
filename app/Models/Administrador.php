<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;
    protected $table="administradores";
    //protected $fillable=['id','Usuario','Password','Nombre_administrador','id_status_usuario'];
    protected $guarded=[];
}
