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
    <nav class="mx-auto flex justify-end space-x-2">
        <div class="p-2 text-sm text-white md:text-md lg:text-lg">
            <a href="{{ route('login') }}">
                <button class=" font-medium py-2 px-8 rounded-md hover:bg-blue-300 hover:text-black">Login</button>
            </a> 
            |
            <a href="">
                <button class=" font-medium py-2 px-8 rounded-md hover:bg-yellow-300 hover:text-black">Home</button>
            </a> 
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>

</html>