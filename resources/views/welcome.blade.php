@extends('layouts.welcome')

@section('content')
<div class="">
    <div class="lg:mx-100 mx-auto p-6">
        <div class="grid grid-cols-4 gap-3 place-items-center">
            <img src="{{ asset('images/deped.webp') }}" alt="Deped" class="w-full">
            <img src="{{ asset('images/city-logo.webp') }}" alt="City Logo" class="w-full">
            <img src="{{ asset('images/PDAO.webp') }}" alt="PDAO" class="w-full">
            <img src="{{ asset('images/IT-white.webp') }}" alt="IT Logo" class="w-full">
        </div>
    </div>

    <div class="text-center space-y-2 font-mono text-white py-3">
        <h1 class="text-5xl md:text-8xl font-extrabold animate-pulse text-red-400">LOCAL I.T.</h1>
        <h1 class="text-5xl md:text-8xl font-extrabold animate-pulse text-red-400">ASSESSMENT</h1>
        <h1 class="text-5xl md:text-8xl font-extrabold animate-pulse text-red-400">FOR YOUTH</h1>
        <h1 class="text-5xl md:text-8xl font-extrabold animate-pulse text-red-400">WITH</h1>
        <h1 class="text-5xl md:text-8xl font-extrabold animate-pulse text-red-400">DISABILITIES</h1>
    </div>
</div>
@endsection