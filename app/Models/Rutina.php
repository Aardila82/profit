<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 
        'genero', 
        'nivel_entrenamiento', 
        'objetivo', 
        'videos'
    ];

    protected $casts = [
        'videos' => 'array',
    ];
}
