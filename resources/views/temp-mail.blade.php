@extends('layouts.app')

@section('content')
    <x-temp-mail-header />

    <!-- Structured data for SEO -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebApplication",
        "name": "TempMail",
        "description": "Free temporary disposable email service to protect your privacy.",
        "applicationCategory": "EmailApplication",
        "operatingSystem": "All",
        "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "USD"
        },
        "featureList": "Anonymous Email, Email Protection, Anti-Spam, Temporary Address",
        "keywords": "temporary email, disposable email, temp mail, fake email, anonymous email, email privacy"
    }
    </script>

    <div class="flex-grow">
        <!-- Top Ad Banner -->
        @if(isset($ads['header']) && !empty($ads['header']->ad_code))
            {!! $ads['header']->ad_code !!}
        @else
            <div class="hidden">
                <x-ad-banner format="horizontal" label="Top Banner" class="w-full max-w-7xl mx-auto my-4" />
            </div>
            <div class="py-6"></div>
        @endif

        <main class="container mx-auto px-4 py-4">
            <div class="flex flex-col lg:flex-row gap-4">
                <!-- Left Ad Banner -->
                <div class="hidden lg:block lg:w-[160px]">
                    @if(isset($ads['sidebar']) && !empty($ads['sidebar']->ad_code))
                        {!! $ads['sidebar']->ad_code !!}
                    @else
                        <div class="hidden">
                            <x-ad-banner format="vertical" label="Left Banner" class="sticky top-24" />
                        </div>
                    @endif
                </div>

                <!-- Main Content -->
                <div class="flex-1">
                    <div class="animate-fadeIn">
                        <div class="w-full shadow-md border-slate-200/80 dark:border-slate-800/80 overflow-hidden backdrop-blur-sm bg-white/80 dark:bg-slate-950/80 rounded-lg border">
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-emerald-400 to-teal-500"></div>
                            <div class="pb-4 p-6">
                                <h1 class="text-2xl font-medium flex items-center gap-2">
                                    <div class="p-1.5 rounded-md bg-gradient-to-br from-emerald-500 to-teal-600 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail dark:stroke-white"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                    </div>
                                    <span class="bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 text-transparent bg-clip-text">
                                        Temporary Email Service
                                    </span>
                                </h1>
                                <p class="text-sm text-slate-600 dark:text-slate-300"><br>Generate a disposable email address for temporary use</p>
                            </div>
                            <div class="px-6">
                                <div class="flex flex-col md:flex-row gap-4 mb-6">
                                    <div id="email-container" class="flex-1 p-4 bg-slate-50 dark:bg-slate-900 rounded-md border border-slate-200 dark:border-slate-800 flex items-center relative overflow-hidden group hover:scale-[1.01] transition-transform">
                                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/5 to-teal-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                        <span id="email-display" class="text-slate-900 dark:text-slate-100 font-medium break-all">{{ is_object($tempEmail) ? $tempEmail->email : $tempEmail }}</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <button id="copy-btn" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-12 w-12 relative hover:scale-105 active:scale-95 transition-transform text-slate-700 dark:text-slate-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="copy-icon dark:stroke-white">
                                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="check-icon hidden text-emerald-500 dark:stroke-white"><path d="M20 6 9 17l-5-5"></path></svg>
                                            <span class="sr-only">Copy email address</span>
                                        </button>
                                        <button id="refresh-btn" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-12 w-12 relative hover:scale-105 active:scale-95 transition-transform text-slate-700 dark:text-slate-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-refresh-cw dark:stroke-white"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path><path d="M21 3v5h-5"></path><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path><path d="M3 21v-5h5"></path></svg>
                                            <span class="sr-only">Generate new email</span>
                                        </button>
                                        <button id="delete-btn" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-12 w-12 relative hover:scale-105 active:scale-95 transition-transform hover:border-red-500 hover:text-red-500 text-slate-700 dark:text-slate-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2 dark:stroke-white"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                                            <span class="sr-only">Delete email address</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-1.5 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-500 dark:stroke-white"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            <span id="time-left">Auto-deletes in 10h 0m</span>
                                        </div>
                                        <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-1.5 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500 dark:stroke-white"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m12 6 4 4-4 4"></path><path d="M8 10h8"></path></svg>
                                            <span id="refresh-countdown">Auto-refresh in 10s</span>
                                        </div>
                                    </div>
                                    <button id="refresh-inbox-btn" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-emerald-50 hover:text-emerald-600 dark:hover:bg-emerald-950 dark:hover:text-emerald-400 h-9 px-3 gap-1 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-refresh-cw dark:stroke-white"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M3 21v-5h5"/></svg>
                                        Refresh Inbox
                                    </button>
                                </div>

                                <div class="w-full" x-data="{ activeTab: 'inbox' }">
                                    <div class="grid w-full grid-cols-2 p-1 bg-slate-100 dark:bg-slate-800 rounded-lg">
                                        <button 
                                            @click="activeTab = 'inbox'" 
                                            :class="{ 'bg-white dark:bg-slate-950 shadow-sm': activeTab === 'inbox' }"
                                            class="flex items-center justify-center gap-1 py-2 px-4 rounded-md text-slate-700 dark:text-slate-300"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-inbox dark:stroke-white"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg>
                                            Inbox
                                        </button>
                                        <button 
                                            @click="activeTab = 'favorites'" 
                                            :class="{ 'bg-white dark:bg-slate-950 shadow-sm': activeTab === 'favorites' }"
                                            class="flex items-center justify-center gap-1 py-2 px-4 rounded-md text-slate-700 dark:text-slate-300"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                            Favorites
                                        </button>
                                    </div>
                                    <div class="mt-6" x-show="activeTab === 'inbox'" x-cloak>
                                        <x-email-list :emails="$emails" :isFavorites="false" />
                                    </div>
                                    <div class="mt-6" x-show="activeTab === 'favorites'" x-cloak>
                                        <x-email-list :emails="$favoriteEmails ?? []" :isFavorites="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col items-start pt-0 p-6">
                                <p class="text-xs text-slate-500 dark:text-slate-400"><br>
                                    All emails are automatically deleted after 10 hours. Your privacy is our priority.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Ad Banner -->
                <div class="hidden lg:block lg:w-[160px]">
                    @if(isset($ads['sidebar']) && !empty($ads['sidebar']->ad_code))
                        {!! $ads['sidebar']->ad_code !!}
                    @else
                        <div class="hidden">
                            <x-ad-banner format="vertical" label="Right Banner" class="sticky top-24" />
                        </div>
                    @endif
                </div>
            </div>

            <!-- Bottom Ad Banner -->
            @if(isset($ads['footer']) && !empty($ads['footer']->ad_code))
                {!! $ads['footer']->ad_code !!}
            @else
                <div class="hidden">
                    <x-ad-banner format="horizontal" label="Bottom Banner" class="w-full max-w-7xl mx-auto mt-4" />
                </div>
            @endif
        </main>
    </div>

    <x-footer />

    <!-- Delete Email Address Confirmation Dialog -->
    <div id="delete-dialog" class="fixed inset-0 z-50 hidden">
        <div class="fixed inset-0 bg-black/80 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0"></div>
        <div class="fixed left-[50%] top-[50%] z-50 grid w-full max-w-lg translate-x-[-50%] translate-y-[-50%] gap-4 border bg-background p-6 shadow-lg duration-200 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[state=closed]:slide-out-to-left-1/2 data-[state=closed]:slide-out-to-top-[48%] data-[state=open]:slide-in-from-left-1/2 data-[state=open]:slide-in-from-top-[48%] sm:rounded-lg bg-white dark:bg-slate-950 border-slate-200 dark:border-slate-800">
            <div class="flex flex-col space-y-2 text-center sm:text-left">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Delete Email Address</h2>
                <p class="text-sm text-slate-600 dark:text-slate-300">Are you sure you want to delete this email address? A new one will be generated automatically.</p>
            </div>
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                <button id="cancel-delete" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 mt-2 sm:mt-0 text-slate-700 dark:text-slate-300">Cancel</button>
                <button id="confirm-delete" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-red-500 hover:bg-red-600 text-white h-10 px-4 py-2">Delete</button>
            </div>
        </div>
    </div>

    <!-- Refresh Email Confirmation Dialog -->
    <div id="refresh-dialog" class="fixed inset-0 z-50 hidden">
        <div class="fixed inset-0 bg-black/80 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0"></div>
        <div class="fixed left-[50%] top-[50%] z-50 grid w-full max-w-lg translate-x-[-50%] translate-y-[-50%] gap-4 border bg-background p-6 shadow-lg duration-200 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[state=closed]:slide-out-to-left-1/2 data-[state=closed]:slide-out-to-top-[48%] data-[state=open]:slide-in-from-left-1/2 data-[state=open]:slide-in-from-top-[48%] sm:rounded-lg bg-white dark:bg-slate-950 border-slate-200 dark:border-slate-800">
            <div class="flex flex-col space-y-2 text-center sm:text-left">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Generate New Email Address</h2>
                <p class="text-sm text-slate-600 dark:text-slate-300">Are you sure you want to generate a new email address? Your current email will no longer be accessible.</p>
            </div>
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                <button id="cancel-refresh" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 mt-2 sm:mt-0 text-slate-700 dark:text-slate-300">Cancel</button>
                <button id="confirm-refresh" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-emerald-500 hover:bg-emerald-600 text-white h-10 px-4 py-2">Generate New</button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-6 right-6 z-[999] max-w-md opacity-0 transition-all duration-300 transform translate-y-[20px] scale-95 pointer-events-none">
        <div class="pointer-events-auto flex items-center bg-white dark:bg-slate-800 text-gray-900 dark:text-white px-5 py-4 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-center rounded-full bg-emerald-100 dark:bg-emerald-900 w-10 h-10 mr-4 flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-600 dark:text-emerald-300"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><path d="m9 11 3 3L22 4"></path></svg>
            </div>
            <div>
                <div class="font-medium text-sm mb-1">Success</div>
                <div id="toast-message" class="text-sm text-gray-600 dark:text-gray-300"></div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // CSRF Token
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            // Email operations
            const emailDisplay = document.getElementById('email-display');
            const copyBtn = document.getElementById('copy-btn');
            const refreshBtn = document.getElementById('refresh-btn');
            const refreshInboxBtn = document.getElementById('refresh-inbox-btn');
            const deleteBtn = document.getElementById('delete-btn');
            const timeLeftEl = document.getElementById('time-left');
            
            // Dialog elements
            const deleteDialog = document.getElementById('delete-dialog');
            const cancelDelete = document.getElementById('cancel-delete');
            const confirmDelete = document.getElementById('confirm-delete');
            
            // Refresh dialog elements
            const refreshDialog = document.getElementById('refresh-dialog');
            const cancelRefresh = document.getElementById('cancel-refresh');
            const confirmRefresh = document.getElementById('confirm-refresh');
            
            // Toast elements
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            
            // Time left calculation
            let timeLeft = {{ $timeLeft }};
            
            // Sayacı ilk çalıştırma anında hemen güncelle
            function updateTimeLeftDisplay() {
                const hours = Math.floor(timeLeft / 3600);
                const minutes = Math.floor((timeLeft % 3600) / 60);
                timeLeftEl.textContent = `Auto-deletes in ${hours}h ${minutes}m`;
            }
            
            function updateTimeLeft() {
                timeLeft = Math.max(0, timeLeft - 60);
                updateTimeLeftDisplay();
            }
            
            // Sayfa yüklendiğinde sayacı bir kez göster
            updateTimeLeftDisplay();
            
            // Her dakika sayacı güncelle
            setInterval(updateTimeLeft, 60000);
            
            // Refresh countdown timer
            const refreshCountdownEl = document.getElementById('refresh-countdown');
            let refreshCountdown = 10; // Start from 10 seconds
            
            function updateRefreshCountdown() {
                refreshCountdown--;
                refreshCountdownEl.textContent = `Auto-refresh in ${refreshCountdown}s`;
                
                if (refreshCountdown <= 0) {
                    // Reset countdown
                    refreshCountdown = 10;
                    
                    // Trigger inbox refresh
                    refreshInbox();
                }
            }
            
            // Start the countdown timer
            const refreshInterval = setInterval(updateRefreshCountdown, 1000);
            
            // Function to refresh inbox
            function refreshInbox(event) {
                // Add spinning animation to the icon
                refreshInboxBtn.querySelector('svg').classList.add('animate-spin');
                
                fetch('{{ route("refresh.inbox") }}', {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update time left from server response
                        if (data.timeLeft !== undefined) {
                            timeLeft = data.timeLeft;
                            updateTimeLeft(); // Update timer immediately
                        }
                        
                        // Update the email list with new messages
                        if (data.messages) {
                            // Get the active tab
                            const activeTab = document.querySelector('[x-data]').__x.$data.activeTab;
                            
                            // Force page reload to refresh the email lists
                            // This is a temporary solution until we implement proper DOM updates
                            window.location.reload();
                            
                            // Only show toast when manually refreshed
                            if (event && event.type === 'click') {
                                showToast('Inbox refreshed successfully');
                            } else {
                                console.log('Auto-refreshed inbox at ' + new Date().toLocaleTimeString());
                            }
                        }
                    }
                })
                .catch(error => {
                    console.error('Error refreshing inbox:', error);
                })
                .finally(() => {
                    setTimeout(() => {
                        refreshInboxBtn.querySelector('svg').classList.remove('animate-spin');
                    }, 800);
                });
            }
            
            // Update the refresh inbox button to use the refreshInbox function
            refreshInboxBtn.addEventListener('click', function(event) {
                refreshInbox(event);
                
                // Reset the countdown timer after manual refresh
                refreshCountdown = 10;
                refreshCountdownEl.textContent = `Auto-refresh in ${refreshCountdown}s`;
            });
            
            // Copy email function
            copyBtn.addEventListener('click', function() {
                const copyIcon = this.querySelector('.copy-icon');
                const checkIcon = this.querySelector('.check-icon');
                
                navigator.clipboard.writeText(emailDisplay.textContent.trim()).then(() => {
                    copyIcon.classList.add('hidden');
                    checkIcon.classList.remove('hidden');
                    this.classList.add('border-emerald-500', 'text-emerald-500');
                    
                    showToast('Email address copied to clipboard');
                    
                    setTimeout(() => {
                        copyIcon.classList.remove('hidden');
                        checkIcon.classList.add('hidden');
                        this.classList.remove('border-emerald-500', 'text-emerald-500');
                    }, 2000);
                });
            });
            
            // Refresh email dialog
            refreshBtn.addEventListener('click', function() {
                refreshDialog.classList.remove('hidden');
            });
            
            cancelRefresh.addEventListener('click', function() {
                refreshDialog.classList.add('hidden');
            });
            
            // Confirm refresh email
            confirmRefresh.addEventListener('click', function() {
                const refreshIcon = refreshBtn.querySelector('svg');
                refreshIcon.classList.add('animate-spin');
                
                fetch('{{ route("generate.email") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        emailDisplay.textContent = data.email;
                        timeLeft = 10 * 60 * 60; // Reset to 10 hours
                        updateTimeLeft();
                        showToast('New email address generated');
                    }
                })
                .finally(() => {
                    refreshDialog.classList.add('hidden');
                    setTimeout(() => {
                        refreshIcon.classList.remove('animate-spin');
                    }, 800);
                });
            });
            
            // Delete email dialog
            deleteBtn.addEventListener('click', function() {
                deleteDialog.classList.remove('hidden');
            });
            
            cancelDelete.addEventListener('click', function() {
                deleteDialog.classList.add('hidden');
            });
            
            confirmDelete.addEventListener('click', function() {
                fetch('{{ route("delete.email") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        emailDisplay.textContent = '';
                        showToast('Email address deleted successfully');
                        
                        setTimeout(() => {
                            fetch('{{ route("generate.email") }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    emailDisplay.textContent = data.email;
                                    timeLeft = 10 * 60 * 60; // Reset to 10 hours
                                    updateTimeLeft();
                                    showToast('New email address generated');
                                }
                            });
                        }, 1000);
                    }
                })
                .finally(() => {
                    deleteDialog.classList.add('hidden');
                });
            });
            
            // Toast function
            function showToast(message) {
                toastMessage.textContent = message;
                toast.classList.remove('opacity-0', 'translate-y-[20px]', 'scale-95');
                toast.classList.add('opacity-100', 'translate-y-0', 'scale-100');
                
                setTimeout(() => {
                    toast.classList.remove('opacity-100', 'translate-y-0', 'scale-100');
                    toast.classList.add('opacity-0', 'translate-y-[20px]', 'scale-95');
                }, 3000);
            }
        });
    </script>
    @endpush
@endsection
