<div>
    <div class="p-6 space-y-8">
        <!-- Tarjeta de perfil del tramite -->
        <div class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <div class="space-y-2 w-full">
                <h2 class="text-2xl font-semibold text-teal-600 dark:text-teal-400">{{ $tramite->cliente->nombres }}
                    {{ $tramite->cliente->apellidos }}
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 p-3">
                    <p class="text-gray-700 dark:text-gray-300"><strong>Fecha del trámite:</strong> {{ $tramite->fecha }}
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
            <div class="flex flex-col sm:flex-row justify-end gap-1">
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

        <!-- Recibo del tramite -->
        <div class="p-6 max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md border dark:border-gray-700">
            <header class="flex justify-between items-center border-b dark:border-gray-700 pb-4 mb-4">
                <h2 class="text-xl font-semibold text-teal-600">Recibo de Trámite</h2>
                <span class="text-gray-500 dark:text-gray-400">No. {{ $tramite->id }}</span>
            </header>

            <!-- Información del Cliente -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Cliente</h3>
                <p class="text-gray-600 dark:text-gray-400">{{ $tramite->cliente->nombres }}
                    {{ $tramite->cliente->apellidos }}</p>
                <p class="text-gray-600 dark:text-gray-400">DPI: {{ $tramite->cliente->dpi }}</p>
                <p class="text-gray-600 dark:text-gray-400">NIT: {{ $tramite->cliente->nit }}</p>
            </div>

            <!-- Detalle del Trámite -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Detalle del Trámite</h3>
                <p class="text-gray-600 dark:text-gray-400"><strong>Tipo:</strong> {{ $tramite->tipoTramite->nombre }}
                </p>
                <p class="text-gray-600 dark:text-gray-400"><strong>Fecha:</strong> {{ $tramite->fecha }}</p>
                <p class="text-gray-600 dark:text-gray-400"><strong>Observaciones:</strong>
                    {{ $tramite->observaciones }}
                </p>
            </div>

            <!-- Gastos -->
            <div class="flex justify-between items-center mb-4">
                <span class="text-lg font-semibold text-gray-700 dark:text-gray-200">Total</span>
                <span class="text-lg font-bold text-teal-600">Q. {{ number_format($tramite->gastos, 2) }}</span>
            </div>

            <!-- Firma -->
            <div class="mt-6 pt-4 border-t dark:border-gray-700">
                <p class="text-gray-600 dark:text-gray-400">Firma del Cliente</p>
                <div class="h-12 border-b dark:border-gray-700 w-full"></div>
            </div>
        </div>

    </div>
</div>
