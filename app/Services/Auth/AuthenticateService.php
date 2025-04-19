<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticateService
{
    public function login(array $data): User
    {
        if($user = Auth::attempt($data))
        {
            request()->session()->regenerate();
            return Auth::user();
        }

        return null;
    }

    public function logout(): ?User
    {
        $user = Auth::user();
        Auth::logout();
        return $user;
    }
}