@extends('layouts.login')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4">
    <div class="w-full max-w-md p-6 bg-white bg-opacity-90 backdrop-blur rounded-lg shadow-lg">
        <h2 class="text-4xl font-bold text-center text-blue-600 mb-2">Welcome!</h2>
        <p class="text-center text-md text-gray-400 mb-6 ">Kindly login your user credentials to access the dashboard!</p>
        <form method="POST" action="{{ route('login.authenticate') }}" class="space-y-4" aria-label="Login form">
            @csrf
            <div>
                <label for="email" class="block text-lg font-medium text-gray-700">Email Address</label>
                <input id="email" type="email" name="email" required autofocus
                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="you@example.com" />
            </div>
            <div>
                <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="********" />
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" type="checkbox" name="remember"
                        class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                    <label for="remember" class="ml-2 text-lg text-gray-700">Remember Me</label>
                </div>
            </div>
            <div>
                <button type="submit"
                    class="w-full px-4 py-3 bg-blue-600 text-white text-xl font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Log In
                </button>
            </div>
        </form>
    </div>
</div>
@endsection