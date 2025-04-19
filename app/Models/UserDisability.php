<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDisability extends Model
{
    use HasFactory;
    protected $table = 'user_disabilities';
    protected $fillable = [
        'user_id',
        'disability_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function disability()
    {
        return $this->belongsTo(Disability::class, 'disability_id');
    }
}
