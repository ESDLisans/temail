<header class="border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-950/80 backdrop-blur-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2 animate-fadeIn">
                <div class="h-9 w-9 rounded-full bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center">
                    <span class="text-white font-semibold text-sm">TM</span>
                </div>
                <span class="font-medium text-lg bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 text-transparent bg-clip-text">
                    TempMail
                </span>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8 animate-fadeIn">
                <a href="{{ route('home') }}" class="text-sm font-medium text-slate-600 hover:text-emerald-600 dark:text-slate-300 dark:hover:text-emerald-400 transition-colors relative group" aria-label="Home page">
                    Home
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-emerald-500 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ url('/features') }}" class="text-sm font-medium text-slate-600 hover:text-emerald-600 dark:text-slate-300 dark:hover:text-emerald-400 transition-colors relative group" aria-label="Temporary email features">
                    Features
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-emerald-500 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ url('/faq') }}" class="text-sm font-medium text-slate-600 hover:text-emerald-600 dark:text-slate-300 dark:hover:text-emerald-400 transition-colors relative group" aria-label="Frequently asked questions">
                    FAQ
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-emerald-500 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ route('api.docs') }}" class="text-sm font-medium text-slate-600 hover:text-emerald-600 dark:text-slate-300 dark:hover:text-emerald-400 transition-colors relative group" aria-label="API Documentation">
                    API
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-emerald-500 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ url('/contact') }}" class="text-sm font-medium text-slate-600 hover:text-emerald-600 dark:text-slate-300 dark:hover:text-emerald-400 transition-colors relative group" aria-label="Contact us">
                    Contact
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-emerald-500 group-hover:w-full transition-all duration-300"></span>
                </a>
            </nav>

            <div class="flex items-center gap-2 animate-fadeIn">
                <!-- App Store & Play Store Buttons -->
                <div class="hidden md:flex items-center gap-2 mr-2">
                    <a href="#" class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 text-xs font-medium text-white bg-slate-800 hover:bg-slate-700 rounded-md transition-colors" aria-label="Download our iOS app on App Store">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 384 512" fill="currentColor">
                            <path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/>
                        </svg>
                        App Store
                    </a>
                    <a href="#" class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 text-xs font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-md transition-colors" aria-label="Download our Android app on Google Play">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                        Google Play
                    </a>
                    <a href="#" class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 text-xs font-medium text-slate-700 dark:text-white bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 border border-slate-200 dark:border-slate-700 rounded-md transition-colors" aria-label="Install our Chrome browser extension">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" x2="12" y1="8" y2="8"></line><line x1="3.95" x2="8.54" y1="6.06" y2="14"></line><line x1="10.88" x2="15.46" y1="21.94" y2="14"></line></svg>
                        Chrome Extension
                    </a>
                </div>
                
                <button id="theme-toggle" type="button" class="rounded-full h-9 w-9 hover:bg-slate-100 dark:hover:bg-slate-800 inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="sun-icon text-amber-500 dark:stroke-white"><circle cx="12" cy="12" r="4"></circle><path d="M12 2v2"></path><path d="M12 20v2"></path><path d="m4.93 4.93 1.41 1.41"></path><path d="m17.66 17.66 1.41 1.41"></path><path d="M2 12h2"></path><path d="M20 12h2"></path><path d="m6.34 17.66-1.41 1.41"></path><path d="m19.07 4.93-1.41 1.41"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="moon-icon hidden text-slate-300 dark:stroke-white"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path></svg>
                    <span class="sr-only">Toggle theme</span>
                </button>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" type="button" class="md:hidden h-9 w-9 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    <span class="sr-only">Toggle menu</span>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="fixed inset-y-0 right-0 z-50 w-[250px] sm:w-[300px] bg-white dark:bg-slate-950 border-l border-slate-200 dark:border-slate-800 shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out">
    <div class="p-4 flex justify-end">
        <button id="close-mobile-menu" class="h-8 w-8 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            <span class="sr-only">Close menu</span>
        </button>
    </div>
    <nav class="flex flex-col gap-4 mt-4">
        <a href="{{ route('home') }}" class="text-base font-medium px-3 py-2 rounded-md hover:bg-emerald-50 hover:text-emerald-600 dark:hover:bg-emerald-950 dark:hover:text-emerald-400 transition-colors mx-4" aria-label="Home page">
            Home
        </a>
        <a href="{{ url('/features') }}" class="text-base font-medium px-3 py-2 rounded-md hover:bg-emerald-50 hover:text-emerald-600 dark:hover:bg-emerald-950 dark:hover:text-emerald-400 transition-colors mx-4" aria-label="Temporary email features">
            Features
        </a>
        <a href="{{ url('/faq') }}" class="text-base font-medium px-3 py-2 rounded-md hover:bg-emerald-50 hover:text-emerald-600 dark:hover:bg-emerald-950 dark:hover:text-emerald-400 transition-colors mx-4" aria-label="Frequently asked questions">
            FAQ
        </a>
        <a href="{{ route('api.docs') }}" class="text-base font-medium px-3 py-2 rounded-md hover:bg-emerald-50 hover:text-emerald-600 dark:hover:bg-emerald-950 dark:hover:text-emerald-400 transition-colors mx-4" aria-label="API Documentation">
            API Documentation
        </a>
        <a href="{{ url('/contact') }}" class="text-base font-medium px-3 py-2 rounded-md hover:bg-emerald-50 hover:text-emerald-600 dark:hover:bg-emerald-950 dark:hover:text-emerald-400 transition-colors mx-4" aria-label="Contact us">
            Contact
        </a>
        
        <!-- Mobile App Download Section -->
        <div class="mt-4 px-4">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-3">Our Apps</p>
            <div class="flex flex-col gap-2">
                <a href="#" class="inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-white bg-slate-800 hover:bg-slate-700 rounded-md transition-colors" aria-label="Download our iOS app on App Store">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 384 512" fill="currentColor">
                        <path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/>
                    </svg>
                    Download on App Store
                </a>
                <a href="#" class="inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-md transition-colors" aria-label="Download our Android app on Google Play">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                    Get it on Google Play
                </a>
                <a href="#" class="inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-slate-700 dark:text-white bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 border border-slate-200 dark:border-slate-700 rounded-md transition-colors" aria-label="Install our Chrome browser extension">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" x2="12" y1="8" y2="8"></line><line x1="3.95" x2="8.54" y1="6.06" y2="14"></line><line x1="10.88" x2="15.46" y1="21.94" y2="14"></line></svg>
                    Install Chrome Extension
                </a>
            </div>
        </div>
    </nav>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Theme toggle
        const themeToggle = document.getElementById('theme-toggle');
        const sunIcon = themeToggle.querySelector('.sun-icon');
        const moonIcon = themeToggle.querySelector('.moon-icon');
        const html = document.documentElement;
        
        // Check for saved theme preference or use system preference
        let savedTheme = localStorage.getItem('theme') || 'system';
        
        function updateTheme() {
            if (savedTheme === 'dark' || (savedTheme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                html.classList.add('dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            } else {
                html.classList.remove('dark');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            }
        }
        
        updateTheme();
        
        themeToggle.addEventListener('click', function() {
            if (html.classList.contains('dark')) {
                savedTheme = 'light';
                html.classList.remove('dark');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            } else {
                savedTheme = 'dark';
                html.classList.add('dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            }
            localStorage.setItem('theme', savedTheme);
        });
        
        // Mobile menu
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMobileMenu = document.getElementById('close-mobile-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.remove('translate-x-full');
        });
        
        closeMobileMenu.addEventListener('click', function() {
            mobileMenu.classList.add('translate-x-full');
        });
    });
</script>
@endpush
