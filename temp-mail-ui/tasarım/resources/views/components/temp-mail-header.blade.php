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
                @foreach(['Home', 'Features', 'Pricing', 'FAQ', 'Contact'] as $item)
                    <a href="#" class="text-sm font-medium text-slate-600 hover:text-emerald-600 dark:text-slate-300 dark:hover:text-emerald-400 transition-colors relative group">
                        {{ $item }}
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-emerald-500 group-hover:w-full transition-all duration-300"></span>
                    </a>
                @endforeach
            </nav>

            <div class="flex items-center gap-2 animate-fadeIn">
                <button id="theme-toggle" type="button" class="rounded-full h-9 w-9 hover:bg-slate-100 dark:hover:bg-slate-800 inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="sun-icon text-amber-500"><circle cx="12" cy="12" r="4"></circle><path d="M12 2v2"></path><path d="M12 20v2"></path><path d="m4.93 4.93 1.41 1.41"></path><path d="m17.66 17.66 1.41 1.41"></path><path d="M2 12h2"></path><path d="M20 12h2"></path><path d="m6.34 17.66-1.41 1.41"></path><path d="m19.07 4.93-1.41 1.41"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="moon-icon hidden text-slate-300"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path></svg>
                    <span class="sr-only">Toggle theme</span>
                </button>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" type="button" class="md:hidden h-9 w-9 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
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
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            <span class="sr-only">Close menu</span>
        </button>
    </div>
    <nav class="flex flex-col gap-4 mt-4">
        @foreach(['Home', 'Features', 'Pricing', 'FAQ', 'Contact'] as $item)
            <a href="#" class="text-base font-medium px-3 py-2 rounded-md hover:bg-emerald-50 hover:text-emerald-600 dark:hover:bg-emerald-950 dark:hover:text-emerald-400 transition-colors mx-4">
                {{ $item }}
            </a>
        @endforeach
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
        const savedTheme = localStorage.getItem('theme') || 'system';
        
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
            const newTheme = html.classList.contains('dark') ? 'light' : 'dark';
            localStorage.setItem('theme', newTheme);
            updateTheme();
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
