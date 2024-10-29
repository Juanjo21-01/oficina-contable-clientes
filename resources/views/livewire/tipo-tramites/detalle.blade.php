<div>
    <div class="p-6 space-y-8">
        <!-- Tarjeta de perfil del tipoTramite -->
        <div class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <div class="space-y-2 w-full">
                <h2 class="text-2xl font-semibold text-teal-600 dark:text-teal-400">{{ $tipoTramite->nombre }}</h2>
                <p class="text-gray-700 dark:text-gray-300"><strong>Fecha de Creación:</strong>
                    {{ $tipoTramite->created_at->format('d/m/Y') }}
                </p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Trámites Realizados:</strong>
                    {{ $tipoTramite->tramites->count() }} Trámites
                </p>
            </div>
            <button title="Editar el tipo de tramite" wire:click="editar({{ $tipoTramite->id }})"
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

        <!-- Espacio para estadísticas -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
            <h3 class="text-2xl font-semibold text-teal-600 dark:text-teal-400">Estadísticas</h3>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Gráfica de la cantidad de trámites realizados</p>
            <div class="w-full h-64 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                <span class="text-gray-500 dark:text-gray-400">Gráfica aquí</span>
            </div>
        </div>

        <!-- Tabla de Tramites Realizados -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
            <div class="flex justify-between">
                <h3 class="text-xl font-semibold text-teal-600 dark:text-teal-400 p-2">Últimos Tramites Realizados</h3>
                <!-- botón para visitar la página de Trámites -->
                <div class="flex justify-end">
                    <a href="{{ route('tramites.index') }}" wire:navigate
                        class="flex items-center text-gray-600 dark:text-gray-400 hover:underline m-3">
                        <span>Ver todos los trámites</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>
                </div>
            </div>
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-widest text-center text-gray-500 uppercase border-b-2 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                        <th class="px-4 py-3 w-1/12">No.</th>
                        <th class="px-4 py-3 w-4/12">Cliente</th>
                        <th class="px-4 py-3 w-2/12">Gastos</th>
                        <th class="px-4 py-3 w-3/12">Tipo de trámite</th>
                        <th class="px-4 py-3 w-2/12">Fecha</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @if ($tipoTramite->tramites->isEmpty())
                        <tr class="text-gray-700 dark:text-gray-400 text-center">
                            <td class="px-4 py-3" colspan="5">No hay registros</td>
                        </tr>
                    @endif
                    @foreach ($tipoTramite->tramites->take(5) as $tramite)
                        <tr class="text-gray-700 dark:text-gray-400 text-center">
                            <td class="px-4 py-3 font-semibold w-1/12">{{ $tramite->id }}</td>
                            <td class="px-4 py-3 w-4/12">{{ $tramite->cliente->nombres }}
                                {{ $tramite->cliente->apellidos }}</td>
                            <td class="px-4 py-3 w-2/12">Q. {{ $tramite->gastos }}</td>
                            <td class="px-4 py-3 w-3/12">{{ $tramite->tipoTramite->nombre }}</td>
                            <td class="px-4 py-3 font-semibold w-2/12">{{ $tramite->fecha }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
