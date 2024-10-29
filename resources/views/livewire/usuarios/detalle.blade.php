<div>
    <div class="p-6 space-y-8">
        <!-- Tarjeta de perfil del usuario -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-md">
            <div class="space-y-2 w-full">
                <h2 class="text-2xl font-semibold text-teal-600">{{ $usuario->nombres }} {{ $usuario->apellidos }}</h2>
                <p class="text-gray-700"><strong>Email:</strong> {{ $usuario->email }}</p>
                <p class="text-gray-700"><strong>Rol:</strong> {{ $usuario->role->nombre }}</p>
                <p class="text-gray-700">
                    <strong>Estado:</strong>
                    <span class="{{ $usuario->estado ? 'text-teal-500' : 'text-rose-500' }}">
                        {{ $usuario->estado ? 'Activo' : 'Inactivo' }}
                    </span>
                </p>
            </div>
            <div class="flex justify-end gap-1">
                <button wire:click="cambiarEstado({{ $usuario->id }})"
                    class="px-4 py-2 font-semibold leading-tight rounded-full {{ !$usuario->estado ? 'bg-teal-100 dark:bg-teal-700 text-teal-700 dark:text-teal-100 ' : 'bg-rose-100 dark:bg-rose-700 text-rose-700 dark:text-rose-100' }} {{ $usuario->role->nombre == 'Administrador' ? 'cursor-not-allowed' : 'cursor-pointer' }}">
                    {{ !$usuario->estado ? 'Activar' : 'Desactivar' }}
                </button>
                <button title="Editar el usuario" wire:click="editar({{ $usuario->id }})"
                    class="px-4 py-2 text-orange-600 rounded-lg focus:outline-none hover:border hover:border-orange-600 border border-transparent flex items-center gap-1"
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

        <!-- Espacio para estadísticas -->
        <div class="bg-white rounded-lg shadow-md p-4">
            <h3 class="text-2xl font-semibold text-teal-600">Estadísticas</h3>
            <p class="text-gray-600 mb-4">Gráfica de la cantidad de clientes registrados y trámites realizados</p>
            <div class="w-full h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                <span class="text-gray-500">Gráfica aquí</span>
            </div>
        </div>

        <!-- Tabla de Clientes Relacionados -->
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="flex justify-between">
                <h3 class="text-xl font-semibold text-teal-600 p-2">Últimos Clientes Registrados</h3>
                {{-- boton para visitar la pagina de clientes --}}
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
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-widest text-center text-gray-500 uppercase border-b-2  dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3 w-1/12">No.</th>
                        <th class="px-4 py-3 w-4/12">Nombres</th>
                        <th class="px-4 py-3 w-2/12">DPI</th>
                        <th class="px-4 py-3 w-3/12">Correo</th>
                        <th class="px-4 py-3 w-2/12">NIT</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if ($usuario->clientes->isEmpty())
                        <tr class="text-gray-700 dark:text-gray-400 text-center">
                            <td class="px-4 py-3" colspan="5">No hay registros</td>
                        </tr>
                    @endif
                    @foreach ($usuario->clientes->take(5) as $cliente)
                        <tr class="text-gray-700 dark:text-gray-400 text-center">
                            <td class="px-4 py-3 w-1/12">{{ $cliente->id }}</td>
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

        <!-- Tabla de Trámites Relacionados -->
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="flex justify-between">
                <h3 class="text-xl font-semibold text-teal-600 p-2">Últimos Trámites Realizados</h3>
                {{-- boton para visitar la pagina de tramites --}}
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
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-widest text-center text-gray-500 uppercase border-b-2  dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3 w-1/12">No.</th>
                        <th class="px-4 py-3 w-4/12">Cliente</th>
                        <th class="px-4 py-3 w-2/12">Gastos</th>
                        <th class="px-4 py-3 w-3/12">Tipo de trámite</th>
                        <th class="px-4 py-3 w-2/12">Fecha</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if ($usuario->tramites->isEmpty())
                        <tr class="text-gray-700 dark:text-gray-400 text-center">
                            <td class="px-4 py-3" colspan="5">No hay registros</td>
                        </tr>
                    @endif
                    @foreach ($usuario->tramites->take(5) as $tramite)
                        <tr class="text-gray-700 dark:text-gray-400 text-center">
                            <td class="px-4 py-3 font-semibold w-1/12">{{ $tramite->id }}</td>
                            <td class="px-4 py-3 w-4/12">{{ $tramite->cliente->nombres }}
                                {{ $tramite->cliente->apellidos }} </td>
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
