<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BeforeLoginController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\KlasifikasiCategoryController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\KlasifikasiImageController;
use App\Http\Controllers\KlasifikasiInformationController;
use App\Http\Controllers\PpkdController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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

Route::get('artikel', [ArticleController::class, 'index'])->name('article');

Route::get('klasifikasi', [KlasifikasiController::class, 'index'])->name('klasifikasi');

Route::get('ppkd', [PpkdController::class, 'index'])->name('ppkd');

Route::get('surveys', [SurveyController::class, 'index'])->name('survey');
Route::get('surveys/{slug}/{time?}', [SurveyController::class, 'show'])->name('survey.detail');

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::prefix('berita')->group(function () {
        Route::controller(NewsController::class)->group(function () {
            Route::get('','index')->name('news');
            Route::get('create','create')->name('news.create');
            Route::get('{id}','edit')->name('news.edit');
            Route::post('','store')->name('news.store');
            Route::put('{id?}','update')->name('news.update');
            Route::delete('{id}', action:'destroy')->name('news.destroy');
        });

        Route::prefix('kategori')->middleware('role:super admin')->group(function () {
            Route::controller(NewsCategoryController::class)->group(function () {
                Route::get('list', 'index')->name('news.category');
                Route::post('', 'store')->name('news.category.store');
                Route::put('{id?}', 'update')->name('news.category.update');
                Route::delete('{id}', 'destroy')->name('news.category.destroy');
            });
        });
    });

    Route::prefix('artikel')->group(function () {
        Route::controller(ArticleController::class)->group(function () {
            Route::get('create','create')->name('article.create');
            Route::get('{id}','edit')->name('article.edit');
            Route::post('','store')->name('article.store');
            Route::put('{id?}','update')->name('article.update');
            Route::delete('{id}', action:'destroy')->name('article.destroy');
        });

        Route::prefix('kategori')->middleware('role:super admin')->group(function (): void {
            Route::controller(ArticleCategoryController::class)->group(function () {
                Route::get('list', 'index')->name('article.category');
                Route::post('', 'store')->name('article.category.store');
                Route::put('{id?}', 'update')->name('article.category.update');
                Route::delete('{id}', 'destroy')->name('article.category.destroy');
            });
        });
    });

    Route::prefix('galleries')->group(function () {
        Route::controller(GalleryController::class)->group(function() {
            Route::get('create', 'create')->name('gallery.create');
            Route::post('', 'store')->name('gallery.store');
            Route::put('{id?}', 'update')->name('gallery.update');
            Route::delete('{id}', action: 'destroy')->name('gallery.destroy');
        });

        Route::prefix('kategori')->middleware('role:super admin')->group(function () {
            Route::controller(GalleryCategoryController::class)->group(function () {
                Route::get('', 'index')->name('gallery.category');
                Route::post('', 'store')->name('gallery.category.store');
                Route::put('{id?}', 'update')->name('gallery.category.update');
                Route::delete('{id}', 'destroy')->name('gallery.category.destroy');
            });
        });

        Route::prefix('images')->group(function () {
            Route::controller(GalleryImageController::class,)->group(function () {
                Route::get('{id}', 'index')->name('gallery.images');
                Route::post('{id}', 'store')->name('gallery.images.post');
                Route::put('{id?}', 'update')->name('gallery.images.update');
                Route::delete('{id?}', 'destroy')->name('gallery.images.destroy');
            });
        });
    });

    Route::prefix('agenda')->group(function () {
        Route::controller(AgendaController::class)->group(function () {
            Route::get('','index')->name('agenda');
            Route::get('create','create')->name('agenda.create');
            Route::get('edit/{id}','edit')->name('agenda.edit');
            Route::post('','store')->name('agenda.store');
            Route::put('{id?}','update')->name('agenda.update');
            Route::delete('{id}', action:'destroy')->name('agenda.destroy');
        });

        Route::prefix('kategori')->middleware('role:super admin')->group(function () {
            Route::controller(AgendaCategoryController::class)->group(function () {
                Route::get('', 'index')->name('agenda.category');
                Route::post('', 'store')->name('agenda.category.store');
                Route::put('{id?}', 'update')->name('agenda.category.update');
                Route::delete('{id}', 'destroy')->name('agenda.category.destroy');
            });
        });
    });

    Route::prefix('klasifikasi')->group(function () {
        Route::controller(KlasifikasiController::class)->group(function () {
            Route::get('create','create')->name('klasifikasi.create');
            Route::post('','store')->name('klasifikasi.store');
            Route::put('{id?}','update')->name('klasifikasi.update');
            Route::delete('{id}', action:'destroy')->name('klasifikasi.destroy');
        });

        Route::prefix('kategori')->group(function () {
            Route::controller(KlasifikasiCategoryController::class)->group(function () {
                Route::get('', 'index')->name('klasifikasi.category');
                Route::post('', 'store')->name('klasifikasi.category.store');
                Route::put('{id?}', 'update')->name('klasifikasi.category.update');
                Route::delete('{id}', 'destroy')->name('klasifikasi.category.destroy');
            });
        });

        Route::prefix('images')->group(function () {
            Route::controller(KlasifikasiImageController::class,)->group(function () {
                Route::get('{id}', 'index')->name('klasifikasi.images');
                Route::post('{id}', 'store')->name('klasifikasi.images.post');
                Route::put('{id?}', 'update')->name('klasifikasi.images.update');
                Route::delete('{id?}', 'destroy')->name('klasifikasi.images.destroy');
            });
        });

        Route::prefix('informations')->group(function () {
            Route::controller(KlasifikasiInformationController::class,)->group(function () {
                Route::get('{id}', 'index')->name('klasifikasi.informations');
                Route::post('{id}', 'store')->name('klasifikasi.informations.post');
                Route::put('{id?}', 'update')->name('klasifikasi.informations.update');
                Route::delete('{id?}', 'destroy')->name('klasifikasi.informations.destroy');
            });
        });
    });

    Route::middleware('role:super admin')->group(function () {
        Route::get('contact_us', [ContactUSController::class, 'index'])->name('contact_us');

        Route::prefix('ppid')->group(function () {
            Route::controller(PPIDController::class)->group(function () {
                Route::post('', 'store')->name('ppid.store');
                Route::put('{id?}', 'update')->name('ppid.update');
                Route::delete('{id}', 'destroy')->name('ppid.destroy');
            });

            Route::prefix('category')->group(function () {
                Route::controller(PPIDCategoryController::class)->group(function () {
                    Route::get('list',  'index')->name('ppid.category');
                    Route::post('',  'store')->name('ppid.category.store');
                    Route::put('{id?}',  'update')->name('ppid.category.update');
                    Route::delete('{id}',  'destroy')->name('ppid.category.destroy');
                });
            });

            Route::prefix('files')->group(function () {
                Route::controller(PpidFileController::class)->group(function () {
                    Route::get('list/{id}', 'index')->name('ppid.files');
                    Route::post('', 'store')->name('ppid.files.store');
                    Route::put('{id?}', 'update')->name('ppid.files.update');
                    Route::delete('{id}', 'destroy')->name('ppid.files.destroy');
                });
            });
        });

        Route::prefix('surveys')->group(function () {
            Route::controller(SurveyController::class)->group(function() {
                Route::post('', 'store')->name('survey.store');
                Route::put('{id?}', 'update')->name('survey.update');
                Route::delete('{id}', 'destroy')->name('survey.destroy');
            });
        });

        Route::controller(ProfilesController::class)->group(function () {
            Route::prefix('profil')->group(function () {
                Route::put('{id?}', action: 'update')->name('profiles.update');
                Route::post('{type}', action: 'store')->name(name: 'profiles.store');
                Route::delete('{id}', action: 'destroy')->name('profiles.destroy');
            });

            Route::prefix('settings')->group(function () {
                Route::get('{type}', 'settings')->name('settings');
                Route::get('edit/{id}/{type}', 'editSettings')->name('settings.edit');
                Route::put('{id?}/{type?}', action: 'updateWithType')->name('settings.update');
            });
        });

        Route::prefix('pengguna')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('pengguna');
        });

        Route::prefix('departement')->group(function () {
            Route::controller(DepartementController::class)->group(function () {
                Route::get('', 'index')->name('departement');
                Route::post('', 'store')->name('departement.store');
                Route::put('{id?}', 'update')->name('departement.update');
                Route::delete('{id}', 'destroy')->name('departement.destroy');
            });
        });

        Route::prefix('ppkd')->group(function () {
            Route::controller(PpkdController::class)->group(function () {
                Route::get('create','create')->name('ppkd.create');
                Route::get('edit/{id}','edit')->name('ppkd.edit');
                Route::post('', 'store')->name('ppkd.store');
                Route::put('{id?}', 'update')->name('ppkd.update');
                Route::delete('{id}', 'destroy')->name('ppkd.destroy');
            });
        });
    });
});

