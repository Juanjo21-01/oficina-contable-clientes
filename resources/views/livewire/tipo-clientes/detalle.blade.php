<div>
    <div class="p-6 space-y-8">
        <!-- Tarjeta de perfil del tipoCliente -->
        <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <div class="space-y-2 w-full">
                <h2 class="text-2xl font-semibold text-teal-600 dark:text-teal-400">{{ $tipoCliente->nombre }}</h2>
                <p class="text-gray-700 dark:text-gray-300"><strong>Fecha de Creación:</strong>
                    {{ $tipoCliente->created_at->format('d/m/Y') }}</p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Clientes Asociados:</strong>
                    {{ $tipoCliente->clientes->count() }}
                    Clientes
                </p>
            </div>
        </div>

        <!-- Espacio para estadísticas -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
            <h3 class="text-2xl font-semibold text-teal-600 dark:text-teal-400">Estadísticas</h3>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Gráfica de la cantidad de clientes asociados</p>
            <div class="w-full h-64 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                <span class="text-gray-500 dark:text-gray-400">Gráfica aquí</span>
            </div>
        </div>

        <!-- Tabla de Clientes Asociados -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
            <div class="flex justify-between">
                <h3 class="text-xl font-semibold text-teal-600 dark:text-teal-400 p-2">Últimos Clientes Asociados</h3>
                {{-- Botón para visitar la página de clientes --}}
                <div class="flex justify-end">
                    <a href="{{ route('clientes.index') }}" wire:navigate
                        class="flex items-center text-gray-600 dark:text-gray-400 hover:underline m-3">
                        <span>Ver todos los clientes</span>
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
                        class="text-xs font-semibold tracking-widest text-center text-gray-500 dark:text-gray-400 uppercase border-b-2 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                        <th class="px-4 py-3 w-1/12">No.</th>
                        <th class="px-4 py-3 w-4/12">Nombres</th>
                        <th class="px-4 py-3 w-2/12">DPI</th>
                        <th class="px-4 py-3 w-3/12">Correo</th>
                        <th class="px-4 py-3 w-2/12">NIT</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @if ($tipoCliente->clientes->isEmpty())
                        <tr class="text-gray-700 dark:text-gray-400 text-center">
                            <td class="px-4 py-3" colspan="5">No hay registros</td>
                        </tr>
                    @endif
                    @foreach ($tipoCliente->clientes->sortByDesc('created_at')->take(5) as $cliente)
                        <tr class="text-gray-700 dark:text-gray-300 text-center">
                            <td class="px-4 py-3 w-1/12 font-semibold">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 w-4/12">
                                <p class="font-semibold">{{ $cliente->nombres }} {{ $cliente->apellidos }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $cliente->direccion }}
                                </p>
                            </td>
                            <td class="px-4 py-3 w-2/12">{{ $cliente->dpi }}</td>
                            <td class="px-4 py-3 w-3/12">{{ $cliente->email }}</td>
                            <td class="px-4 py-3 w-2/12">{{ $cliente->nit }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
