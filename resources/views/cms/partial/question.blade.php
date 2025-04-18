<div class="mb-4 text-left">
    <label for="name" class="block text-gray-700">{{ $page_title }}:</label>
    <textarea id="name" name="name" placeholder="Enter question" required
        class="mt-1 min-h-50 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('name', $record->name ?? '') }}</textarea>
</div>
<div class="grid grid-cols-2 md:grid-cols-2 gap-4 text-left">
    <div class="mb-4">
        <label for="answer" class="block text-gray-700">Answer:</label>
        <input type="text" id="answer" name="answer" placeholder="Enter answer"
            value='{{ old('name', $record->answer ?? '') }}'
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>
    </div>
    <div class="mb-4">
        <label for="choices1" class="block text-gray-700">Choice B:</label>
        <input type="text" id="choices1" name="choices1" placeholder="Enter choice B"
            value='{{ old('name', $record->choices1 ?? '') }}'
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>
    </div>
</div>
<div class="grid grid-cols-2 md:grid-cols-2 gap-4 text-left">
    <div class="mb-4">
        <label for="choices2" class="block text-gray-700">Choice C:</label>
        <input type="text" id="choices2" name="choices2" placeholder="Enter choice C"
            value='{{ old('name', $record->choices2 ?? '') }}'
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>
    </div>
    <div class="mb-4">
        <label for="choices3" class="block text-gray-700">Choice D:</label>
        <input type="text" id="choices3" name="choices3" placeholder="Enter choice D"
            value='{{ old('name', $record->choices3 ?? '') }}'
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>
    </div>
</div>