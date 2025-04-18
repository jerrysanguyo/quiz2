<div class="mb-4 text-left">
    <label for="name" class="block text-gray-700">{{ $page_title }}:</label>
    <input type="text" id="name" name="name" placeholder="Enter name" value="{{ old('name', $record->name ?? '') }}"
        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        required>
</div>
<div class="mb-4 text-left">
    <label for="guard_name" class="block text-gray-700">Guard:</label>
    <input type="text" id="guard_name" name="guard_name" placeholder="Enter guard"
        value="{{ old('guard_name', $record->guard_name ?? '') }}"
        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        required>
</div>