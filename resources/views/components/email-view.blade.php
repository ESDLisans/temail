<div class="animate-fadeIn">
    <div>
        @if($email)
            <div>
                <div class="flex items-center gap-2 mb-6">
                    <button type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 w-9">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                        <span class="sr-only">Back to inbox</span>
                    </button>
                    <div class="flex-1"></div>
                    <div class="flex items-center gap-1">
                        <button type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 w-9">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <span class="sr-only">Star email</span>
                        </button>
                        <button type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 w-9">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white"><path d="m3 12 7-7 7 7"/><path d="M10 5v14"/></svg>
                            <span class="sr-only">Reply</span>
                        </button>
                        <button type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 w-9">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white"><path d="m3 12 7 7 7-7"/><path d="M14 5v14"/></svg>
                            <span class="sr-only">Forward</span>
                        </button>
                        <button type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 w-9">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                            <span class="sr-only">Download</span>
                        </button>
                        <button type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 w-9 hover:text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                            <span class="sr-only">Delete</span>
                        </button>
                        <button type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 w-9">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                            <span class="sr-only">More options</span>
                        </button>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-medium mb-4">{{ $email['subject'] }}</h2>
                    <div class="flex items-start gap-3 p-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900">
                        <div class="h-10 w-10 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center text-emerald-600 dark:text-emerald-300 font-medium text-sm">
                            {{ substr($email['senderName'], 0, 1) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between mb-1">
                                <div>
                                    <p class="text-sm font-medium">{{ $email['senderName'] }}</p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">{{ $email['sender'] }}</p>
                                </div>
                                <p class="text-xs text-slate-500 dark:text-slate-400">{{ $email['time'] }}</p>
                            </div>
                            <p class="text-xs text-slate-500 dark:text-slate-400">To: {{ session('temp_email', 'temp.user28491@tempmail.io') }}</p>
                        </div>
                    </div>
                </div>

                <div class="prose prose-slate dark:prose-invert prose-sm max-w-none p-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950">
                    {!! $email['content'] !!}
                </div>
            </div>
        @else
            <div class="py-12 flex flex-col items-center justify-center text-center">
                <div class="h-16 w-16 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400 dark:stroke-white"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                </div>
                <h3 class="text-lg font-medium mb-1 dark:text-white">Select an email from your inbox to view it here</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 max-w-xs">
                    Click on an email in your inbox to view its contents
                </p>
            </div>
        @endif
    </div>
</div>

<div class="flex items-center border-b border-gray-200 dark:border-gray-700 p-4">
    <div class="ml-auto flex shrink-0 items-center space-x-3">
        <button type="button" class="copy-btn inline-flex items-center gap-x-1.5 rounded-md bg-white px-2.5 py-1.5 text-sm font-medium text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-white dark:ring-gray-600 dark:hover:bg-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="copy-icon dark:stroke-white">
                <rect width="8" height="8" x="8" y="8" rx="1"></rect>
                <path d="M16 8V5c0-.6-.4-1-1-1H9c-.6 0-1 .4-1 1v3"></path>
                <path d="M9 16H5c-.6 0-1-.4-1-1V9c0-.6.4-1 1-1h3"></path>
            </svg>
            <span>Copy</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="check-icon hidden dark:stroke-white">
                <path d="M20 6 9 17l-5-5"></path>
            </svg>
        </button>
        <button type="button" class="favorite-btn inline-flex items-center gap-x-1.5 rounded-md bg-white px-2.5 py-1.5 text-sm font-medium text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-white dark:ring-gray-600 dark:hover:bg-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
            </svg>
            <span>Favorite</span>
        </button>
        <button type="button" class="mark-read-btn inline-flex items-center gap-x-1.5 rounded-md bg-white px-2.5 py-1.5 text-sm font-medium text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-white dark:ring-gray-600 dark:hover:bg-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white">
                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>
            <span>Mark Read</span>
        </button>
    </div>
</div>
