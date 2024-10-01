<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\AuthenticationController;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticationController::class, 'index'])->name('login');
    Route::post('signin', [AuthenticationController::class, 'signin'])->name('signin');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::prefix('profiles')->group(function () {
        Route::get('visi-misi', [ProfilesController::class, 'visiMisi'])->name('visi-misi');
    });
});

Route::get('/test', function () {
    return view('test');
});
