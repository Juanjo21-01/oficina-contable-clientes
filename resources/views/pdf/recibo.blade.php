<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo del Trámite No. {{ $tramite->id }}</title>

</head>

<body style=" min-height: 100vh;">
    <div
        style="max-width: 600px; background-color: #ffffff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin: 0 auto; padding: 16px; font-family: Arial, sans-serif; color: #1F2937; border: 1px solid #D1D5DB; border-radius: 8px;">

        <!-- Encabezado con Logo e Información de la Empresa -->
        <div style="text-align: center; margin-bottom: 6px; border-bottom: 1px solid #e5e7eb;">
            <img src="{{ public_path('img/logo.png') }}" alt="Logo de la Empresa" style="height: 48px; margin: 0 auto;">
            <h2 style="font-size: 20px; font-weight: 600; margin: 8px 0; color: #1f2937;">Recibo de Trámite</h2>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Empresa Asesoría Fiscal Contable</p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Dirección: San Marcos, San Marcos</p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Teléfono: (502) 1234-5678</p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">NIT: 55448877</p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Fecha: {{ date('d/m/Y') }}</p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Recibo No: #{{ $tramite->id }}</p>
        </div>

        <!-- Información del Cliente -->
        <div style="margin-bottom: 6px;">
            <h3 style="font-weight: 600; font-size: 16px; margin-bottom: 4px; color: #374151;">Información del Cliente
            </h3>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Nombre: {{ $tramite->cliente->nombres }}
                {{ $tramite->cliente->apellidos }}</p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Dirección: {{ $tramite->cliente->direccion }}
            </p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">Teléfono: {{ $tramite->cliente->telefono }}</p>
            <p style="font-size: 14px; margin: 4px 0; color: #4b5563;">NIT: {{ $tramite->cliente->nit }}</p>
        </div>

        <!-- Detalles del Trámite -->
        <div style="margin-bottom: 6px;">
            <h3 style="font-weight: 600; font-size: 16px; margin-bottom: 4px; color: #374151;">Detalles del Trámite</h3>
            <table style="width: 100%; font-size: 14px; border-collapse: collapse;">
                <tr style="color: #4b5563;">
                    <td style="padding: 4px 0;">Concepto:</td>
                    <td style="padding: 4px 0; text-align: right;">{{ $tramite->observaciones }}</td>
                </tr>
                <tr style="color: #4b5563;">
                    <td style="padding: 4px 0;">Fecha de Servicio:</td>
                    <td style="padding: 4px 0; text-align: right;">{{ date('d/m/Y', strtotime($tramite->fecha)) }}</td>
                </tr>
            </table>
        </div>

        <!-- Tabla de Servicios -->
        <div style="margin-bottom: 6px;">
            <h3 style="font-weight: 600; font-size: 16px; margin-bottom: 4px; color: #374151;">Detalle de Servicios</h3>
            <table style="width: 100%; font-size: 14px; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 1px solid #E5E7EB;">
                        <th style="text-align: left; padding-bottom: 4px; color: #4b5563;">Descripción</th>
                        <th style="text-align: right; padding-bottom: 4px; color: #4b5563;">Precio</th>
                    </tr>
                </thead>
                <tbody style="color: #4b5563;">
                    <tr>
                        <td style="padding: 4px 0;">{{ $tramite->tipoTramite->nombre }}</td>
                        <td style="text-align: right; padding: 4px 0;">Q. {{ number_format($tramite->precio, 2) }}</td>
                    </tr>
                    <tr style="color: #1f2937;">
                        <td style="padding: 4px 0;">Gastos</td>
                        <td style="text-align: right; padding: 4px 0;">Q. {{ number_format($tramite->gastos, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Total -->
        <div style="border-top: 1px solid #e5e7eb; margin-bottom: 6px;">
            <div style="text-align: right; font-weight: 600; color: #1f2937; font-size: 18px; padding-top: 4px;">
                <span>Total</span>
                <span>Q. {{ number_format($tramite->precio + $tramite->gastos, 2) }}</span>
            </div>
        </div>

        <!-- Firma -->
        <div style="text-align: center; margin-top: 16px;">
            <p style="font-size: 14px; color: #1f2937;">__________________________</p>
            <p style="font-size: 14px; color: #9ca3af; ">Firma del Cliente</p>
        </div>
    </div>
</body>

</html>
