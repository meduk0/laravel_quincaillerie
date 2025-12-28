<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Source - https://stackoverflow.com/a
// Posted by Oscar Gallardo
// Retrieved 2025-12-20, License - CC BY-SA 4.0

use Illuminate\Support\Facades\URL;

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
        //URL::forceScheme('https');
    }
}
