<?php

namespace App\Services;

use App\Models\Question;

class QuestionService
{
    public function store(array $data): Question
    {
        $question = Question::create($data);

        return $question ?: null;
    }

    public function update(array $data, $question): Question
    {
        return $question->update($data) ? $question : null;
    }

    public function destroy($question): Question
    {
        return $question->delete() ? $question : null;
    }
}