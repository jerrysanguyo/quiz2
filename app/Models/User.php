<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getAllUsers()
    {
        return self::all();
    }

    public static function getRole()
    {
        return Role::all();
    }

    public static function getAllContestants()
    {
        return self::role('user')
            ->with('roles')
            ->get();
    }

    public static function getUser($user)
    {
        return self::where('id', $user)->first();
    }

    public function userDisability()
    {
        return $this->hasOne(UserDisability::class);
    }

    public function userAnswer()
    {
        return $this->hasMany(Answer::class);
    }

    public function userScore()
    {
        return $this->hasMany(Score::class);
    }

    public function excelScore()
    {
        return $this->hasOne(Score::class)
                    ->where('remarks', 'excel');
    }

    public function pptScore()
    {
        return $this->hasOne(Score::class)
                    ->where('remarks', 'ppt');
    }
}
