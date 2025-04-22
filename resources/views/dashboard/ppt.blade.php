<div x-show="addPptScore" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
    <div class="fixed inset-0 bg-black opacity-50" @click="addPptScore = false"></div>
    <div x-show="addPptScore" x-cloak x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="bg-white rounded-lg shadow-lg z-10 p-6 w-full max-w-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Ms PPT score:</h2>
            <button @click="addPptScore = false"
                class="text-gray-600 hover:text-gray-800 text-2xl leading-none">&times;</button>
        </div>
        <form action="#" method="POST">
            @csrf
            @method('put')
            <div class="flex justify-end">
                <button type="button" @click="addPptScore = false"
                    class="px-4 py-2 mr-2 text-black rounded-lg hover:bg-[#F4C027] transition-colors">Cancel</button>
                <button type="submit"
                    class="px-4 py-2 text-white bg-[#1A4798] rounded-lg hover:bg-[#F4C027] hover:text-black transition-colors">Submit</button>
            </div>
        </form>
    </div>
</div>