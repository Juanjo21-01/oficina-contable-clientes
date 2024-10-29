<?php

namespace App\Livewire\TipoTramites;

use Livewire\Component;
use App\Models\TipoTramite;

class Detalle extends Component
{
    // Variables
    public $tipoTramite, $tipoTramiteId;

    // Eventos
    protected $listeners = ['tipoTramiteGuardado' => 'render'];

    // Constructor
    public function mount($id)
    {
        $this->tipoTramiteId = $id;
        $this->tipoTramite = TipoTramite::find($id);
    }

    // Editar
    public function editar($tipoTramiteId)
    {
        $this->dispatch('editarTipoTramite', $tipoTramiteId);
    }

    public function render()
    {
        $this->tipoTramite = TipoTramite::find($this->tipoTramiteId);
        return view('livewire.tipo-tramites.detalle', [
            'tipoTramite' => $this->tipoTramite
        ]);
    }
}
