<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    // Nombre de la tabla
    protected $table = 'clientes';

    // Campos que se pueden llenar
    protected $fillable = [
        'nombres',
        'apellidos',
        'dpi',
        'nit',
        'direccion',
        'telefono',
        'email',
        'estado',
        'tipo_cliente_id',
        'user_id'
    ];

    // Relación muchos a uno
    public function tipoCliente(): BelongsTo
    {
        return $this->belongsTo(TipoCliente::class);
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relación uno a uno
    public function agenciaVirtual(): HasOne
    {
        return $this->hasOne(AgenciaVirtual::class);
    }
}
