<div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
    <div class="fixed inset-0 bg-black opacity-50" @click="showModal = false"></div>
    <div x-show="showModal" x-cloak x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="bg-white rounded-lg shadow-lg z-10 p-6 w-full max-w-3xl">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Add new {{ $resource }}</h2>
            <button @click="showModal = false"
                class="text-gray-600 hover:text-gray-800 text-2xl leading-none">&times;</button>
        </div>
        <form action="{{ route(Auth::user()->getRoleNames()->first() . '.' . $resource . '.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">{{ $page_title }}:</label>
                <input type="text" id="name" name="name" placeholder="Enter question"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="answer" class="block text-gray-700">Answer:</label>
                    <input type="text" id="answer" name="answer" placeholder="Enter answer"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="choices1" class="block text-gray-700">Choice B:</label>
                    <input type="text" id="choices1" name="choices1" placeholder="Enter choice B"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="choices2" class="block text-gray-700">Choice C:</label>
                    <input type="text" id="choices2" name="choices2" placeholder="Enter choice C"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="choices3" class="block text-gray-700">Choice D:</label>
                    <input type="text" id="choices3" name="choices3" placeholder="Enter choice D"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="button" @click="showModal = false"
                    class="px-4 py-2 mr-2 text-black rounded-lg hover:bg-[#F4C027] transition-colors">Cancel</button>
                <button type="submit"
                    class="px-4 py-2 text-white bg-[#1A4798] rounded-lg hover:bg-[#F4C027] hover:text-black transition-colors">Submit</button>
            </div>
        </form>
    </div>
</div>