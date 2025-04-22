<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table = 'answers';
    protected $fillable = [
        'user_id',
        'question_id',
        'answer',
        'time_spent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public static function getResultsForUser($user)
    {
        return self::with('question')
            ->where('user_id', $user)
            ->get()
            ->map(function ($answer) {
                return [
                    'question'       => $answer->question->name,
                    'your_answer'    => $answer->answer,
                    'correct_answer' => $answer->question->answer,
                    'is_correct'     => $answer->answer === $answer->question->answer,
                    'time_spent'     => $answer->time_spent,
                ];
            });
    }

    public static function getQuizSummary($user)
    {
        return self::where('user_id', $user)->get();
    }
}