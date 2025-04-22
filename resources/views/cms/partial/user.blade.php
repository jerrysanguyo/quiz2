<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 text-left">
    <div class="mb-4">
        <label for="first_name" class="block text-gray-700">First name</label>
        <input type="text" id="first_name" name="first_name" placeholder="Enter First name"
            value="{{ old('first_name', $record->first_name ?? '') }}"
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>
        @error('first_name')
        <p class="text-sm text-red-700">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="middle_name" class="block text-gray-700">Middle name</label>
        <input type="text" id="middle_name" name="middle_name" placeholder="Enter Middle name"
            value="{{ old('middle_name', $record->middle_name ?? '') }}"
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('middle_name')
        <p class="text-sm text-red-700">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="last_name" class="block text-gray-700">Last name</label>
        <input type="text" id="last_name" name="last_name" placeholder="Enter Last name"
            value="{{ old('last_name', $record->last_name ?? '') }}"
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>
        @error('last_name')
        <p class="text-sm text-red-700">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 text-left">
    <div class="mb-4">
        <label for="email" class="block text-gray-700">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Email"
            value="{{ old('email', $record->email ?? '') }}"
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>
        @error('email')
        <p class="text-sm text-red-700">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="disability_id" class="block text-gray-700">Disability</label>
        <select name="disability_id" id="disability_id"
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach ($subData as $data)
            <option value="{{ $data->id }}"
                {{ old('disability_id', $record->userDisability->disability_id ?? '') === $data->id ? 'selected' : '' }}>
                {{ $data->name }}</option>
            @endforeach
        </select>
        @error('disability_id')
        <p class="text-sm text-red-700">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 text-left">
    <div class="mb-4" x-data="{ show: false }">
        <label for="password" class="block text-gray-700">Password</label>
        <div class="relative mt-1">
            <input :type="show ? 'text' : 'password'" id="password" name="password" placeholder="Enter Password"
                class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="button" @click="show = !show"
                class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-600" tabindex="-1">
                <i :class="show ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
            </button>
        </div>
        @error('password')
        <p class="text-sm text-red-700">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4" x-data="{ show: false }">
        <label for="password_confirmation" class="block text-gray-700">Confirm password</label>
        <div class="relative mt-1">
            <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation"
                placeholder="Confirm Password"
                class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="button" @click="show = !show"
                class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-600" tabindex="-1">
                <i :class="show ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
            </button>
        </div>
        @error('password_confirmation')
        <p class="text-sm text-red-700">{{ $message }}</p>
        @enderror
    </div>
</div>