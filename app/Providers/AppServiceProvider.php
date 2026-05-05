<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        if (Schema::hasTable('settings')) {
            $settings = Setting::pluck('value', 'key')->toArray();
            View::share('setting', $settings);
        }
        // if (Schema::hasTable('services')) {
        //     View::composer('*', function ($view) {
        //         $view->with('services', Service::where('status', 1)->get());
        //     });
        // }
    }
}
