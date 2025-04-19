<?php

namespace App\Services;

use App\Models\Answer;
use Illuminate\Support\Facades\Auth;   

class AnswerService
{
    public function store(array $data): Answer
    {
        $answer = Answer::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'question_id' => $data['question_id'],
            ],
            [
                'answer' => $data['answer'],
                'time_spent' => $data['time_spent'],
            ]
        );

        return $answer ?: null;
    }
}