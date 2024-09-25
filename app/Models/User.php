<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use Notifiable;

    // Nombre de la tabla
    protected $table = 'users';

    // Campos que se pueden llenar
    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'password',
        'role_id',
        'estado',
    ];

    // Atributos ocultos
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Atributos que se deben convertir a tipos nativos
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relación uno a muchos inversa
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
