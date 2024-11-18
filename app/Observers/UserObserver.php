<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Bitacora;

class UserObserver
{
    // Bitacora al crear un usuario
    public function created(User $user): void
    {
        Bitacora::create([
            'tipo' => 'creacion',
            'descripcion' => 'Usuario creado: ' . $user->nombres . ' ' . $user->apellidos,
            'user_id' => auth()->id(),
        ]);
    }

    // Bitacora al eliminar un usuario
    public function deleted(User $user): void
    {
        Bitacora::create([
            'tipo' => 'eliminacion',
            'descripcion' => 'Usuario eliminado: ' . $user->nombres . ' ' . $user->apellidos,
            'user_id' => auth()->id(),
        ]);
    }
}
