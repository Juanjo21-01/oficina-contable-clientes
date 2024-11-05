<?php

namespace App\Http\Controllers;

use App\Models\Tramite;
use App\Models\Cliente;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // RUTA PRINCIPAL
    public function index()
    {
        // total de tramites y clientes, siempre y cuando estén activos
        $totalTramites = Tramite::where('estado', 1)->count();
        $totalClientes = Cliente::where('estado', 1)->count();
        $gastoTotal = Tramite::sum('precio') - Tramite::sum('gastos');

        // Últimos registros de tramites y clientes
        $ultimosTramites = Tramite::with(['cliente:id,nombres,apellidos', 'tipoTramite:id,nombre'])
            ->latest()
            ->take(5)
            ->get(['id', 'cliente_id', 'tipo_tramite_id', 'precio', 'fecha', 'estado']);

        $ultimosClientes = Cliente::latest()
            ->take(5)
            ->get(['id', 'nombres', 'apellidos', 'email', 'telefono', 'estado']);


        return view('dashboard', compact('totalTramites', 'totalClientes', 'gastoTotal', 'ultimosTramites', 'ultimosClientes'));
    }
}
