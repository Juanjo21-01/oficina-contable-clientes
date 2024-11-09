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

        // Datos para la gráfica
        $totalClientes = $this->tipoCliente->clientes->count();
        $chartData = [
            'labels' => ['Clientes'],
            'datasets' => [
                [
                    'label' => 'Cantidad',
                    'backgroundColor' => ['#4FD1C5', '#F97316'],
                    'data' => [$totalClientes, 0],
                ],
            ],
        ];

        return view('livewire.tipo-clientes.detalle', [
            'tipoCliente' => $this->tipoCliente,
            'chartData' => $chartData,
        ]);
    }
}
