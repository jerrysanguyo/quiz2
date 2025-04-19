<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class QuizController extends Controller
{
    public function general()
    {
        $page_title = "General knowledge quiz!";
        $question = Question::getQuestion();

        if ($question) {
            $choices = [
                ['key' => 'answer', 'value' => $question->answer],
                ['key' => 'choices1', 'value' => $question->choices1],
                ['key' => 'choices2', 'value' => $question->choices2],
                ['key' => 'choices3', 'value' => $question->choices3],
            ];

            $choices = Arr::shuffle($choices);
        } else {
            $choices = [];
        }
        
        $results = Answer::getResultsForUser(Auth::user()->id);

        $totalQuestions = $results->count();
        $correctAnswers = $results->where('is_correct', true)->count();
        $scorePercent = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100, 2) : 0;

        return view('quiz.general', compact(
            'question',
            'page_title',
            'choices',
            'results',
            'totalQuestions',
            'correctAnswers',
            'scorePercent'
        ));
    }
}