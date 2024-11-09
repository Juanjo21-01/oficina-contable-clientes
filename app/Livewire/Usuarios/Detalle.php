<?php

namespace App\Livewire\Usuarios;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Detalle extends Component
{
    // Variables
    public $usuario, $usuarioId;

    // Eventos
    protected $listeners = ['usuarioGuardado' => 'render'];

    // Constructor
    public function mount($id)
    {
        // Solo los administradores pueden acceder
        if (Auth::user()->role->nombre != 'Administrador') {
            abort(403);
        }

        $this->usuarioId = $id;
        $this->usuario = User::find($id);
    }

    // Editar
    public function editar($usuarioId)
    {
        // Solo los administradores pueden editar
        if (Auth::user()->role->nombre !== 'Administrador') {
            return toastr()->addError('¡No tienes permiso para editar usuarios!', [
                'positionClass' => 'toast-bottom-right',
                'closeButton' => true,
            ]);
        }
        
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
        
        // Datos para la gráfica
        $totalTramites = User::find($this->usuarioId)->tramites()->where('estado', 1)->count();
        $totalClientes = User::find($this->usuarioId)->clientes()->where('estado', 1)->count();
        $chartData = [
            'labels' => ['Clientes', 'Trámites'],
            'datasets' => [
                [
                    'label' => 'Cantidad',
                    'backgroundColor' => ['#4FD1C5', '#F97316'],
                    'data' => [$totalClientes, $totalTramites],
                ],
            ],
        ];

        return view('livewire.usuarios.detalle', [
            'usuario' => $this->usuario,
            'chartData' => $chartData,
        ]);
    }
}
