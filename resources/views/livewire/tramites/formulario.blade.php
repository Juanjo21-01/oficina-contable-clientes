<div>
    <form wire:submit.prevent="guardar">
        @if ($errorMessage)
            <div class="bg-red-500 text-white p-2 rounded mb-4 text-sm">{{ $errorMessage }}</div>
        @endif

        <!-- Agrupar los campos en una grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Cliente -->
            <div>
                <x-input-label for="cliente_id" :value="__('Cliente')" />
                <select wire:model="clienteId" id="cliente_id"
                    class="block w-full mt-1 px-3 py-1 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-teal-400 dark:focus:border-teal-600 focus:outline-none focus:shadow-outline-teal rounded-md shadow-sm form-select {{ $errors->has('clienteId') ? 'border-red-600 focus:border-red-400 dark:border-red-400' : '' }}"
                    name="clienteId" autofocus wire:keydown="clearError('clienteId')">
                    <option value="">Seleccione un cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombres }}
                            {{ $cliente->apellidos }}
                        </option>
                    @endforeach
                </select>
                @error('clienteId')
                    <span class="text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Tipo de Trámite -->
            <div>
                <x-input-label for="tipo_tramite_id" :value="__('Tipo de Trámite')" />
                <select wire:model="tipoTramiteId" id="tipo_tramite_id"
                    class="block w-full mt-1 px-3 py-1 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-teal-400 dark:focus:border-teal-600 focus:outline-none focus:shadow-outline-teal rounded-md shadow-sm form-select {{ $errors->has('tipoTramiteId') ? 'border-red-600 focus:border-red-400 dark:border-red-400' : '' }}"
                    name="tipoTramiteId" wire:keydown="clearError('tipoTramiteId')">
                    <option value="">Seleccione un tipo de trámite</option>
                    @foreach ($tiposTramites as $tipoTramite)
                        <option value="{{ $tipoTramite->id }}">{{ $tipoTramite->nombre }}</option>
                    @endforeach
                </select>
                @error('tipoTramiteId')
                    <span class="text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Fecha -->
            <div>
                <x-input-label for="fecha" :value="__('Fecha')" />
                <x-text-input wire:model="fecha" id="fecha"
                    class="block w-full mt-1 px-3 py-1 {{ $errors->has('fecha') ? 'border-red-600 focus:border-red-400 dark:border-red-400' : '' }}"
                    type="date" name="fecha" wire:keydown="clearError('fecha')" />
                @error('fecha')
                    <span class="text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Precio -->
            <div>
                <x-input-label for="precio" :value="__('Precio')" />
                <x-text-input wire:model="precio" id="precio"
                    class="block w-full mt-1 px-3 py-1 {{ $errors->has('precio') ? 'border-red-600 focus:border-red-400 dark:border-red-400' : '' }}"
                    type="number" name="precio" wire:keydown="clearError('precio')" />
                @error('precio')
                    <span class="text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Gastos -->
            <div>
                <x-input-label for="gastos" :value="__('Gastos')" />
                <x-text-input wire:model="gastos" id="gastos"
                    class="block w-full mt-1 px-3 py-1 {{ $errors->has('gastos') ? 'border-red-600 focus:border-red-400 dark:border-red-400' : '' }}"
                    type="number" name="gastos" wire:keydown="clearError('gastos')" />
                @error('gastos')
                    <span class="text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Observaciones -->
            <div>
                <x-input-label for="observaciones" :value="__('Observaciones')" />
                <textarea wire:model="observaciones" id="observaciones"
                    class="block w-full mt-1 px-3 py-1 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-teal-400 dark:focus:border-teal-600 focus:outline-none focus:shadow-outline-teal rounded-md shadow-sm form-textarea {{ $errors->has('observaciones') ? 'border-red-600 focus:border-red-400 dark:border-red-400' : '' }}"
                    name="observaciones" wire:keydown="clearError('observaciones')"></textarea>
                @error('observaciones')
                    <span class="text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <!-- Botones -->
        <div
            class="flex flex-col items-center text-center justify-center p-6 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row">
            <a type="button" href="{{ route('tramites.index') }}"
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-8 sm:py-3 sm:w-auto active:bg-transparent hover:border-rose-500 focus:border-rose-500 active:text-gray-500 focus:outline-none">
                Cancelar
            </a>
            <button type="submit"
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg sm:w-auto sm:px-8 sm:py-3 focus:outline-none bg-teal-600 active:bg-teal-600 hover:bg-teal-700">
                Guardar
            </button>
        </div>
    </form>


</div>
