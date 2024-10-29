<?php

namespace App\Livewire\TipoTramites;

use Livewire\Component;
use App\Models\TipoTramite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class Tabla extends Component
{
    // Variables
    public $tipoTramites, $tipoTramiteId, $password, $nombre;
    public $abrirModal = false;

    // Eventos
    protected $listeners = ['tipoTramiteGuardado' => 'render', 'tipoTramiteEliminado' => 'render'];

    // Constructor
    public function mount()
    {
        $this->tipoTramites = TipoTramite::all();
    }

    // Abrir modal
    public function modalEliminar($tipoTramiteId)
    {
        $this->password = '';
        $this->clearError('password');

        // Buscar tipo de trámite
        $tipoTramite = TipoTramite::find($tipoTramiteId);

        // Asignar valores
        $this->nombre = $tipoTramite->nombre;

        $this->tipoTramiteId = $tipoTramiteId;
        $this->abrirModal = true;
    }

    // Cerrar modal
    public function cerrarModal()
    {
        $this->abrirModal = false;
        $this->reset('tipoTramiteId');
    }

    // Crear
    public function crear()
    {
        $this->dispatch('crearTipoTramite');
    }

    // Editar
    public function editar($tipoTramiteId)
    {
        $this->dispatch('editarTipoTramite', $tipoTramiteId);
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

            // Buscar tipo de trámite
            $tipoTramite = TipoTramite::find($this->tipoTramiteId);

            // Verificar si el tipo de trámite tiene trámites asociados
            if ($tipoTramite->tramites->count() > 0) {
                toastr()->addWarning('¡Existen trámites asociados!', [
                    'positionClass' => 'toast-bottom-right',
                    'closeButton' => true,
                ]);
                return;
            }

            // Eliminar tipo de trámite
            $tipoTramite->delete();

            // Cerrar modal
            $this->cerrarModal();
            $this->dispatch('tipoTramiteEliminado');

            // Mostrar mensaje
            toastr()->addSuccess('Tipo de trámite eliminado!', [
                'positionClass' => 'toast-bottom-right',
                'closeButton' => true,
            ]);
        } catch (\Exception $e) {
            $this->addError('password', 'Error al eliminar el tipo de trámite.'.$e->getMessage());
            toastr()->addError('¡Error al eliminar el tipo de trámite!', [
                'positionClass' => 'toast-bottom-right',
                'closeButton' => true,
            ]);
        }
    }

    // Limpiar errores
    public function clearError($error)
    {
        $this->resetErrorBag($error);
    }

    public function render()
    {
        $this->tipoTramites = TipoTramite::all();
        
        return view('livewire.tipo-tramites.tabla', [
            'tipoTramites' => $this->tipoTramites
        ]);
    }
}
