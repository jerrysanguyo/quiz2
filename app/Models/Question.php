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
        // return self::all()->random();
        return self::all();
    }
}
