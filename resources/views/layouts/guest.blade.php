<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Oficina Contable AFC</title>

    <!-- Fonts -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    {{-- <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif
    </header> --}}

    <div class="flex h-screen bg-gray-100">
        <!-- Imagen del lado izquierdo -->
        <div class="w-1/2 bg-cover" style="background-image: url('/img/fondo-login.jpeg');"></div>

        <!-- Formulario del lado derecho -->
        <div class="w-1/2 flex flex-col justify-center items-center bg-white p-8">
            <div class="w-full max-w-md">
                <!-- Logotipo -->
                <div class="mb-4 text-center">
                    <img src="/img/logo.png" alt="Logo AFC" class="w-32 mx-auto">
                    <h2 class="text-3xl font-bold mt-2">Iniciar Sesión</h2>
                </div>

                <!-- Formulario de inicio de sesión -->
                <div
                    class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>


</body>

</html>
