<div>
    <div class="p-6 space-y-5">
        <!-- Tarjeta de perfil del tramite -->
        <div
            class="flex flex-col md:flex-row gap-2 md:gap-4 items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md border-2 dark:border-gray-700">
            <div class="space-y-2 w-full">
                <h2 class="text-2xl font-semibold text-teal-600 dark:text-teal-400">{{ $tramite->cliente->nombres }}
                    {{ $tramite->cliente->apellidos }}
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 p-3">
                    <p class="text-gray-700 dark:text-gray-300"><strong>Fecha del trámite:</strong>
                        {{ date('d/m/Y', strtotime($tramite->fecha)) }}
                    </p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>Gastos:</strong> Q.{{ $tramite->gastos }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>Precio:</strong> Q.{{ $tramite->precio }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>Tipo de trámite:</strong>
                        {{ $tramite->tipoTramite->nombre }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>Observaciones:</strong>
                        {{ $tramite->observaciones }}</p>
                    <p class="text-gray-700 dark:text-gray-300">
                        <strong>Estado:</strong>
                        <span
                            class="{{ $tramite->estado ? 'text-teal-500 dark:text-teal-400' : 'text-rose-500 dark:text-rose-400' }}">
                            {{ $tramite->estado ? 'Activo' : 'Inactivo' }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="flex justify-end gap-1">
                <button wire:click="cambiarEstado({{ $tramite->id }})"
                    class="px-4 py-2 font-semibold leading-tight rounded-full {{ !$tramite->estado ? 'bg-teal-100 dark:bg-teal-700 text-teal-700 dark:text-teal-100' : 'bg-rose-100 dark:bg-rose-700 text-rose-700 dark:text-rose-100' }}">
                    {{ !$tramite->estado ? 'Activar' : 'Desactivar' }}
                </button>
                <button title="Editar el trámite" wire:click="editar({{ $tramite->id }})"
                    class="px-4 py-2 text-orange-600 dark:text-orange-400 rounded-lg focus:outline-none hover:border hover:border-orange-600 border border-transparent flex items-center gap-1"
                    aria-label="Editar">
                    <span class="hidden sm:inline">Editar</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>
                </button>
            </div>
        </div>

        <hr class="border-t dark:border-gray-700">

        <div class="max-w-xs mx-auto flex items-center justify-center border-b-2 dark:border-gray-700">
            <!-- Recibo del tramite -->
            <a title="Descargar el trámite" href="{{ route('tramites.pdf', $tramite->id) }}" target="_blank"
                rel="noopener noreferrer"
                class="px-4 py-2 text-orange-600 dark:text-orange-400 rounded-lg focus:outline-none hover:border hover:border-orange-600 border border-transparent flex items-center gap-1 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
                <span>Descargar</span>
                <span class="hidden sm:inline">Recibo</span>
            </a>
        </div>

        <hr class="border-t dark:border-gray-700">

        <div
            class="w-full md:w-10/12 lg:w-8/12 xl:w-6/12 mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 border-2 dark:border-gray-700">
            <!-- Encabezado con Logo e Información de la Empresa -->
            <div class="text-center border-b pb-4 mb-4 border-gray-200 dark:border-gray-700">
                <!-- Logo de la Empresa -->
                <img src="{{ asset('img/logo.png') }}" alt="Logo de la Empresa" class="mx-auto h-16 mb-2">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Recibo de Trámite</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Empresa Asesoría Fiscal Contable</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Dirección: San Marcos, San Marcos</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Teléfono: (502) 1234-5678</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">NIT: 55448877</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Fecha: {{ date('d/m/Y') }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Recibo No: #{{ $tramite->id }}</p>
            </div>

            <!-- Información del Cliente -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Información del Cliente</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">Nombre: {{ $tramite->cliente->nombres }}
                    {{ $tramite->cliente->apellidos }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Dirección: {{ $tramite->cliente->direccion }} </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Teléfono: {{ $tramite->cliente->telefono }} </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">NIT: {{ $tramite->cliente->nit }}</p>
            </div>

            <!-- Detalles del Trámite -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Detalles del Trámite</h3>
                <div class="flex justify-between text-sm text-gray-600 dark:text-gray-400">
                    <span>Concepto:</span>
                    <span>{{ $tramite->observaciones }}</span>
                </div>
                <div class="flex justify-between text-sm text-gray-600 dark:text-gray-400">
                    <span>Fecha de Servicio:</span>
                    <span>{{ date('d/m/Y', strtotime($tramite->fecha)) }}</span>
                </div>
            </div>

            <!-- Tabla de Servicios -->
            <div class="mb-2">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Detalle de Servicios</h3>
                <table class="w-full text-sm text-left text-gray-600 dark:text-gray-400">
                    <thead>
                        <tr>
                            <th class="border-b py-2 border-gray-200 dark:border-gray-700">Descripción</th>
                            <th class="border-b py-2 text-right border-gray-200 dark:border-gray-700">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2">{{ $tramite->tipoTramite->nombre }}</td>
                            <td class="py-2 text-right">Q. {{ number_format($tramite->precio, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Gastos -->
            <div class="flex justify-between items-center mb-4 text-rose-700 dark:text-rose-400 text-base">
                <span>Gastos</span>
                <span> - Q. {{ number_format($tramite->gastos, 2) }}</span>
            </div>

            <!-- Total -->
            <div class="border-t pt-4 border-gray-200 dark:border-gray-700">
                <div class="flex justify-between font-semibold text-gray-800 dark:text-gray-200 text-lg">
                    <span>Total Remanente</span>
                    <span>Q. {{ number_format($tramite->precio - $tramite->gastos, 2) }}</span>
                </div>
            </div>

            <!-- Firma -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500 dark:text-gray-400">Firma del Cliente</p>
                <div class="border-t border-gray-400 dark:border-gray-600 mt-2 w-1/2 mx-auto"></div>
            </div>
        </div>
    </div>
</div>
