@extends('layouts.dashboard')
@section('content')
@section('breadcrumb')
<x-breadcrumb :items="[
        ['label' => $page_title, 'url' => route(Auth::user()->getRoleNames()->first() . '.profile', Auth::user()->id )],
    ]" />
@endsection

<div class="flex justify-between mb-5 overflow-auto">
    <h1 class="text-3xl font-bold mb-2 text-center text-gray-800">User {{ $page_title }}</h1>
</div>
@include('components.alert')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
    <div class="w-full bg-white p-8 rounded-lg shadow-lg border border-gray-200 overflow-auto max-h-[75vh]">
        <h1 class="text-xl font-bold mb-5 text-gray-800">Update {{ $page_title }}</h1>
        <form action="{{ route(Auth::user()->getRoleNames()->first() . '.' . $resource . '.update', $record->id) }}"
            method="POST">
            @csrf
            @method('put')
            @include('cms.partial.user')
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 text-white bg-[#1A4798] rounded-lg hover:bg-[#F4C027] hover:text-black transition-colors">Submit</button>
            </div>
        </form>
    </div>
    <div class="w-full bg-white p-8 sm:p-10 rounded-2xl shadow-lg border border-gray-200
                flex items-center justify-center overflow-auto max-h-[75vh]">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="flex flex-col items-center justify-center p-6
                    bg-gradient-to-br from-blue-600 to-blue-500 text-white
                    rounded-2xl shadow-md transform hover:scale-105
                    transition-transform duration-300">
                <i class="fa-solid fa-brain text-4xl mb-3"></i>
                <h3 class="text-lg font-semibold">General Knowledge</h3>
                <span class="mt-2 text-lg font-medium">Score: {{ $scorePercent ?? 0 }}%</span>
            </div>
            <div class="flex flex-col items-center justify-center p-6
                    bg-gradient-to-br from-green-600 to-green-500 text-white
                    rounded-2xl shadow-md transform hover:scale-105
                    transition-transform duration-300">
                <i class="fa-solid fa-file-excel text-4xl mb-3"></i>
                <h3 class="text-lg font-semibold">MS Excel</h3>
                <span class="mt-2 text-lg font-medium">Score: {{ $scores['excel'] ?? 0 }}</span>
            </div>
            <div class="flex flex-col items-center justify-center p-6
                    bg-gradient-to-br from-yellow-500 to-yellow-400 text-white
                    rounded-2xl shadow-md transform hover:scale-105
                    transition-transform duration-300">
                <i class="fa-solid fa-file-powerpoint text-4xl mb-3"></i>
                <h3 class="text-lg font-semibold">MS PowerPoint</h3>
                <span class="mt-2 text-lg font-medium">Score: {{ $scores['ppt'] ?? 0 }}</span>
            </div>
        </div>
    </div>
</div>
@endsection