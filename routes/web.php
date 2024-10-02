<?php

use App\Http\Controllers\NewsController;
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
        Route::get('{type}', [ProfilesController::class, 'profiles'])->name('profiles');

        Route::put('{id?}', action: [ProfilesController::class, 'update'])->name('profiles.update');

        Route::post('{type}', action: [ProfilesController::class, 'store'])->name(name: 'profiles.store');

        Route::delete('{id}', action: [ProfilesController::class, 'destroy'])->name('profiles.destroy');
    });

    Route::prefix('news')->group(function () {
        Route::get('', [NewsController::class, 'index'])->name('news');
        Route::post('', [NewsController::class, 'store'])->name('news.store');
        Route::put('{id?}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('{id}', action: [NewsController::class, 'destroy'])->name('news.destroy');
    });
});

Route::get('/test', function () {
    return view('test');
});
