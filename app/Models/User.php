<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'username',
        'email',
        'cedula',
        'password',
        'role',
        'celular',
        'peso_actual',
        'must_change_password',
        'fecha_inicio',
        'fecha_vencimiento',
        'edad',
        'altura',
        'genero',
        'objetivo',
        'lesiones',
        'created_by_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'must_change_password' => 'boolean',
            'fecha_vencimiento' => 'date',
        ];
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