Route::get('/test', function () {
    return view('test');
});

Route::middleware('guest')->group(function () {
    Route::get('', [BeforeLoginController::class, 'beranda'])->name('beranda');
    Route::prefix('museum')->group(function () {
        Route::get('', [BeforeLoginController::class, 'museum'])->name('museum');
    });

    Route::get('kontak', [BeforeLoginController::class, 'kontak'])->name('kontak');

    Route::prefix('informasi')->group(function () {
        Route::prefix('kegiatan-disbud')->group(function () {
            Route::get('', [NewsController::class, 'index'])->name('public.news');
            Route::post('', [NewsController::class, 'search'])->name('public.news.search');
        });

        Route::prefix('event-budaya')->group(function () {
            Route::get('', [AgendaController::class, 'festival'])->name('public.agenda');
            Route::post('', [AgendaController::class, 'search'])->name('public.agenda.search');
        });
    });

    Route::get('gallery/{slug}/{time?}', [GalleryController::class, 'show'])->name('gallery.detail');

    Route::get('news/{slug}/{time?}', [NewsController::class, 'show'])->name('news.detail');

    Route::get('artikel/{slug}/{time?}', [ArticleController::class, 'show'])->name('article.detail');
    Route::post('artikel', [ArticleController::class, 'search'])->name('article.search');

    Route::get('agenda/{slug}/{time?}', [AgendaController::class, 'show'])->name('agenda.detail');

    Route::get('klasifikasi/{slug}/{time?}', [KlasifikasiController::class, 'show'])->name('klasifikasi.detail');

    Route::post('contact_us', [ContactUSController::class, 'store'])->name('contact_us.store');
});
