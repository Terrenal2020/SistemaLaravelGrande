<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\Paginator;

class Almacenes extends Model
{
    use HasFactory;
    protected $perPage = 2;
    protected $fillable=['id','nombre','direccion','telefono','codigo postal'];


    

}
