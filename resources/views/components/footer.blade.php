<footer class="border-t border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-950/80 backdrop-blur-sm mt-12">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    @php
                        $site_logo_light = \App\Models\SiteSetting::get('site_logo');
                        $site_logo_dark = \App\Models\SiteSetting::get('site_logo_dark');
                    @endphp
                    
                    @if ($site_logo_light || $site_logo_dark)
                        @if ($site_logo_light)
                            <img src="{{ asset($site_logo_light) }}" alt="T-email.org Logo" class="h-8 w-auto dark:hidden"> 
                        @endif
                        @if ($site_logo_dark)
                             <img src="{{ asset($site_logo_dark) }}" alt="T-email.org Logo (Dark)" class="h-8 w-auto hidden dark:block">
                        @endif
                    @else
                        <div class="h-8 w-8 rounded-full bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">T</span>
                        </div>
                        <span class="font-medium text-lg bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 text-transparent bg-clip-text">
                            T-Email.org
                        </span>
                    @endif
                </div>
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    {!! \App\Models\SiteSetting::get('footer_about', 'Secure, temporary email addresses for your privacy needs. No registration required.') !!}
                </p>
                <div class="flex space-x-3">
                    <a href="https://github.com" target="_blank" rel="noopener" class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-8 w-8 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 dark:stroke-white"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/></svg>
                        <span class="sr-only">GitHub</span>
                    </a>
                    <a href="https://twitter.com" target="_blank" rel="noopener" class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-8 w-8 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 dark:stroke-white"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                        <span class="sr-only">Twitter</span>
                    </a>
                    <a href="https://linkedin.com" target="_blank" rel="noopener" class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-8 w-8 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 dark:stroke-white"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                        <span class="sr-only">LinkedIn</span>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="font-medium mb-4 text-sm">Services</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('home') }}" class="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            Temporary Email
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('features') }}" class="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            Email Forwarding
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('features') }}" class="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            Premium Features
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('api.docs') }}" class="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            API Access
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-medium mb-4 text-sm">Support</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('faq') }}" class="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            Help Center
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('faq') }}" class="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            Report Abuse
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-medium mb-4 text-sm">Legal</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('page.show', 'terms-of-service') }}" class="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            Terms of Service
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.show', 'privacy-policy') }}" class="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.show', 'cookie-policy') }}" class="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            Cookie Policy
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.show', 'gdpr-compliance') }}" class="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            GDPR Compliance
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-slate-200 dark:border-slate-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-xs text-slate-500 dark:text-slate-400">{!! \App\Models\SiteSetting::get('footer_copyright', '© ' . date('Y') . ' TempMail. All rights reserved.') !!}</p>

            <div class="flex items-center space-x-4 mt-4 md:mt-0">
                <div class="flex items-center text-xs text-slate-500 dark:text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 dark:stroke-white"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    <span>{!! \App\Models\SiteSetting::get('footer_contact_email', 'contact@tempmail.io') !!}</span>
                </div>
                <div class="flex items-center text-xs text-slate-500 dark:text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 dark:stroke-white"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                    <span>Secure & Private</span>
                </div>
                <div class="flex items-center text-xs text-slate-500 dark:text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 dark:stroke-white"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                    <span>24/7 Support</span>
                </div>
            </div>
        </div>
    </div>
</footer>
