<?php

use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsCategoryController;
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

    Route::prefix('berita')->group(function () {
        Route::get('', [NewsController::class, 'index'])->name('news');
        Route::get('create', [NewsController::class, 'create'])->name('news.create');
        Route::get('{id}', [NewsController::class, 'edit'])->name('news.edit');
        Route::post('', [NewsController::class, 'store'])->name('news.store');
        Route::put('{id?}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('{id}', action: [NewsController::class, 'destroy'])->name('news.destroy');

        Route::prefix('kategori')->group(function () {
            Route::get('list', [NewsCategoryController::class, 'index'])->name('news.category');

            Route::post('', [NewsCategoryController::class, 'store'])->name('news.category.store');

            Route::put('{id?}', [NewsCategoryController::class, 'update'])->name('news.category.update');

            Route::delete('{id}', [NewsCategoryController::class, 'destroy'])->name('news.category.destroy');
        });
    });

    Route::prefix('galleries')->group(function () {
        Route::get('', [GalleryController::class, 'index'])->name('gallery');
        Route::get('create', [GalleryController::class, 'create'])->name('gallery.create');
        
        Route::post('', [GalleryController::class, 'store'])->name('gallery.store');
        Route::put('{id?}', [GalleryController::class, 'update'])->name('gallery.update');
        Route::delete('{id}', action: [GalleryController::class, 'destroy'])->name('gallery.destroy');

        Route::prefix('kategori')->group(function () {
            Route::get('', [GalleryCategoryController::class, 'index'])->name('gallery.category');

            Route::post('', [GalleryCategoryController::class, 'store'])->name('gallery.category.store');

            Route::put('{id?}', [GalleryCategoryController::class, 'update'])->name('gallery.category.update');

            Route::delete('{id}', [GalleryCategoryController::class, 'destroy'])->name('gallery.category.destroy');
        });
    });
});

Route::get('/test', function () {
    return view('test');
});
