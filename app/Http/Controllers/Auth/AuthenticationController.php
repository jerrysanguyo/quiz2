<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; 
use App\Http\Requests\LoginRequest;
use App\Services\Auth\AuthenticateService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;

class AuthenticationController extends Controller
{
    protected $authServices;

    public function __construct(AuthenticateService $authServices)
    {
        $this->authServices = $authServices;
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $ip      = $request->ip();
        $browser = $request->header('User-Agent');
    
        try {
            $user = $this->authServices->login($request->validated());
    
            activity()
                ->performedOn($user)
                ->causedBy($user)
                ->log("Logged in successfully: ({$ip} - {$browser}) - {$user->first_name} {$user->last_name} (ID: {$user->id})");
    
            return redirect()
                ->route($user->getRoleNames()->first() . '.dashboard')
                ->with('success', 'Logged in successfully!');
        } catch (AuthenticationException $e) {
            activity()
                ->log("Failed login attempt: ({$ip} - {$browser})");
    
            return redirect()
                ->route('login')
                ->with('failed', 'Invalid login credentials.');
        }
    }

    public function logout()
    {
        $user = Auth::user();
        
        $this->authServices->logout(); 
        
        activity()
            ->performedOn($user)
            ->causedBy($user)
            ->log('Successfully logged out');

        return redirect()
            ->route('login')
            ->with('success', 'You have successfully logged out!');
    }
}