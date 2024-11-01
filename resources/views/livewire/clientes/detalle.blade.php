<div>
    <div class="p-6 space-y-8">
        <!-- Tarjeta de perfil del cliente -->
        <div class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <div class="space-y-2 w-full">
                <h2 class="text-2xl font-semibold text-teal-600 dark:text-teal-400">{{ $cliente->nombres }}
                    {{ $cliente->apellidos }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 p-3">
                    <p class="text-gray-700 dark:text-gray-300"><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>DPI:</strong> {{ $cliente->dpi }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>NIT:</strong> {{ $cliente->nit }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>Email:</strong> {{ $cliente->email }}</p>
                    <p class="text-gray-700 dark:text-gray-300">
                        <strong>Estado:</strong>
                        <span
                            class="{{ $cliente->estado ? 'text-teal-500 dark:text-teal-400' : 'text-red-500 dark:text-red-400' }}">
                            {{ $cliente->estado ? 'Activo' : 'Inactivo' }}
                        </span>
                    </p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>Tipo de Cliente:</strong>
                        {{ $cliente->tipoCliente->nombre }}</p>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row justify-end gap-1">
                <button wire:click="cambiarEstado({{ $cliente->id }})"
                    class="px-4 py-2 font-semibold leading-tight rounded-full {{ !$cliente->estado ? 'bg-teal-100 dark:bg-teal-700 text-teal-700 dark:text-teal-100' : 'bg-rose-100 dark:bg-rose-700 text-rose-700 dark:text-rose-100' }}">
                    {{ !$cliente->estado ? 'Activar' : 'Desactivar' }}
                </button>
                <button title="Editar el cliente" wire:click="editar({{ $cliente->id }})"
                    class="px-4 py-2 text-orange-600 dark:text-orange-400 rounded-lg focus:outline-none hover:border hover:border-orange-600 dark:hover:border-orange-400 border border-transparent flex items-center gap-1"
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

        <!-- Agencia Virtual -->
        <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-teal-600 dark:text-teal-400 mb-2">Agencia Virtual</h3>
            @if ($cliente->agenciaVirtual)
                <div class="flex items-center">
                    <div class="w-full grid grid-cols-1 sm:grid-cols-2 gap-2 p-3">
                        <p class="text-gray-700 dark:text-gray-300"><strong>Correo Electrónico:</strong>
                            {{ $cliente->agenciaVirtual->correo }}</p>
                        <p class="text-gray-700 dark:text-gray-300"><strong>Usuario (nit):</strong> {{ $cliente->nit }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300"><strong>Contraseña:</strong>
                            {{ $cliente->agenciaVirtual->password }}</p>
                        <p class="text-gray-700 dark:text-gray-300"><strong>Observaciones:</strong>
                            {{ $cliente->agenciaVirtual->observaciones ?? 'No hay observaciones' }}</p>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-end gap-1">
                        <a href="https://farm3.sat.gob.gt/menu/login.jsf" target="_blank" rel="noopener noreferrer"
                            class="px-4 py-2 font-semibold leading-tight text-purple-600 dark:text-purple-400 rounded-lg focus:outline-none hover:border hover:border-purple-600 dark:hover:border-purple-400 border border-fuchsia-500 text-center hover:rounded-xl">
                            Visitar Agencia
                        </a>
                        <button title="Editar el cliente" wire:click="editarAgencia"
                            class="px-4 py-2 text-orange-600 dark:text-orange-400 rounded-lg focus:outline-none hover:border hover:border-orange-600 dark:hover:border-orange-400 border border-transparent flex items-center gap-1"
                            aria-label="Editar">
                            <span class="hidden sm:inline">Editar</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                        </button>
                    </div>
                </div>
            @else
                <p class="text-gray-700 dark:text-gray-300 text-center">No se ha creado una agencia virtual para este
                    cliente.</p>
                <button wire:click="abrirAgencia"
                    class="mt-3 px-4 py-2 text-white bg-teal-600 dark:bg-teal-700 rounded-lg hover:bg-teal-700 dark:hover:bg-teal-600 mx-auto block">
                    Crear Agencia Virtual
                </button>
            @endif
        </div>

        <!-- Espacio para estadísticas -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
            <h3 class="text-2xl font-semibold text-teal-600 dark:text-teal-400">Estadísticas</h3>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Gráfica de la cantidad de trámites realizados</p>
            <div class="w-full h-64 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                <span class="text-gray-500 dark:text-gray-400">Gráfica aquí</span>
            </div>
        </div>

        <!-- Tabla de Trámites Relacionados -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
            <div class="flex justify-between">
                <h3 class="text-xl font-semibold text-teal-600 dark:text-teal-400 p-2">Últimos Trámites Realizados</h3>
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
                        class="text-xs font-semibold tracking-widest text-center text-gray-500 uppercase border-b-2 bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700">
                        <th class="px-4 py-3 w-1/12">No.</th>
                        <th class="px-4 py-3 w-3/12">Cliente</th>
                        <th class="px-4 py-3 w-2/12">Gastos</th>
                        <th class="px-4 py-3 w-3/12">Tipo de trámite</th>
                        <th class="px-4 py-3 w-2/12">Fecha</th>
                        <th class="px-4 py-3 w-1/12">PDF</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @if ($cliente->tramites->isEmpty())
                        <tr class="text-gray-700 dark:text-gray-400 text-center">
                            <td class="px-4 py-3" colspan="6">No hay registros</td>
                        </tr>
                    @endif
                    @foreach ($cliente->tramites->take(5) as $tramite)
                        <tr class="text-gray-700 dark:text-gray-300 text-center">
                            <td class="px-4 py-3 font-semibold w-1/12">{{ $tramite->id }}</td>
                            <td class="px-4 py-3 w-3/12">{{ $tramite->cliente->nombres }}
                                {{ $tramite->cliente->apellidos }} </td>
                            <td class="px-4 py-3 w-2/12">Q. {{ $tramite->gastos }}</td>
                            <td class="px-4 py-3 w-3/12">{{ $tramite->tipoTramite->nombre }}</td>
                            <td class="px-4 py-3 font-semibold w-2/12">{{ $tramite->fecha }}</td>
                            <td class="px-4 py-3 w-1/12">
                                <a title="Descargar el trámite" href="{{ route('tramites.pdf', $tramite->id) }}"
                                    class="px-4 py-2 text-orange-600 dark:text-orange-400 rounded-lg focus:outline-none hover:border hover:border-orange-600 border border-transparent flex items-center gap-1 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal para agregar  -->
        @if ($abrirModalAgencia)
            <div
                class="fixed inset-0 z-30 flex items-center bg-black bg-opacity-50 sm:items-center sm:justify-center transition ease-out duration-150">
                <div class="w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg px-6 py-4 max-w-md m-2">
                    <!-- Header -->
                    <header class="flex justify-between px-6 py-3">
                        <p
                            class="text-xl font-semibold {{ $cliente->agenciaVirtual ? 'text-amber-600 dark:text-amber-400' : 'text-teal-600 dark:text-teal-400' }}">
                            {{ isset($cliente->agenciaVirtual) ? 'Editar ' : 'Agregar ' }} Agencia de:
                            {{ $cliente->nombres }}</p>
                        <button
                            class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover:text-gray-700 hover:border"
                            wire:click="cerrarModalAgencia" aria-label="close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </header>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div class="px-6 py-4">
                        <div class="mt-4">
                            <form wire:submit.prevent="agregarAgenciaVirtual">
                                <!-- Correo Electrónico -->
                                <div class="mb-2">
                                    <x-input-label for="correo" :value="__('Correo Electrónico')" />
                                    <x-text-input wire:model="correo" id="correo"
                                        class="block w-full mt-1 px-3 py-1 {{ $errors->has('correo') ? 'border-red-600 focus:border-red-400  dark:border-red-400' : '' }}"
                                        type="email" name="correo" autofocus
                                        wire:keydown="clearError('correo')" />
                                    @error('correo')
                                        <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Contraseña -->
                                <div class="mb-2">
                                    <x-input-label for="contrasenia" :value="__('Contraseña')" />
                                    <x-text-input wire:model="contrasenia" id="contrasenia"
                                        class="block w-full mt-1 px-3 py-1 {{ $errors->has('contrasenia') ? 'border-red-600 focus:border-red-400  dark:border-red-400' : '' }}"
                                        type="password" name="contrasenia"
                                        wire:keydown="clearError('contrasenia')" />
                                    @error('contrasenia')
                                        <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Observaciones -->
                                <div class="mb-2">
                                    <x-input-label for="observaciones" :value="__('Observaciones (Opcional)')" />
                                    <textarea wire:model="observaciones" id="observaciones"
                                        class="block w-full mt-1 px-3 py-1 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-teal-400 dark:focus:border-teal-600 focus:outline-none focus:shadow-outline-teal rounded-md shadow-sm form-textarea {{ $errors->has('observaciones') ? 'border-red-600 focus:border-red-400  dark:border-red-400' : '' }}"
                                        name="observaciones" wire:keydown="clearError('observaciones')"></textarea>
                                    @error('observaciones')
                                        <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Botones del Formulario -->
                                <div
                                    class="flex flex-col items-center justify-center px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row">
                                    <button wire:click="cerrarModalAgencia" type="button"
                                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-teal-500 focus:border-teal-500 active:text-gray-500 focus:outline-none">
                                        Cancelar
                                    </button>
                                    <button type="submit"
                                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 focus:outline-none {{ $cliente->agenciaVirtual ? 'bg-amber-600 active:bg-amber-600 hover:bg-amber-700' : 'bg-teal-600 active:bg-teal-600 hover:bg-teal-700' }}">
                                        {{ isset($cliente->agenciaVirtual) ? 'Actualizar' : 'Guardar' }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
