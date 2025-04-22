<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $table = 'scores';
    protected $fillable = [
        'user_id',
        'score',
        'remarks'
    ];

    public static function getUserExcelScore($user)
    {
        return self::where('user_id', $user)
                ->where('remarks', 'excel')
                ->first();
    }

    public static function getUserPptScore($user)
    {
        return self::where('user_id', $user)
                ->where('remarks', 'ppt')
                ->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
