<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TempMail - Temporary Email Service</title>

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
