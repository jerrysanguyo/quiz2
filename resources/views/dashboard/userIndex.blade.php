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
        <span class="mt-2 text-lg font-medium">Score: {{ $excelScore->score ?? 0 }} %</span>
    </div>
    <div class="flex flex-col items-center justify-center p-6
                    bg-gradient-to-br from-yellow-500 to-yellow-400 text-white
                    rounded-2xl shadow-md transform hover:scale-105
                    transition-transform duration-300">
        <i class="fa-solid fa-file-powerpoint text-4xl mb-3"></i>
        <h3 class="text-lg font-semibold">MS PowerPoint</h3>
        <span class="mt-2 text-lg font-medium">Score: {{ $pptScore->score ?? 0 }}</span>
    </div>
</div>

<p class="text-3xl font-bold mb-2 text-gray-800 mt-5">Quiz Summary:</p>
<div class="overflow-auto max-h-[55vh] border border-[#F4C027] rounded-lg w-full">
    <table class="w-full text-left min-w-[800px]">
        <thead class="bg-[#F4C027] sticky top-0 z-10 text-center">
            <tr>
                <th class="px-4">Question</th>
                <th class="px-4">Your Answer</th>
                <th class="px-4">Correct Answer</th>
                <th class="px-4 text-center">Result</th>
                <th class="px-4 text-center">Time Spent (s)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($summary as $quiz)
            <tr class="border-t border-[#F4C027] text-center">
                <td class="px-4">{{ $quiz->question->name ?? '' }}</td>
                <td class="px-4">{{ $quiz->answer ?? '' }}</td>
                <td class="px-4">{{ $quiz->question->answer ?? '' }}</td>
                <td class="px-4">
                    @if ($quiz->answer === $quiz->question->answer)
                    <span class="text-green-600 font-semibold">✔</span>
                    @else
                    <span class="text-red-600 font-semibold">✘</span>
                    @endif
                </td>
                <td class="px-4">{{ $quiz->time_spent ?? '' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-4 text-center">
                    You haven’t taken the general knowledge quiz.
                </td>
            </tr>
            @endforelse
        </tbody>
        </tbody>
    </table>
</div>