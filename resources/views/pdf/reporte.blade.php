<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $nombreArchivo }} </title>
</head>

<body style="min-height: 100vh; font-family: Arial, sans-serif; color: #1F2937;">
    <div
        style="max-width: 800px; background-color: #ffffff; margin: 0 auto; padding: 16px; border: 1px solid #D1D5DB; border-radius: 8px;">
        <!-- Encabezado con Logo e Información de la Empresa -->
        <div style="text-align: center; margin-bottom: 16px; border-bottom: 1px solid #e5e7eb;">
            <img src="{{ public_path('img/logo.png') }}" alt="Logo de la Empresa" style="height: 48px; margin: 0 auto;">
            <h2 style="font-size: 20px; font-weight: 600; margin: 8px 0; color: #1f2937;">Reporte de Trámites</h2>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Empresa Asesoría Fiscal Contable</p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Dirección: San Marcos, San Marcos</p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Teléfono: (502) 1234-5678</p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">NIT: 55448877</p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Fecha: {{ date('d/m/Y') }}</p>
        </div>

        <!-- Información del Reporte -->
        <div style="margin-bottom: 16px;">
            <h3 style="font-weight: 600; font-size: 16px; margin-bottom: 4px; color: #374151;">Resumen del Reporte</h3>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Total de Trámites: {{ $totalTramites }}</p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Remanente Total: Q.
                {{ number_format($gastoTotal, 2) }}</p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Promedio de Remanente: Q.
                {{ number_format($promedioGasto, 2) }}</p>
        </div>

        <!-- Tabla de Trámites -->
        <div style="margin-bottom: 16px;">
            <h3 style="font-weight: 600; font-size: 16px; margin-bottom: 4px; color: #374151;">Detalle de Trámites</h3>
            <table style="width: 100%; font-size: 14px; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 1px solid #E5E7EB;">
                        <th style="text-align: left; padding-bottom: 4px; color: #4b5563;">No.</th>
                        <th style="text-align: left; padding-bottom: 4px; color: #4b5563;">Cliente</th>
                        <th style="text-align: left; padding-bottom: 4px; color: #4b5563;">Tipo de Trámite</th>
                        <th style="text-align: left; padding-bottom: 4px; color: #4b5563;">Fecha</th>
                        <th style="text-align: right; padding-bottom: 4px; color: #4b5563;">Precio</th>
                        <th style="text-align: right; padding-bottom: 4px; color: #4b5563;">Gastos</th>
                        <th style="text-align: right; padding-bottom: 4px; color: #4b5563;">Total</th>
                    </tr>
                </thead>
                <tbody style="color: #4b5563;">
                    @foreach ($tramites as $tramite)
                        <tr>
                            <td style="padding: 4px 0;">{{ $loop->iteration }}</td>
                            <td style="padding: 4px 0;">{{ $tramite->cliente->nombres }}</td>
                            <td style="padding: 4px 0;">{{ $tramite->tipoTramite->nombre }}</td>
                            <td style="padding: 4px 0;">{{ date('d/m/Y', strtotime($tramite->fecha)) }}</td>
                            <td style="text-align: right; padding: 4px 0;">Q. {{ number_format($tramite->precio, 2) }}
                            </td>
                            <td style="text-align: right; padding: 4px 0;">Q. {{ number_format($tramite->gastos, 2) }}
                            </td>
                            <td style="text-align: right; padding: 4px 0;">Q.
                                {{ number_format($tramite->precio - $tramite->gastos, 2) }}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
