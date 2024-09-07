<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Midtrans related
Route::get('/midtrans/success', [App\Http\Controllers\API\MidtransController::class, 'success']);
Route::get('/midtrans/unfinish', [App\Http\Controllers\API\MidtransController::class, 'unfinish']);
Route::get('/midtrans/failed', [App\Http\Controllers\API\MidtransController::class, 'failed']);
