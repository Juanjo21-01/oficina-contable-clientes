<?php

namespace App\Livewire\Usuarios;

use Livewire\Component;
use App\Models\User;

class Detalle extends Component
{
    // Variables
    public $usuario, $usuarioId;

    // Eventos
    protected $listeners = ['usuarioGuardado' => 'render'];

    // Constructor
    public function mount($id)
    {
        $this->usuarioId = $id;
        $this->usuario = User::find($id);
    }

    // Editar
    public function editar($usuarioId)
    {
        $this->dispatch('editarUsuario', $usuarioId);
    }

    // Cambiar estado
    public function cambiarEstado($usuarioId)
    {
        // Buscar usuario
        $usuario = User::find($usuarioId);

        // Verificar si el usuario tiene el rol de administrador
        if ($usuario->role->nombre == 'Administrador') {
            toastr()->addError('¡No puedes cambiar el estado de un administrador!', [
                'positionClass' => 'toast-bottom-right',
                'closeButton' => true,
            ]);
            return;
        }

        // Cambiar estado
        $usuario->estado = !$usuario->estado;
        $usuario->save();

        // Mostrar mensaje
        toastr()->addSuccess('¡Estado actualizado!', [
            'positionClass' => 'toast-bottom-right',
            'closeButton' => true,
        ]);
    }

    public function render()
    {
        $this->usuario = User::find($this->usuarioId);
        return view('livewire.usuarios.detalle', [
            'usuario' => $this->usuario
        ]);
    }
}
