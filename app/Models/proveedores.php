<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
    use HasFactory;
    protected $fillable=['id','nombre','direccion','estado','sexo','telefono','correo','categoria'];

    
}
