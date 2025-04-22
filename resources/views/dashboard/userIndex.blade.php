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