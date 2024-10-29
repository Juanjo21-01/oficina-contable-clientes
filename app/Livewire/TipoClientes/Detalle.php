<?php

namespace App\Livewire\TipoClientes;

use Livewire\Component;
use App\Models\TipoCliente;

class Detalle extends Component
{
    // Variables
    public $tipoCliente, $tipoClienteId;

    // Constructor
    public function mount($id)
    {
        $this->tipoClienteId = $id;
        $this->tipoCliente = TipoCliente::find($id);
    }

    public function render()
    {
        $this->tipoCliente = TipoCliente::find($this->tipoClienteId);
        return view('livewire.tipo-clientes.detalle', [
            'tipoCliente' => $this->tipoCliente
        ]);
    }
}
