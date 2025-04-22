@if (session('success'))
<div x-data="{ open: true }" x-show="open"
    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-center"
    role="alert">
    <button @click="open = false" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-700 hover:text-green-900"
        aria-label="Close">
        &times;
    </button>
    <span class="block sm:inline">{{ session('success') }}</span>
</div>
@endif

@if ($errors->any())
<div x-data="{ open: true }" x-show="open"
    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-center" role="alert">
    <button @click="open = false" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-red-700 hover:text-red-900"
        aria-label="Close">
        &times;
    </button>
    <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@elseif (session('failed'))
<div x-data="{ open: true }" x-show="open"
    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-center" role="alert">
    <button @click="open = false" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-red-700 hover:text-red-900"
        aria-label="Close">
        &times;
    </button>
    <span class="block sm:inline">{{ session('failed') }}</span>
</div>
@endif