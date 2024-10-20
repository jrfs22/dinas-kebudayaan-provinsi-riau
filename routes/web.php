<?php

use App\Http\Controllers\BeforeLoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\SurveyQuestionController;
use App\Models\SurveyModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PPIDController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PpidFileController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ContactUSController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\PPIDCategoryController;
use App\Http\Controllers\AgendaCategoryController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\GalleryCategoryController;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticationController::class, 'index'])->name('login');
    Route::post('signin', [AuthenticationController::class, 'signin'])->name('signin');
});

Route::get('profil/{type}', [ProfilesController::class, 'profiles'])->name('profiles');

Route::get('ppid/{id}', [PPIDController::class, 'index'])->name('ppid');

Route::get('galleries', [GalleryController::class, 'index'])->name('gallery');

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::prefix('profil')->group(function () {
        Route::put('{id?}', action: [ProfilesController::class, 'update'])->name('profiles.update');

        Route::post('{type}', action: [ProfilesController::class, 'store'])->name(name: 'profiles.store');

        Route::delete('{id}', action: [ProfilesController::class, 'destroy'])->name('profiles.destroy');

        Route::get('edit/{id}', [ProfilesController::class, 'editSettings'])->name('settings.edit');
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

    Route::prefix('agenda')->group(function () {
        Route::get('', [AgendaController::class, 'index'])->name('agenda');
        Route::get('create', [AgendaController::class, 'create'])->name('agenda.create');
        Route::get('edit/{id}', [AgendaController::class, 'edit'])->name('agenda.edit');

        Route::post('', [AgendaController::class, 'store'])->name('agenda.store');
        Route::put('{id?}', [AgendaController::class, 'update'])->name('agenda.update');
        Route::delete('{id}', action: [AgendaController::class, 'destroy'])->name('agenda.destroy');

        Route::prefix('kategori')->group(function () {
            Route::get('', [AgendaCategoryController::class, 'index'])->name('agenda.category');

            Route::post('', [AgendaCategoryController::class, 'store'])->name('agenda.category.store');

            Route::put('{id?}', [AgendaCategoryController::class, 'update'])->name('agenda.category.update');

            Route::delete('{id}', [AgendaCategoryController::class, 'destroy'])->name('agenda.category.destroy');
        });
    });

    Route::resource('contact_us', ContactUSController::class)->names([
        'index' => 'contact_us',
        'store' => 'contact_us.store',
    ]);

    Route::prefix('ppid')->group(function () {
        Route::post('', [PPIDController::class, 'store'])->name('ppid.store');
        Route::put('{id?}', [PPIDController::class, 'update'])->name('ppid.update');
        Route::delete('{id}', [PPIDController::class, 'destroy'])->name('ppid.destroy');

        Route::prefix('category')->group(function () {
            Route::get('list', [PPIDCategoryController::class, 'index'])->name('ppid.category');
            Route::post('', [PPIDCategoryController::class, 'store'])->name('ppid.category.store');
            Route::put('{id?}', [PPIDCategoryController::class, 'update'])->name('ppid.category.update');
            Route::delete('{id}', [PPIDCategoryController::class, 'destroy'])->name('ppid.category.destroy');
        });

        Route::prefix('files')->group(function () {
            Route::get('list/{id}', [PpidFileController::class, 'index'])->name('ppid.files');
            Route::post('', [PpidFileController::class, 'store'])->name('ppid.files.store');
            Route::put('{id?}', [PpidFileController::class, 'update'])->name('ppid.files.update');
            Route::delete('{id}', [PpidFileController::class, 'destroy'])->name('ppid.files.destroy');
        });
    });

    Route::prefix('surveys')->group(function () {
        Route::get('', [SurveyController::class, 'index'])->name('survey');
        Route::post('', [SurveyController::class, 'store'])->name('survey.store');
        Route::put('{id?}', [SurveyController::class, 'update'])->name('survey.update');
        Route::delete('{id}', [SurveyController::class, 'destroy'])->name('survey.destroy');

        Route::prefix('questions')->group(function () {
            Route::get('{id}', [SurveyQuestionController::class, 'index'])->name('survey.questions');
        });
    });
});

Route::get('/test', function () {
    return view('test');
});

Route::middleware('guest')->group(function () {
    Route::get('', [BeforeLoginController::class, 'beranda'])->name('beranda');
    Route::get('museum', [BeforeLoginController::class, 'museum'])->name('museum');

    Route::get('kontak', [BeforeLoginController::class, 'kontak'])->name('kontak');

    Route::prefix('informasi')->group(function () {
        Route::get('event-budaya',  [AgendaController::class, 'index'])->name('public.agenda');
    });

    Route::get('news/detil/{id}', [NewsController::class, 'show'])->name('news.detail');

    Route::get('agenda/detil/{id}', [AgendaController::class, 'show'])->name('agenda.detail');
});
