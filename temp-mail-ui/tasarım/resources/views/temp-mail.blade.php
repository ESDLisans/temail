@extends('layouts.app')

@section('content')
    <x-temp-mail-header />

    <div class="flex-grow">
        <!-- Top Ad Banner -->
        <x-ad-banner format="horizontal" label="Top Banner" class="w-full max-w-7xl mx-auto my-4" />

        <main class="container mx-auto px-4 py-4">
            <div class="flex flex-col lg:flex-row gap-4">
                <!-- Left Ad Banner -->
                <div class="hidden lg:block lg:w-[160px]">
                    <x-ad-banner format="vertical" label="Left Banner" class="sticky top-24" />
                </div>

                <!-- Main Content -->
                <div class="flex-1">
                    <div class="animate-fadeIn">
                        <div class="w-full shadow-md border-slate-200/80 dark:border-slate-800/80 overflow-hidden backdrop-blur-sm bg-white/80 dark:bg-slate-950/80 rounded-lg border">
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-emerald-400 to-teal-500"></div>
                            <div class="pb-4 p-6">
                                <h2 class="text-2xl font-medium flex items-center gap-2">
                                    <div class="p-1.5 rounded-md bg-gradient-to-br from-emerald-500 to-teal-600 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                    </div>
                                    <span class="bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 text-transparent bg-clip-text">
                                        Temporary Email
                                    </span>
                                </h2>
                                <p class="text-sm text-muted-foreground">Generate a disposable email address for temporary use</p>
                            </div>
                            <div class="px-6">
                                <div class="flex flex-col md:flex-row gap-4 mb-6">
                                    <div id="email-container" class="flex-1 p-4 bg-slate-50 dark:bg-slate-900 rounded-md border border-slate-200 dark:border-slate-800 flex items-center relative overflow-hidden group hover:scale-[1.01] transition-transform">
                                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/5 to-teal-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                        <span id="email-display" class="text-slate-900 dark:text-slate-100 font-medium break-all">{{ $tempEmail }}</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <button id="copy-btn" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-12 w-12 relative hover:scale-105 active:scale-95 transition-transform">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="copy-icon"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c0-1.1.9-2 2-2h2"/><path d="M4 12c0-1.1.9-2 2-2h2"/><path d="M4 8c0-1.1.9-2 2-2h2"/></svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="check-icon hidden text-emerald-500"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                                            <span class="sr-only">Copy email address</span>
                                        </button>
                                        <button id="refresh-btn" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-12 w-12 relative hover:scale-105 active:scale-95 transition-transform">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-refresh-cw"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M3 21v-5h5"/></svg>
                                            <span class="sr-only">Generate new email</span>
                                        </button>
                                        <button id="delete-btn" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-12 w-12 relative hover:scale-105 active:scale-95 transition-transform hover:border-red-500 hover:text-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                            <span class="sr-only">Delete email address</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-1.5 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-500"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                        <span id="time-left">Auto-deletes in 10h 0m</span>
                                    </div>
                                    <button type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-emerald-50 hover:text-emerald-600 dark:hover:bg-emerald-950 dark:hover:text-emerald-400 h-9 px-3 gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-refresh-cw"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M3 21v-5h5"/></svg>
                                        Refresh Inbox
                                    </button>
                                </div>

                                <div class="w-full" x-data="{ activeTab: 'inbox' }">
                                    <div class="grid w-full grid-cols-2 p-1 bg-slate-100 dark:bg-slate-800 rounded-lg">
                                        <button 
                                            @click="activeTab = 'inbox'" 
                                            :class="{ 'bg-white dark:bg-slate-950 shadow-sm': activeTab === 'inbox' }"
                                            class="flex items-center justify-center gap-1 py-2 px-4 rounded-md"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg>
                                            Inbox
                                        </button>
                                        <button 
                                            @click="activeTab = 'email'" 
                                            :class="{ 'bg-white dark:bg-slate-950 shadow-sm': activeTab === 'email' }"
                                            class="flex items-center justify-center gap-1 py-2 px-4 rounded-md"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                            Email View
                                        </button>
                                    </div>
                                    <div class="mt-6" x-show="activeTab === 'inbox'">
                                        <x-email-list :emails="$emails" />
                                    </div>
                                    <div class="mt-6" x-show="activeTab === 'email'">
                                        <x-email-view :email="$emailContent" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col items-start pt-0 p-6">
                                <p class="text-xs text-slate-500 dark:text-slate-400">
                                    All emails are automatically deleted after 10 hours. Your privacy is our priority.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Ad Banner -->
                <div class="hidden lg:block lg:w-[160px]">
                    <x-ad-banner format="vertical" label="Right Banner" class="sticky top-24" />
                </div>
            </div>

            <!-- Bottom Ad Banner -->
            <x-ad-banner format="horizontal" label="Bottom Banner" class="w-full max-w-7xl mx-auto mt-4" />
        </main>
    </div>

    <x-footer />

    <!-- Delete Email Address Confirmation Dialog -->
    <div id="delete-dialog" class="fixed inset-0 z-50 hidden">
        <div class="fixed inset-0 bg-black/80 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0"></div>
        <div class="fixed left-[50%] top-[50%] z-50 grid w-full max-w-lg translate-x-[-50%] translate-y-[-50%] gap-4 border bg-background p-6 shadow-lg duration-200 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[state=closed]:slide-out-to-left-1/2 data-[state=closed]:slide-out-to-top-[48%] data-[state=open]:slide-in-from-left-1/2 data-[state=open]:slide-in-from-top-[48%] sm:rounded-lg bg-white dark:bg-slate-950 border-slate-200 dark:border-slate-800">
            <div class="flex flex-col space-y-2 text-center sm:text-left">
                <h2 class="text-lg font-semibold">Delete Email Address</h2>
                <p class="text-sm text-muted-foreground">Are you sure you want to delete this email address? A new one will be generated automatically.</p>
            </div>
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                <button id="cancel-delete" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 mt-2 sm:mt-0">Cancel</button>
                <button id="confirm-delete" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-red-500 hover:bg-red-600 text-white h-10 px-4 py-2">Delete</button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed top-4 right-4 z-[100] max-w-md opacity-0 transition-opacity duration-300 pointer-events-none">
        <div class="pointer-events-auto relative flex w-full items-center justify-between space-x-4 overflow-hidden rounded-md border p-6 pr-8 shadow-lg transition-all data-[state=open]:animate-in data-[state=closed]:animate-out data-[swipe=end]:animate-out data-[state=closed]:fade-out-80 data-[state=open]:slide-in-from-top-full data-[state=closed]:slide-out-to-right-full border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950">
            <div class="grid gap-1">
                <div id="toast-message" class="text-sm opacity-90"></div>
            </div>
            <button class="absolute right-2 top-2 rounded-md p-1 text-foreground/50 opacity-0 transition-opacity hover:text-foreground focus:opacity-100 focus:outline-none focus:ring-2 group-hover:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                <span class="sr-only">Close</span>
            </button>
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
            const deleteBtn = document.getElementById('delete-btn');
            const timeLeftEl = document.getElementById('time-left');
            
            // Dialog elements
            const deleteDialog = document.getElementById('delete-dialog');
            const cancelDelete = document.getElementById('cancel-delete');
            const confirmDelete = document.getElementById('confirm-delete');
            
            // Toast elements
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            
            // Time left calculation
            let timeLeft = {{ $timeLeft }};
            
            function updateTimeLeft() {
                timeLeft = Math.max(0, timeLeft - 60);
                const hours = Math.floor(timeLeft / 3600);
                const minutes = Math.floor((timeLeft % 3600) / 60);
                timeLeftEl.textContent = `Auto-deletes in ${hours}h ${minutes}m`;
            }
            
            setInterval(updateTimeLeft, 60000);
            
            // Copy email function
            copyBtn.addEventListener('click', function() {
                const copyIcon = this.querySelector('.copy-icon');
                const checkIcon = this.querySelector('.check-icon');
                
                navigator.clipboard.writeText(emailDisplay.textContent).then(() => {
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
            
            // Refresh email function
            refreshBtn.addEventListener('click', function() {
                this.querySelector('svg').classList.add('animate-spin');
                
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
                    setTimeout(() => {
                        this.querySelector('svg').classList.remove('animate-spin');
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
                toast.classList.remove('opacity-0');
                toast.classList.add('opacity-100');
                
                setTimeout(() => {
                    toast.classList.remove('opacity-100');
                    toast.classList.add('opacity-0');
                }, 3000);
            }
        });
    </script>
    @endpush
@endsection
