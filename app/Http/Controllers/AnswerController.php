<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Http\Requests\AnswerRequest;
use App\Services\AnswerService;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{   
    protected $answerServices;

    public function __construct(AnswerService $answerService)
    {
        $this->answerServices = $answerService;
    }

    public function store(AnswerRequest $request)
    {
        $answer = $this->answerServices->store($request->validated());

        activity()
            ->performedOn($answer)
            ->causedBy(Auth::user())
            ->log('Added an answer: '. $answer->answer . 'to Question id:' . $answer->question_id);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.general')
            ->with('success', 'Answer added successfully!');
    }
}
