<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = [
        'name', 
        'answer',
        'choices1',
        'choices2',
        'choices3',
    ];

    public static function getAllQuestions()
    {
        return self::all();
    }

    public static function getQuestion()
    {
        return self::whereNotIn('id', function ($query) {
            $query->select('question_id')
                  ->from('answers')
                  ->where('user_id', auth()->id());
        })->inRandomOrder()->first();
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
