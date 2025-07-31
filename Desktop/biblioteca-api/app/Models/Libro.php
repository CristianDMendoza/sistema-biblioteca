<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    // Define los atributos que se pueden asignar en masa.
    protected $fillable = ['titulo', 'autor', 'anio'];
}
