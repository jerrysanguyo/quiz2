<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-DsDSphub.css') }}">
    <script type="module" src="{{ asset('build/assets/app-CrVa0K3G.js') }}"></script>
</head>

<body class="min-h-screen bg-welcome bg-cover bg-no-repeat bg-fixed bg-center">
    <div class="absolute top-4 right-4 space-x-2">
        @if (Route::has('login'))
        @auth
        <a href="{{ url('/home') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Home</a>
        @else
        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Log
            in</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}"
            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">Register</a>
        @endif
        @endauth
        @endif
    </div>

    <main class="pt-16">
        @yield('content')
    </main>
</body>

</html>