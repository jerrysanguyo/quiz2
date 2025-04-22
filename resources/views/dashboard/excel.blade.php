<div x-show="addExcelScore" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
    <div class="fixed inset-0 bg-black opacity-50" @click="addExcelScore = false"></div>
    <div x-show="addExcelScore" x-cloak x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="bg-white rounded-lg shadow-lg z-10 p-6 w-full max-w-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">MS Excel score:</h2>
            <button @click="addExcelScore = false"
                class="text-gray-600 hover:text-gray-800 text-2xl leading-none">&times;</button>
        </div>
        @if ($record->excel == 0)
        <form action="{{ route(Auth::user()->getRoleNames()->first() . '.score.userStore', $record->id) }}"
            method="POST">
        @else
        <form action="{{ route(Auth::user()->getRoleNames()->first() . '.score.update', $record->excelScore->id) }}"
            method="POST">
            @method('PUT')
        @endif
            @csrf
            <div class="my-3">
                <input type="hidden" name="remarks" value="excel">
                <label for="score" class="block text-md text-gray-700">Excel score:</label>
                <input type="number" id="score" name="score" placeholder="Score" value="{{ old('score', $record->excel) ?? '' }}" step="0.01"
                    min="0" max="100" inputmode="decimal" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md
                focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                @error('score')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="button" @click="addExcelScore = false"
                    class="px-4 py-2 mr-2 text-black rounded-lg hover:bg-[#F4C027] transition-colors">Cancel</button>
                <button type="submit"
                    class="px-4 py-2 text-white bg-[#1A4798] rounded-lg hover:bg-[#F4C027] hover:text-black transition-colors">Submit</button>
            </div>
        </form>
    </div>
</div>