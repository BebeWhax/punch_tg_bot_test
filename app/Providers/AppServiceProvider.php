<?php

namespace App\Providers;

use App\Http\Controllers\TelegramController;
use Illuminate\Support\ServiceProvider;
use App\Services\TelegramApiService;
use App\Services\TelegramService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TelegramApiService::class, fn () => new TelegramApiService());
        $this->app->bind(TelegramService::class, fn () => new TelegramApiService());
        $this->app->bind(TelegramController::class, fn () => new TelegramController());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
