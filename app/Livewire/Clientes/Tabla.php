<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Tabla extends Component
{
    // Variables
    public $clientes, $clienteId, $password, $nombres, $apellidos;
    public $abrirModal = false;

    // Eventos
    protected $listeners = ['clienteGuardado' => 'render', 'clienteEliminado' => 'render'];

    // Constructor
    public function mount()
    {
        $this->clientes = Cliente::all();
    }

    // Abrir modal
    public function modalEliminar($clienteId)
    {
        $this->password = '';
        $this->clearError('password');

        // Buscar cliente
        $cliente = Cliente::find($clienteId);

        // Asignar valores
        $this->nombres = $cliente->nombres;
        $this->apellidos = $cliente->apellidos;

        $this->clienteId = $clienteId;
        $this->abrirModal = true;
    }

    // Cerrar modal
    public function cerrarModal()
    {
        $this->abrirModal = false;
        $this->reset('clienteId');
    }

    // Editar
    public function editar($clienteId)
    {
        $this->dispatch('editarCliente', $clienteId);
    }

    // Eliminar
    public function eliminar()
    {
       try {
            // Validar contraseña
            if (!Hash::check($this->password, Auth::user()->password)) {
                $this->addError('password', 'La contraseña es incorrecta.');
                return;
            }

            // Buscar cliente
            $cliente = Cliente::find($this->clienteId);

            // Verificar si el cliente tiene agencia virtual
            if ($cliente->agenciaVirtual) {
                toastr()->addWarning('¡El cliente tiene una agencia virtual asociada!', [
                'positionClass' => 'toast-bottom-right',
                'closeButton' => true,
                ]);
                return;
            }

            // Verificar si el cliente tiene tramites
            if ($cliente->tramites->count() > 0) {
                toastr()->addWarning('¡El cliente tiene trámites asociados!', [
                'positionClass' => 'toast-bottom-right',
                'closeButton' => true,
                ]);
                return;
            }

            // Eliminar cliente
            $cliente->delete();

            // Cerrar modal
            $this->abrirModal = false;
            $this->dispatch('clienteEliminado');

            // Mostrar mensaje
            toastr()->addSuccess('Cliente eliminado.', [
                'positionClass' => 'toast-bottom-right',
                'closeButton' => true,
            ]);
       } catch (\Exception $e) {
            $this->addError('password', 'Error al eliminar el cliente.'.$e->getMessage());
            toastr()->addError('¡Error al eliminar el cliente!', [
                'positionClass' => 'toast-bottom-right',
                'closeButton' => true,
            ]);
       }
    }

    // Limpiar errores
    public function clearError($field)
    {
        $this->resetErrorBag($field);
    }

    // Cambiar estado
    public function cambiarEstado($clienteId)
    {
        // Buscar cliente
        $cliente = Cliente::find($clienteId);

        // Cambiar estado
        $cliente->estado = !$cliente->estado;
        $cliente->save();

        // Mostrar mensaje
        toastr()->addSuccess('Estado actualizado.', [
            'positionClass' => 'toast-bottom-right',
            'closeButton' => true,
        ]);
    }

    public function render()
    {
        $this->clientes = Cliente::all();

        return view('livewire.clientes.tabla', [
            'clientes' => $this->clientes]);
    }
}
