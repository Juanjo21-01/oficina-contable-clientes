<?php

namespace App\Http\Controllers;

use App\Models\Tramite;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    // PDF de recibo de tramite
    public function reciboPDF(string $id)
    {
        // Buscar el tramite
        $tramite = Tramite::find($id);

        // Si no existe el tramite
        if (!$tramite) {
            return toastr()->addWarning('¡El cliente tiene trámites asociados!', [
                'positionClass' => 'toast-bottom-right',
                'closeButton' => true,
                ]);
        }

        // Generar PDF
        $pdf = PDF::loadView('pdf.recibo', compact('tramite'));

        // Descargar PDF
        return $pdf->download('Trámite No. ' . $tramite->id . ' - '.$tramite->cliente->nombres.'.pdf');
    }
}
