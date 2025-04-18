<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('user', UserController::class);
Route::get('/login', [UserController::class, 'login'])->name('login.index');
Route::post('/login/authenticate', [UserController::class, 'authenticate'])->name('login.authenticate');