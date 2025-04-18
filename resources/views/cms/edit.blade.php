<div x-show="showEditModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
    <div class="fixed inset-0 bg-black opacity-50" @click="showEditModal = false"></div>
    <div x-show="showEditModal" x-cloak x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="bg-white rounded-lg shadow-lg z-10 p-6 w-full max-w-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Edit {{ $resource }}</h2>
            <button @click="showEditModal = false"
                class="text-gray-600 hover:text-gray-800 text-2xl leading-none">&times;</button>
        </div>
        <form action="{{ route(Auth::user()->getRoleNames()->first() . '.' . $resource . '.update', $record->id) }}"
            method="POST">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">{{ $page_title }}:</label>
                <textarea id="name" name="name" placeholder="Enter question" required
                    class="mt-1 block w-full min-h-40 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('name', $record->name) }}</textarea>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="answer" class="block text-gray-700">Answer:</label>
                    <input type="text" id="answer" name="answer" placeholder="Enter answer"
                        value="{{ $record->answer }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="choices1" class="block text-gray-700">Choice B:</label>
                    <input type="text" id="choices1" name="choices1" placeholder="Enter choice B"
                        value="{{ $record->choices1 }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="choices2" class="block text-gray-700">Choice C:</label>
                    <input type="text" id="choices2" name="choices2" placeholder="Enter choice C"
                        value="{{ $record->choices2 }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="choices3" class="block text-gray-700">Choice D:</label>
                    <input type="text" id="choices3" name="choices3" placeholder="Enter choice D"
                        value="{{ $record->choices3 }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="button" @click="showEditModal = false"
                    class="px-4 py-2 mr-2 text-black rounded-lg hover:bg-gray-300 transition-colors">Cancel</button>
                <button type="submit"
                    class="px-4 py-2 text-white bg-gray-700 rounded-lg hover:bg-gray-300 hover:text-black transition-colors">Submit</button>
            </div>
        </form>
    </div>
</div>