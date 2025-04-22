<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $page_title = 'Contestant';
        $resource = 'user';
        $columns = ['Name', 'Disability', 'Gen knowledge', 'Ms Excel', 'Ms Ppt', 'Total', 'Action'];
        $contestants = User::getAllContestants()
        ->map(function($user) {
            $results = Answer::getResultsForUser($user->id);
            $total   = $results->count();
            $correct = $results->where('is_correct', true)->count();

            $user->scorePercent = $total
                                 ? round($correct / $total * 100, 2)
                                 : 0;
            return $user;
        });

        $results = Answer::getResultsForUser(Auth::user()->id);
        $totalQuestions = $results->count();
        $correctAnswers = $results->where('is_correct', true)->count();
        $scorePercent = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100, 2) : 0;

        return view('dashboard', compact(
            'contestants',
            'page_title',
            'resource',
            'columns',
            'results',
            'totalQuestions',
            'correctAnswers',
            'scorePercent',
        ));
    }
}