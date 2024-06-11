<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class LocaleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            // dd(app()->getLocale());
            $locale = app()->getLocale();
            if ($locale !== null) {
                $view->with('locale', $locale);
            }else{
                $view->with('locale', 'en');
            }
        });
    }
}
