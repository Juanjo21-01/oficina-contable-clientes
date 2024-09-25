<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Oficina Contable AFC</title>

    <!-- Fonts -->


    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- <body class="min-h-screen">

    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif
    </header>

    <main class="mt-6 h-full ">
        <h1 class="text-blue-900 text-center text-9xl">AFC</h1>
    </main>

</body> --}}

<body class="antialiased">
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
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Correo Electrónico</label>
                        <input type="email" id="email" name="email"
                            class="w-full p-3 border border-gray-300 rounded" required autofocus>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Contraseña</label>
                        <input type="password" id="password" name="password"
                            class="w-full p-3 border border-gray-300 rounded" required>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600">¿Olvidó su
                            contraseña?</a>
                    </div>
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full bg-red-500 text-white p-3 rounded-lg hover:bg-red-600">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
