<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $results = Answer::getResultsForUser(Auth::user()->id);
        $totalQuestions = $results->count();
        $correctAnswers = $results->where('is_correct', true)->count();
        $scorePercent = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100, 2) : 0;

        return view('dashboard', compact(
            'results',
            'totalQuestions',
            'correctAnswers',
            'scorePercent'
        ));
    }
}
