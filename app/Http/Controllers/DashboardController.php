<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\User;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Optional;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        $page_title = 'Contestant';
        $resource = 'user';
        $columns = ['Name', 'Disability', 'Gen knowledge', 'Ms Excel', 'Ms Ppt', 'Total', 'Action'];
        $contestants = User::getAllContestants()
        ->map(function($user) {
            // excel ppt score
            $numberOfItems = 15;
            $excelScore = optional(Score::getUserExcelScore($user->id))->score ?? 0;
            $pptScore = optional(Score::getUserPptScore($user->id))->score ?? 0;
            $user->excel = ($excelScore / $numberOfItems) * 100;
            $user->ppt   = ($pptScore / $numberOfItems) * 100;
            // gen knowledge
            $results           = Answer::getResultsForUser($user->id);
            $total             = $results->count();
            $correct           = $results->where('is_correct', true)->count();
            $user->scorePercent = $total
                ? round($correct / $total * 100, 2)
                : 0;
            // computation of total
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
        $summary = Answer::getQuizSummary(Auth::user()->id);

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
            'summary',
        ));
    }

    public function excel()
    {
        $filePath = public_path('etool/eTool_excel_local.xlsx');
    
        if (!File::exists($filePath)) {
            abort(404, 'Excel file not found.');
        }
    
        $fileName = Auth::user()->first_name . '_' . Auth::user()->id . '-etool-excel.xlsx';
    
        return response()->download($filePath, $fileName);
    }
    
    public function ppt()
    {
        $filePath = public_path('etool/eTool_PPT_local.pptx');
    
        if (!File::exists($filePath)) {
            abort(404, 'PPT file not found.');
        }
    
        $fileName = Auth::user()->first_name . '_' . Auth::user()->id . '-etool-ppt.pptx';
    
        return response()->download($filePath, $fileName);
    }
}