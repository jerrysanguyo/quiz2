<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Auth\AuthenticationController,
    UserController,
    QuestionController,
    DashboardController,
    DisabilityController,
    RoleController,
    PermissionController,
    LogsController,
    QuizController,
    AnswerController,
    ScoreController,
};

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', [AuthenticationController::class, 'login'])->name('login.index');
Route::post('/login/authenticate', [AuthenticationController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');

Route::middleware(['auth'])
    ->group(function () {

        Route::middleware('role:superadmin')
            ->prefix('superadmin')
            ->name('superadmin.')
            ->group(function () {
                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
                Route::resource('question', QuestionController::class);
                Route::resource('user', UserController::class);
                Route::resource('disability', DisabilityController::class);
                Route::resource('role', RoleController::class);
                Route::resource('permission', PermissionController::class);
                Route::resource('answer', AnswerController::class);
                Route::resource('score', ScoreController::class);
                Route::post('score/store/{user}', [ScoreController::class, 'scoreStore'])->name('score.userStore');
                Route::get('log', [LogsController::class, 'index'])->name('log.index');
                Route::get('/profile-update', [UserController::class, 'profile'])->name('profile');
                Route::get('/general-knowledge', [QuizController::class, 'general'])->name('general');
                Route::get('/excel', [DashboardController::class, 'excel'])->name('excel');
                Route::get('/ppt', [DashboardController::class, 'ppt'])->name('ppt');
            });

        Route::middleware('role:admin')
            ->prefix('admin')
            ->name('admin.')
            ->group(function () {
                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
                Route::resource('question', QuestionController::class);
                Route::resource('user', UserController::class);
                Route::resource('disability', DisabilityController::class);
                Route::resource('role', RoleController::class);
                Route::resource('permission', PermissionController::class);
                Route::resource('score', ScoreController::class);
                Route::resource('answer', AnswerController::class);
                Route::post('score/store/{user}', [ScoreController::class, 'scoreStore'])->name('score.userStore');
                Route::get('/profile-update', [UserController::class, 'profile'])->name('profile');
                Route::get('/general-knowledge', [QuizController::class, 'general'])->name('general');
                Route::get('/excel', [DashboardController::class, 'excel'])->name('excel');
                Route::get('/ppt', [DashboardController::class, 'ppt'])->name('ppt');
            });

        Route::middleware('role:user')
            ->prefix('user')
            ->name('user.')
            ->group(function () {
                Route::resource('user', UserController::class)->only('update');
                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
                Route::get('/profile-update', [UserController::class, 'profile'])->name('profile');
                Route::get('/general-knowledge', [QuizController::class, 'general'])->name('general');
                Route::resource('answer', AnswerController::class);
                Route::get('/excel', [DashboardController::class, 'excel'])->name('excel');
                Route::get('/ppt', [DashboardController::class, 'ppt'])->name('ppt');
            });
    });