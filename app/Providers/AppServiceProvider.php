<?php

namespace App\Providers;

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

                $view->with('ppid_categories', $ppid_categories);
            }
        });
    }
}
