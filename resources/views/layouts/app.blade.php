<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', \App\Models\SiteSetting::get('site_title', 'TempMail - Free Temporary Disposable Email Service'))</title>
    <meta name="description" content="@yield('meta_description', \App\Models\SiteSetting::get('site_description', 'Create temporary, disposable email addresses to protect your privacy from spam and unwanted emails. Our free service auto-deletes emails after 10 hours.'))">
    <meta name="keywords" content="{{ \App\Models\SiteSetting::get('site_keywords', 'temporary email, disposable email, temp mail, fake email, anonymous email, email privacy, anti-spam') }}">
    <meta name="author" content="TempMail">
    <meta name="robots" content="{{ \App\Models\SiteSetting::get('meta_robots', 'index, follow') }}">
    
    @if(\App\Models\SiteSetting::get('google_search_console_verification'))
    <meta name="google-site-verification" content="{{ \App\Models\SiteSetting::get('google_search_console_verification') }}">
    @endif
    
    @if(\App\Models\SiteSetting::get('bing_webmaster_verification'))
    <meta name="msvalidate.01" content="{{ \App\Models\SiteSetting::get('bing_webmaster_verification') }}">
    @endif
    
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
    @if(\App\Models\SiteSetting::get('canonical_urls_enabled', '1'))
    <link rel="canonical" href="@yield('canonical', url()->current())">
    @endif
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ \App\Models\SiteSetting::get('site_favicon') ? asset(\App\Models\SiteSetting::get('site_favicon')) : asset('favicon.svg?v=2') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.svg?v=2') }}">
    <meta name="msapplication-TileColor" content="#059669">
    <meta name="theme-color" content="#059669">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        [x-cloak] { display: none !important; }
    </style>

    <!-- Google Tag Manager -->
    @if(\App\Models\SiteSetting::get('google_tag_manager_id'))
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ \App\Models\SiteSetting::get('google_tag_manager_id') }}');</script>
    @endif
    
    <!-- Google Analytics -->
    @if(\App\Models\SiteSetting::get('google_analytics_id'))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ \App\Models\SiteSetting::get('google_analytics_id') }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ \App\Models\SiteSetting::get('google_analytics_id') }}');
    </script>
    @endif

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    <!-- Google Tag Manager (noscript) -->
    @if(\App\Models\SiteSetting::get('google_tag_manager_id'))
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ \App\Models\SiteSetting::get('google_tag_manager_id') }}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif
    
    <!-- Header Ad -->
    @php
        $headerAd = \App\Models\AdSlot::where('position', 'header')->where('is_active', true)->first();
    @endphp
    @if($headerAd)
    <div class="w-full bg-white dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700">
        <div class="container mx-auto px-4 py-2 text-center">
            {!! $headerAd->ad_code !!}
        </div>
    </div>
    @endif

    <div id="app" class="min-h-screen flex flex-col bg-gradient-to-br from-slate-50 via-slate-50 to-emerald-50 dark:from-slate-950 dark:via-slate-950 dark:to-slate-900">
        @include('components.temp-mail-header')
        
        @yield('content')
        
        @include('components.footer')
        
        <!-- Footer Ad -->
        @php
            $footerAd = \App\Models\AdSlot::where('position', 'footer')->where('is_active', true)->first();
        @endphp
        @if($footerAd)
        <div class="w-full bg-white dark:bg-slate-800 border-t border-slate-200 dark:border-slate-700">
            <div class="container mx-auto px-4 py-4 text-center">
                {!! $footerAd->ad_code !!}
            </div>
        </div>
        @endif
    </div>
    
    <!-- Popup Ad -->
    @php
        $popupAd = \App\Models\AdSlot::where('position', 'popup')->where('is_active', true)->first();
    @endphp
    @if($popupAd)
    {!! $popupAd->ad_code !!}
    @endif
    
    <!-- Sticky Bottom Ad -->
    @php
        $stickyAd = \App\Models\AdSlot::where('position', 'sticky_bottom')->where('is_active', true)->first();
    @endphp
    @if($stickyAd)
    {!! $stickyAd->ad_code !!}
    @endif
    
    <!-- Exit Intent Popup -->
    @php
        $exitIntentAd = \App\Models\AdSlot::where('position', 'exit_intent')->where('is_active', true)->first();
    @endphp
    @if($exitIntentAd)
    {!! $exitIntentAd->ad_code !!}
    @endif
    
    <!-- Floating Action Button Ad -->
    @php
        $floatingAd = \App\Models\AdSlot::where('position', 'floating_button')->where('is_active', true)->first();
    @endphp
    @if($floatingAd)
    {!! $floatingAd->ad_code !!}
    @endif
    
    <!-- Structured Data -->
    @if(\App\Models\SiteSetting::get('structured_data_enabled', '1'))
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebApplication",
        "name": "{{ \App\Models\SiteSetting::get('site_title', 'TempMail') }}",
        "description": "{{ \App\Models\SiteSetting::get('site_description', 'Create temporary, disposable email addresses to protect your privacy from spam and unwanted emails.') }}",
        "url": "{{ url('/') }}",
        "applicationCategory": "UtilityApplication",
        "operatingSystem": "Web",
        "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "USD"
        },
        "featureList": [
            "Temporary Email Generation",
            "Email Privacy Protection", 
            "Spam Protection",
            "Anonymous Email Service",
            "Auto-Delete Emails"
        ],
        "publisher": {
            "@type": "Organization",
            "name": "{{ \App\Models\SiteSetting::get('site_title', 'TempMail') }}",
            "url": "{{ url('/') }}"
        }
    }
    </script>
    @endif

    <!-- Scripts -->
    @stack('scripts')
    
    <!-- Popup Ads JavaScript -->
    <script>
        // Timed Popup Functions
        function showTimedPopup() {
            const popup = document.getElementById('timed-popup');
            if (popup && !localStorage.getItem('popup_shown_today')) {
                popup.style.display = 'flex';
                // Set flag to show popup only once per day
                localStorage.setItem('popup_shown_today', new Date().toDateString());
            }
        }
        
        function closeTimedPopup() {
            const popup = document.getElementById('timed-popup');
            if (popup) {
                popup.style.display = 'none';
            }
        }
        
        // Exit Intent Popup Functions
        let exitIntentShown = false;
        
        function showExitPopup() {
            const popup = document.getElementById('exit-popup');
            if (popup && !exitIntentShown && !localStorage.getItem('exit_popup_shown_today')) {
                popup.style.display = 'flex';
                exitIntentShown = true;
                // Set flag to show exit popup only once per day
                localStorage.setItem('exit_popup_shown_today', new Date().toDateString());
            }
        }
        
        function closeExitPopup() {
            const popup = document.getElementById('exit-popup');
            if (popup) {
                popup.style.display = 'none';
            }
        }
        
        // Event Listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Show timed popup after 30 seconds (can be adjusted)
            setTimeout(showTimedPopup, 30000);
            
            // Exit intent detection
            document.addEventListener('mouseleave', function(e) {
                if (e.clientY <= 0) {
                    showExitPopup();
                }
            });
            
            // Mobile exit intent (when user tries to go back)
            let startY = 0;
            document.addEventListener('touchstart', function(e) {
                startY = e.touches[0].clientY;
            });
            
            document.addEventListener('touchmove', function(e) {
                if (startY < 50 && e.touches[0].clientY > startY + 50) {
                    showExitPopup();
                }
            });
            
            // Close popups with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeTimedPopup();
                    closeExitPopup();
                }
            });
        });
        
        // Reset popup flags daily
        function resetPopupFlags() {
            const today = new Date().toDateString();
            if (localStorage.getItem('popup_shown_today') !== today) {
                localStorage.removeItem('popup_shown_today');
            }
            if (localStorage.getItem('exit_popup_shown_today') !== today) {
                localStorage.removeItem('exit_popup_shown_today');
            }
        }
        
        // Check and reset flags on page load
        resetPopupFlags();
    </script>
</body>
</html>
