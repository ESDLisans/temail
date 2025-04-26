<div class="mb-4 relative">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-slate-400"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
    <input type="search" placeholder="Search emails..." class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 pl-10 bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-800">
</div>

<div class="space-y-2">
    @if(count($emails) > 0)
        @foreach($emails as $index => $email)
            <div class="animate-fadeIn" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="p-4 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 cursor-pointer transition-all {{ !$email['read'] ? 'bg-emerald-50 dark:bg-emerald-950/30' : 'bg-white dark:bg-slate-950' }} border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="flex items-start gap-3">
                        <div class="flex flex-col items-center gap-1 mt-1">
                            <div class="h-2 w-2 rounded-full flex-shrink-0 {{ !$email['read'] ? 'bg-emerald-500' : 'bg-transparent' }}"></div>
                            <button type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-6 w-6 {{ $email['starred'] ? 'text-amber-500' : 'text-slate-300 dark:text-slate-600' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="{{ $email['starred'] ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <span class="sr-only">Star email</span>
                            </button>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between mb-1">
                                <div>
                                    <p class="text-sm font-medium">{{ $email['senderName'] }}</p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">{{ $email['sender'] }}</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs text-slate-500 dark:text-slate-400 whitespace-nowrap">{{ $email['time'] }}</span>
                                    <div class="flex">
                                        <button type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-7 w-7 hover:text-red-500" data-email-id="{{ $email['id'] }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                            <span class="sr-only">Delete</span>
                                        </button>
                                        <button type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-7 w-7">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                                            <span class="sr-only">More options</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm mb-1 {{ !$email['read'] ? 'font-medium' : '' }}">{{ $email['subject'] }}</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-1">{{ $email['preview'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="py-12 flex flex-col items-center justify-center text-center animate-fadeIn">
            <div class="h-16 w-16 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            </div>
            <h3 class="text-lg font-medium mb-1">Your inbox is empty</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 max-w-xs">
                New emails will appear here. Refresh your inbox to check for new messages.
            </p>
        </div>
    @endif
</div>
