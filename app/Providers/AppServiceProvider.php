<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register blade components
        Blade::componentNamespace('App\\View\\Components', 'app');
        
        // Register anonymous components
        Blade::component('layouts.admin', 'admin-layout');
    }
}
