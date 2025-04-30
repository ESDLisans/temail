<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <title>{{ \App\Models\SiteSetting::get('site_title', 'TempMail - Free Temporary Disposable Email Service') }}</title>
    <meta name="description" content="{{ \App\Models\SiteSetting::get('site_description', 'Create temporary, disposable email addresses to protect your privacy from spam and unwanted emails. Our free service auto-deletes emails after 10 hours.') }}">
    <meta name="keywords" content="{{ \App\Models\SiteSetting::get('site_keywords', 'temporary email, disposable email, temp mail, fake email, anonymous email, email privacy, anti-spam') }}">
    <meta name="author" content="TempMail">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ \App\Models\SiteSetting::get('og_title', 'TempMail - Free Temporary Disposable Email Service') }}">
    <meta property="og:description" content="{{ \App\Models\SiteSetting::get('og_description', 'Create temporary, disposable email addresses to protect your privacy from spam and unwanted emails.') }}">
    <meta property="og:image" content="{{ \App\Models\SiteSetting::get('og_image') ? asset(\App\Models\SiteSetting::get('og_image')) : asset('img/tempmail-social.jpg') }}">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="{{ \App\Models\SiteSetting::get('og_title', 'TempMail - Free Temporary Disposable Email Service') }}">
    <meta property="twitter:description" content="{{ \App\Models\SiteSetting::get('og_description', 'Create temporary, disposable email addresses to protect your privacy from spam and unwanted emails.') }}">
    <meta property="twitter:image" content="{{ \App\Models\SiteSetting::get('og_image') ? asset(\App\Models\SiteSetting::get('og_image')) : asset('img/tempmail-social.jpg') }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('/') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ \App\Models\SiteSetting::get('site_favicon') ? asset(\App\Models\SiteSetting::get('site_favicon')) : asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ \App\Models\SiteSetting::get('site_favicon') ? asset(\App\Models\SiteSetting::get('site_favicon')) : asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ \App\Models\SiteSetting::get('site_apple_touch_icon') ? asset(\App\Models\SiteSetting::get('site_apple_touch_icon')) : asset('apple-touch-icon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        [x-cloak] { display: none !important; }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    <div id="app" class="min-h-screen flex flex-col bg-gradient-to-br from-slate-50 via-slate-50 to-emerald-50 dark:from-slate-950 dark:via-slate-950 dark:to-slate-900">
        @yield('content')
    </div>
    
    <!-- Scripts -->
    @stack('scripts')
</body>
</html>
