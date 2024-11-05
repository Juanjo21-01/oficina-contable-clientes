<?php

namespace App\Livewire\Tramites;

use Livewire\Component;
use App\Models\Tramite;
use App\Models\Cliente;
use App\Models\TipoTramite;

class Formulario extends Component
{
    // Variables
    public $fecha, $precio, $gastos = 0, $observaciones, $tipoTramiteId, $clienteId;
    public $tramiteId = null;
    public $errorMessage;

    // Eventos
    protected $listeners = ['cargarTramite'];

    // Constructor
    public function mount($tramiteId = null)
    {
        if ($tramiteId) {
            $this->cargarTramite($tramiteId);
        }
    }

    // Guardar
    public function guardar()
    {
        $this->validate([
            'fecha' => 'required|date',
            'precio' => 'required|numeric|min:0',
            'gastos' => 'required|numeric|min:0',
            'observaciones' => 'nullable|string|max:300',
            'tipoTramiteId' => 'required|int|exists:tipo_tramites,id',
            'clienteId' => 'required|int|exists:clientes,id'
        ]);

        try {
            // Crear Tramite
            $tramite = Tramite::create([
                'fecha' => $this->fecha,
                'precio' => $this->precio,
                'gastos' => $this->gastos,
                'observaciones' => $this->observaciones,
                'tipo_tramite_id' => $this->tipoTramiteId,
                'cliente_id' => $this->clienteId,
                'user_id' => auth()->user()->id
            ]);

            // Asignar id
            $this->tramiteId = $tramite->id;

            // Emitir evento
            $this->dispatch('tramiteGuardado');

             // Mostrar mensaje
            toastr()->addSuccess('Trámite guardado!', [
                'positionClass' => 'toast-bottom-right',
                'closeButton' => true,
            ]);

            // Regresar a la lista
            return redirect()->route('tramites.index');
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al guardar el trámite: '.$e->getMessage();

            // Mostrar mensaje
            toastr()->addError($this->errorMessage, [
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

    public function render()
    {
        $tiposTramites = TipoTramite::all();
        // Clientes activos
        $clientes = Cliente::where('estado', 1)->get();
        return view('livewire.tramites.formulario', [
            'tiposTramites' => $tiposTramites,
            'clientes' => $clientes
        ]);
    }
}
