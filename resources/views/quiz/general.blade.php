@extends('layouts.dashboard')

@section('content')
@section('breadcrumb')
<x-breadcrumb :items="[
    ['label' => $page_title, 'url' => route(Auth::user()->getRoleNames()->first() . '.general')],
]" />
@endsection

@if ($question)
<div class="min-h-[70vh] flex items-center justify-center px-4">
    <div class="w-full max-w-6xl bg-white shadow-lg rounded-xl p-8" x-data="{ 
                selected: '', 
                timeLeft: 60, 
                totalTime: 60,
                interval: null,
                startTimer() {
                    this.interval = setInterval(() => {
                        if (this.timeLeft > 0) {
                            this.timeLeft--
                        } else {
                            clearInterval(this.interval)
                        }
                    }, 1000)
                }
            }" x-init="startTimer()">

        <p class="text-sm text-red-600">*Note: when the time runs out your answer will be null.</p>
        <div class="flex justify-between items-center mb-2">
            <span class="text-sm text-gray-500">Time remaining:</span>
            <span class="text-lg font-bold text-red-600" x-text="timeLeft + 's'"></span>
        </div>

        <div class="w-full bg-gray-200 h-2 rounded-full mb-6 overflow-hidden">
            <div class="h-full bg-blue-500 transition-all duration-1000"
                :style="{ width: `${(timeLeft / totalTime) * 100}%` }"></div>
        </div>

        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">{{ $question->name }}</h1>

        <form method="POST" action="{{ route(Auth::user()->getRoleNames()->first() . '.answer.store') }}">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <input type="hidden" name="time_spent" :value="totalTime - timeLeft">

            <div class="grid grid-cols-1 gap-4" x-data="{ selected: '' }">
                @foreach ($choices as $choice)
                <label tabindex="0" class="relative flex items-center px-4 py-3 border border-gray-300 rounded-lg cursor-pointer
             hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" :class="{ 
        'bg-blue-100 border-blue-600 text-blue-900 font-semibold': selected === '{{ $choice['value'] }}' 
      }" @keydown.enter.prevent="selected = '{{ $choice['value'] }}'"
                    @keydown.space.prevent="selected = '{{ $choice['value'] }}'">
                    <input type="radio" name="answer" value="{{ $choice['value'] }}"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" x-model="selected" />
                    <div class="w-full text-left">
                        {{ $choice['value'] }}
                    </div>
                </label>
                @endforeach
            </div>


            <div class="mt-6">
                <button type="submit" x-ref="submitBtn"
                    class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition duration-200"
                    :disabled="timeLeft === 0">
                    Submit Answer
                </button>
            </div>
        </form>
    </div>
</div>
@else
<div class="min-h-[50vh] flex flex-col items-center justify-center text-center px-4">
    <h2 class="text-3xl font-bold text-green-600 mb-4">Quiz Completed!</h2>
    <p class="text-lg text-gray-700 mb-2">Here's your result summary:</p>

    <p class="text-md text-gray-600 mb-4">
        You got <span class="font-semibold text-blue-600">{{ $correctAnswers ?? 0 }}</span> out of
        <span class="font-semibold text-blue-600">{{ $totalQuestions ?? 0 }}</span> correct —
        <span class="font-semibold text-green-600">{{ $scorePercent ?? 0 }}%</span> score.
    </p>

    <div class="overflow-auto max-h-[60vh] border border-[#F4C027] rounded-lg w-full max-w-6xl">
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
                @foreach ($results as $result)
                <tr class="border-t border-[#F4C027]">
                    <td class="px-4">{{ $result['question'] ?? '' }}</td>
                    <td class="px-4">{{ $result['your_answer'] ?? '' }}</td>
                    <td class="px-4">{{ $result['correct_answer'] ?? '' }}</td>
                    <td class="px-4 text-center">
                        @if ($result['is_correct'])
                        <span class="text-green-600 font-semibold">✔</span>
                        @else
                        <span class="text-red-600 font-semibold">✘</span>
                        @endif
                    </td>
                    <td class="px-4 text-center">{{ $result['time_spent'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route(Auth::user()->getRoleNames()->first() . '.dashboard') }}"
        class="inline-block mt-3 px-5 py-3 text-white bg-[#1A4798] rounded-lg hover:bg-[#F4C027] hover:text-black hover:border border-[#F4C027] transition-colors">
        Back to Dashboard
    </a>
</div>

@endif
@endsection