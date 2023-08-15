<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoriaProductos extends Model
{
    use HasFactory;

    protected $fillable=['id','codigo','nombre','descripcion','ruta'];


  
}
