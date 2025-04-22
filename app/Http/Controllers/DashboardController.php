<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\User;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Optional;

class DashboardController extends Controller
{
    public function index()
    {
        $page_title = 'Contestant';
        $resource = 'user';
        $columns = ['Name', 'Disability', 'Gen knowledge', 'Ms Excel', 'Ms Ppt', 'Total', 'Action'];
        $contestants = User::getAllContestants()
        ->map(function($user) {
            $excelModel = Score::getUserExcelScore($user->id);
            $pptModel   = Score::getUserPptScore($user->id);
            $user->excel = optional($excelModel)->score ?? 0;
            $user->ppt   = optional($pptModel)->score   ?? 0;
            $results           = Answer::getResultsForUser($user->id);
            $total             = $results->count();
            $correct           = $results->where('is_correct', true)->count();
            $user->scorePercent = $total
                ? round($correct / $total * 100, 2)
                : 0;
                
            $parts = array_filter([
                $user->scorePercent,
                $user->excel,
                $user->ppt,
            ], fn($v) => $v > 0);

            $user->totalPercent = count($parts)
                ? round(array_sum($parts) / count($parts), 2)
                : 0;

            return $user;
        });

        $results = Answer::getResultsForUser(Auth::user()->id);
        $totalQuestions = $results->count();
        $correctAnswers = $results->where('is_correct', true)->count();
        $scorePercent = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100, 2) : 0;
        $excelScore = Score::getUserExcelScore(Auth::user()->id);
        $pptScore = Score::getUserPptScore(Auth::user()->id);

        return view('dashboard', compact(
            'contestants',
            'page_title',
            'resource',
            'columns',
            'results',
            'totalQuestions',
            'correctAnswers',
            'scorePercent',
            'excelScore',
            'pptScore',
        ));
    }
}