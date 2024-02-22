<?php

namespace App\Providers;

use App\Services\Interfaces\LoginServiceInterface;
use App\Services\Interfaces\MessageServiceInterface;
use App\Services\LoginService;
use App\Services\MessageService;
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
        app()->bind(LoginServiceInterface::class, LoginService::class);
        app()->bind(MessageServiceInterface::class, MessageService::class);
    }
}
