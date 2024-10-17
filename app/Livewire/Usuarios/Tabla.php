<?php

namespace App\Livewire\Usuarios;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Tabla extends Component
{
    // Variables
    public $usuarios, $usuarioId, $password, $nombres, $apellidos;
    public $abrirModal = false;

    // Eventos
    protected $listeners = ['usuarioGuardado' => 'render', 'usuarioEliminado' => 'render'];

    // Constructor
    public function mount()
    {
        $this->usuarios = User::all();
    }

    // Abrir modal
    public function modalEliminar($usuarioId)
    {
        $this->password = '';

       // Buscar usuario
        $usuario = User::find($usuarioId);

        // Asignar valores
        $this->nombres = $usuario->nombres;
        $this->apellidos = $usuario->apellidos;

        $this->usuarioId = $usuarioId;
        $this->abrirModal = true;
    }

    // Cerrar modal
    public function cerrarModal()
    {
        $this->abrirModal = false;
        $this->reset('usuarioId');
    }

    // Crear
    public function crear()
    {
        $this->dispatch('crearUsuario');
    }

    // Editar
    public function editar($usuarioId)
    {
        $this->dispatch('editarUsuario', $usuarioId);
    }
    
    // Eliminar
    public function eliminar()
    {
        if (!Hash::check($this->password, Auth::user()->password)) {
        $this->addError('password', 'La contraseña es incorrecta.');
        return;
        }

        // dd($this->usuarioId);
        // Eliminar usuario
        $usuario = User::find($this->usuarioId);
        $usuario->delete();

        // Cerrar la modal
        $this->abrirModal = false;
        $this->dispatch('usuarioEliminado');

        // Mostrar mensaje
        toastr()->addSuccess('¡Usuario eliminado!', [
            'positionClass' => 'toast-bottom-right',
            'closeButton' => true,
        ]);
    }

     // Limpiar errores
    public function clearError($field)
    {
        $this->resetErrorBag($field);
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
        $this->usuarios = User::all();

        return view('livewire.usuarios.tabla', [
            'usuarios' => $this->usuarios
        ]);
    }
}
