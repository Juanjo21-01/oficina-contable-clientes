<x-app-layout>

    {{-- regresar --}}
    <a href="{{ route('tipo-tramites.index') }}" wire:navigate
        class="flex items-center text-gray-600 dark:text-gray-400 hover:underline m-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        <span>Volver a la tabla de tipo de tramites</span>
    </a>

    <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Tipo de Tramite No. {{ request()->route('id') }}
    </h1>

    <!-- Tabla -->

    <!-- Modal -->
</x-app-layout>
