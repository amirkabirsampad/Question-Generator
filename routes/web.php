<?php

use App\Http\Controllers\AiQuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Teams\TeamInvitationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ── صفحه اصلی ─────────────────────────────────────────────
Route::get('/', function () {
    return view('main.index');
});

Route::get('/main', function () {
    return view('main.main');
});

Route::get('/main/form', function () {
    return view('main.form');
})->name('form');

Route::get('/main/editor', function () {
    return view('main.editor');
})->name('editor');

// ── Auth ───────────────────────────────────────────────────
Route::get('/auth',      [AuthController::class, 'showAuth'])->name('auth')->middleware('guest');
Route::post('/login',    [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/logout',   [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ── ریدایرکت /dashboard به تیم ────────────────────────────
Route::get('/dashboard', function () {
    $user = auth()->user()->fresh();
    $team = \App\Models\Team::find($user->current_team_id);

    if (! $team) {
        return redirect()->route('auth');
    }

    return redirect()->route('dashboard', ['current_team' => $team->slug]);
})->middleware('auth')->name('dashboard.redirect');

// ── داشبورد اصلی (Blade) ───────────────────────────────────
Route::get('/{current_team}/dashboard', function (Request $request) {
    $team = \App\Models\Team::where('slug', $request->route('current_team'))
        ->firstOrFail();

    if (! $request->user()->belongsToTeam($team)) {
        abort(403);
    }

    // ست کردن current_team اگه فرق داشت
    if ($request->user()->current_team_id !== $team->id) {
        $request->user()->forceFill(['current_team_id' => $team->id])->save();
    }

    return view('main/dashboard', ['team' => $team]);
})->middleware(['auth'])->name('dashboard');

// ── دعوت‌نامه‌های تیم ─────────────────────────────────────
Route::middleware(['auth'])->group(function () {
    Route::post('invitations/{invitation}/accept', [TeamInvitationController::class, 'accept'])
        ->name('invitations.accept');
    Route::delete('invitations/{invitation}', [TeamInvitationController::class, 'decline'])
        ->name('invitations.decline');
});

// ── API ───────────────────────────────────────────────────
Route::post('/generatepdf', [App\Http\Controllers\ExamController::class, 'generatePdf'])
    ->name('generate.pdf');

Route::post('/api/generate-questions', [AiQuestionController::class, 'generate'])
    ->name('ai.generate');

require __DIR__.'/settings.php';
