<?php

use App\Http\Controllers\AiQuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Teams\TeamInvitationController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;

Route::inertia('/welcome', 'welcome')->name('home');

Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');
    });

Route::middleware(['auth'])->group(function () {
    Route::post('invitations/{invitation}/accept', [TeamInvitationController::class, 'accept'])->name('invitations.accept');
    Route::delete('invitations/{invitation}', [TeamInvitationController::class, 'decline'])->name('invitations.decline');
});
Route::get('/', function () {
    return view('main.index'); // نام فایل: main/index.blade.php
});
Route::get('/main', function () {
    return view('main.main'); // نام فایل: main/index.blade.php
});
Route::get('/main/form', function () {
    return view('main.form'); // نام فایل: main/index.blade.php
})->name('form');
Route::get('/main/editor', function () {
    return view('main.editor'); // نام فایل: main/index.blade.php
})->name('editor');
Route::post('/generatepdf', [App\Http\Controllers\ExamController::class, 'generatePdf'])
    ->name('generate.pdf');
Route::post('/api/generate-questions', [AiQuestionController::class, 'generate'])
    ->name('ai.generate');

require __DIR__.'/settings.php';
