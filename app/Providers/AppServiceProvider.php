<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
   public function register(): void
{
    $this->app->singleton(
        \Filament\Http\Responses\Auth\Contracts\LoginResponse::class,
        \App\Http\Responses\LoginResponse::class
    );
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
