<x-app-layout>
    <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Roles de los Usuarios
    </h1>

    <!-- Agregar -->
    {{-- <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-teal-100 bg-teal-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-teal"
        href="#">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>

            <span class="pl-4">Agregar nuevos roles</span>
        </div>
        <span>Vamos &RightArrow;</span>
    </a> --}}

    <!-- Tabla -->
    <livewire:roles.tabla />

</x-app-layout>
