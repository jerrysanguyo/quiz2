<?php

namespace App\Services;

use App\Models\Score;
use Illuminate\Support\Facades\Auth;

class ScoreService
{
    public function store(array $data, $user): Score
    {
        $score = Score::create([
            'user_id' => $user->id,
            'score' => $data['score'],
            'remarks' => $data['remarks'],
        ]);

        return $score ?: null;
    }

    public function update(array $data, $score): Score
    {
        return $score->update([ 
            'score' => $data['score'],
            'remarks' => $data['remarks'],
        ]) ? $score : null;
    }

    public function destroy($score): Score
    {
        return $score->delete() ? $score : null;
    }
}