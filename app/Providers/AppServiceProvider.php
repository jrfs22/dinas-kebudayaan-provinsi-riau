<?php

namespace App\Providers;

use App\Models\ContentModel;
use App\Models\PPIDCategoryModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            if (!in_array(Route::currentRouteName(), ['login'])) {
                $ppid_categories = Cache::rememberForever('ppid_categories', function () {
                    return PPIDCategoryModel::all();
                });

                $aboutDescription = Cache::rememberForever('tentang-kami-deskripsi', function () {
                    return ContentModel::where('category', 'tentang-kami-deskripsi')->first()->content;
                });

                $telepon = Cache::rememberForever('telepon', function () {
                    return ContentModel::where('category', 'telepon')->first();
                });

                $email = Cache::rememberForever('email', function () {
                    return ContentModel::where('category', 'email')->first();
                });

                $view->with([
                    'ppid_categories' => $ppid_categories,
                    'aboutDescription' => $aboutDescription,
                    'telepon' => $telepon,
                    'email' => $email,
                ]);
            }

            // if (in_array(Route::currentRouteName(), ['beranda'])) {
            //     $heroDescription = Cache::rememberForever('hero-deskripsi', function () {
            //         return ContentModel::where('category', 'hero-deskripsi')->first()->content;
            //     });

            //     $view->with([
            //         'heroDescription', $heroDescription
            //     ]);
            // }
        });
    }
}
