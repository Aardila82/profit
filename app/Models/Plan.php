<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'equivalent_text',
        'features',
        'is_popular',
        'whatsapp_text'
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
    ];
}
