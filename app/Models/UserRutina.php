<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRutina extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'rutina_id', 
        'estado', 
        'assigned_at'
    ];

    public function rutina()
    {
        return $this->belongsTo(Rutina::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
