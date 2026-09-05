<?php

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
});
Route::get('/main/editor', function () {
    return view('main.editor'); // نام فایل: main/index.blade.php
});

Route::get('/proxy-pdf', function (Request $request) {

    $url = $request->query('url');

    if (! $url) {
        return response()->json(['error' => 'url is required'], 400);
    }

    $parsed = parse_url($url);
    $host = $parsed['host'] ?? '';

    if (! in_array($host, ['chap.sch.ir', 'www.chap.sch.ir'])) {
        return response()->json(['error' => 'host not allowed'], 403);
    }

    try {

        $pdfResponse = Http::withoutVerifying()   // ← حل مشکل SSL
            ->timeout(120)          // ← تایم‌اوت بیشتر
            ->withHeaders([
                'User-Agent' => 'Mozilla/5.0',  // ← بعضی سرورها بدون این بلاک میکنن
                'Accept' => 'application/pdf',
            ])
            ->get($url);

        if (! $pdfResponse->successful()) {
            return response()->json([
                'error' => 'chap.sch.ir returned error',
                'status' => $pdfResponse->status(),
            ], 502);
        }

        return response($pdfResponse->body(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Length' => strlen($pdfResponse->body()),
            'Access-Control-Allow-Origin' => '*',
            'Cache-Control' => 'public, max-age=86400',
        ]);

    } catch (Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => config('app.debug') ? $e->getTraceAsString() : null,
        ], 500);
    }
});
// routes/web.php — موقتی فقط برای تست

Route::get('/test-proxy', function () {
    $url = 'http://chap.sch.ir/sites/default/files/lbooks/1404-1405/8/C101.pdf';

    try {
        $response = Http::withoutVerifying()
            ->timeout(120)
            ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
            ->get($url);

        return response()->json([
            'status' => $response->status(),
            'content_type' => $response->header('Content-Type'),
            'content_length' => strlen($response->body()),
            'ok' => $response->successful(),
        ]);

    } catch (Exception $e) {
        return response()->json([
            'exception' => get_class($e),
            'message' => $e->getMessage(),
        ], 500);
    }
});

require __DIR__.'/settings.php';
