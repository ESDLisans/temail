<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\MenuItem;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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

        // Share menu items with the header component
        View::composer('components.temp-mail-header', function ($view) {
            $view->with('menuItems', MenuItem::where('is_active', true)->orderBy('order')->with('page')->get());
        });
        
        // Custom validation rule for current password
        Validator::extend('current_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, auth()->user()->password);
        }, 'The current password is incorrect.');
    }
}
