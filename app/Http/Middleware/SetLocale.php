<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Get default language from site settings
        $defaultLanguage = \App\Models\SiteSetting::get('default_language', 'en');
        
        // Get locale from URL parameter, session, or site setting default
        $locale = $request->get('lang') ?? Session::get('locale') ?? $defaultLanguage;
        
        // Validate locale
        if (!in_array($locale, ['en', 'tr'])) {
            $locale = $defaultLanguage; // Use site setting default
        }
        
        // Set application locale
        App::setLocale($locale);
        
        // Store in session for future requests
        Session::put('locale', $locale);
        
        return $next($request);
    }
}
