@props(['emails' => [], 'isFavorites' => false])

<div class="space-y-1">
    <!-- Search Box -->
    <div class="relative mb-4">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input 
            type="text" 
            id="search-emails" 
            placeholder="Search emails..." 
            class="w-full pl-10 pr-10 py-2 border border-slate-200 dark:border-slate-700 rounded-lg bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-500 dark:placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm"
        >
        <button id="clear-search" class="absolute inset-y-0 right-0 pr-3 flex items-center hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 hover:text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Search Status -->
    <div id="search-status" class="text-xs text-slate-500 dark:text-slate-400 hidden">Searching...</div>
    <div id="search-results-info" class="text-xs text-slate-500 dark:text-slate-400 hidden mb-2">
        Showing <span id="results-count">0</span> results for "<span id="search-term"></span>"
    </div>

    <!-- Empty State -->
    <div id="empty-state" class="{{ count($emails) > 0 ? 'hidden' : '' }} py-12 flex flex-col items-center justify-center text-center">
        <div class="h-16 w-16 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center mb-4">
            @if($isFavorites)
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400">
                    <rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                </svg>
            @endif
        </div>
        <h3 class="text-lg font-medium mb-1 text-slate-900 dark:text-slate-100">
            @if($isFavorites)
                No favorite emails
            @else
                Your inbox is empty
            @endif
        </h3>
        <p class="text-sm text-slate-500 dark:text-slate-400 max-w-xs">
            @if($isFavorites)
                Star emails in your inbox to add them to your favorites.
            @else
                New emails will appear here. Refresh your inbox to check for new messages.
            @endif
        </p>
    </div>

    <!-- Email List -->
    <div id="email-list" class="{{ count($emails) === 0 ? 'hidden' : '' }} space-y-0 overflow-hidden border border-slate-200 dark:border-slate-700 rounded-xl bg-white dark:bg-slate-900 shadow-sm">
        @forelse($emails as $email)
            <div class="email-item group cursor-pointer border-b border-slate-100 dark:border-slate-800 last:border-b-0 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-all duration-200 {{ !$email->is_read ? 'bg-blue-50/50 dark:bg-blue-950/20' : '' }}" data-id="{{ $email->id }}">
                <div class="flex items-start gap-4 p-4">
                    <!-- Unread Indicator & Star Button -->
                    <div class="flex flex-col items-center justify-center gap-2 h-11">
                        @if(!$email->is_read)
                            <div class="h-2 w-2 rounded-full bg-emerald-500 flex-shrink-0"></div>
                        @else
                            <div class="h-2 w-2 flex-shrink-0"></div>
                        @endif
                        
                        <!-- Star Button - Always visible if starred, otherwise show on hover -->
                        <button 
                            type="button" 
                            class="star-btn transition-all duration-200 {{ $email->is_starred ? 'text-amber-500 opacity-100' : 'text-slate-300 opacity-60 group-hover:opacity-100 hover:text-amber-500' }}" 
                            data-email-id="{{ $email->id }}"
                            title="{{ $email->is_starred ? 'Remove from favorites' : 'Add to favorites' }}"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="{{ $email->is_starred ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Avatar/Icon -->
                    <div class="flex-shrink-0">
                        @php
                            $fromParts = explode(' <', $email->from);
                            $senderName = trim($fromParts[0]);
                            $senderEmail = isset($fromParts[1]) ? trim($fromParts[1], '<>') : $email->from;
                            $firstLetter = mb_substr($senderName, 0, 1, 'UTF-8');
                            
                            // Generate consistent colors based on sender email
                            $colors = [
                                'from-blue-400 to-blue-600',
                                'from-green-400 to-green-600', 
                                'from-purple-400 to-purple-600',
                                'from-pink-400 to-pink-600',
                                'from-indigo-400 to-indigo-600',
                                'from-red-400 to-red-600',
                                'from-orange-400 to-orange-600',
                                'from-teal-400 to-teal-600',
                                'from-cyan-400 to-cyan-600',
                                'from-violet-400 to-violet-600'
                            ];
                            $colorIndex = crc32($senderEmail) % count($colors);
                            $gradientColor = $colors[$colorIndex];
                        @endphp
                        <div class="h-11 w-11 rounded-full bg-gradient-to-br {{ $gradientColor }} flex items-center justify-center text-white font-semibold text-sm shadow-sm ring-2 ring-white dark:ring-slate-800">
                            {{ strtoupper($firstLetter) }}
                        </div>
                    </div>

                    <!-- Email Content -->
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between mb-2">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-slate-900 dark:text-slate-100 truncate {{ !$email->is_read ? 'font-semibold' : '' }}">
                                    {{ $senderName }}
                                </p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 truncate mt-0.5">
                                    {{ $senderEmail }}
                                </p>
                            </div>
                            <div class="flex items-center gap-2 ml-3">
                                <time class="text-xs text-slate-500 dark:text-slate-400 whitespace-nowrap font-medium">
                                    {{ $email->received_at->format('M j') }}
                                </time>
                                <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center gap-1">
                                    <button 
                                        type="button" 
                                        class="p-1.5 rounded-md hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-400 hover:text-red-500 dark:text-slate-500 dark:hover:text-red-400 transition-colors"
                                        title="Delete email"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-2">
                            <h3 class="text-sm text-slate-900 dark:text-slate-100 truncate {{ !$email->is_read ? 'font-semibold' : 'font-medium' }} leading-tight">
                                {{ $email->subject ?: 'No Subject' }}
                            </h3>
                        </div>
                        
                        <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-2 leading-relaxed">
                            {{ Str::limit(strip_tags($email->body_text ?: $email->body_html), 120) ?: 'No content preview available' }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <!-- Empty state is handled above -->
        @endforelse
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-emails');
    const clearButton = document.getElementById('clear-search');
    const searchStatus = document.getElementById('search-status');
    const searchResultsInfo = document.getElementById('search-results-info');
    const resultsCount = document.getElementById('results-count');
    const searchTermDisplay = document.getElementById('search-term');
    const emailItems = document.querySelectorAll('.email-item');
    const emptyState = document.getElementById('empty-state');
    const emailList = document.getElementById('email-list');
    
    let searchTimeout;
    
    // Search functionality
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            if (this.value.length > 0) {
                clearButton.classList.remove('hidden');
                searchStatus.classList.remove('hidden');
                
                if (searchTimeout) {
                    clearTimeout(searchTimeout);
                }
                
                searchTimeout = setTimeout(() => {
                    performSearch(this.value);
                }, 300);
            } else {
                clearButton.classList.add('hidden');
                searchStatus.classList.add('hidden');
                searchResultsInfo.classList.add('hidden');
                resetSearch();
            }
        });
        
        clearButton.addEventListener('click', function() {
            searchInput.value = '';
            searchInput.focus();
            clearButton.classList.add('hidden');
            searchStatus.classList.add('hidden');
            searchResultsInfo.classList.add('hidden');
            resetSearch();
        });
        
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && this.value.length > 0) {
                this.value = '';
                clearButton.classList.add('hidden');
                searchStatus.classList.add('hidden');
                searchResultsInfo.classList.add('hidden');
                resetSearch();
            }
        });
    }
    
    function performSearch(term) {
        const searchTerm = term.toLowerCase();
        let visibleCount = 0;
        
        emailItems.forEach(item => {
            const emailSubject = item.querySelector('h3').textContent.toLowerCase();
            const emailContent = item.querySelector('.line-clamp-2').textContent.toLowerCase();
            const emailFrom = item.querySelector('.text-slate-900, .dark\\:text-slate-100').textContent.toLowerCase();
            
            if (emailSubject.includes(searchTerm) || emailFrom.includes(searchTerm) || emailContent.includes(searchTerm)) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        
        if (searchTerm.length > 0) {
            resultsCount.textContent = visibleCount;
            searchTermDisplay.textContent = term;
            searchResultsInfo.classList.remove('hidden');
        } else {
            searchResultsInfo.classList.add('hidden');
        }
        
        if (visibleCount === 0) {
            emptyState.classList.remove('hidden');
            emailList.classList.add('hidden');
        } else {
            emptyState.classList.add('hidden');
            emailList.classList.remove('hidden');
        }
        
        searchStatus.classList.add('hidden');
    }
    
    function resetSearch() {
        emailItems.forEach(item => {
            item.style.display = '';
        });
        
        if (emailItems.length === 0) {
            emptyState.classList.remove('hidden');
            emailList.classList.add('hidden');
        } else {
            emptyState.classList.add('hidden');
            emailList.classList.remove('hidden');
        }
    }
    
    // Email click functionality - go to message detail page
    emailItems.forEach(item => {
        item.addEventListener('click', function(e) {
            // Don't navigate if clicking on star button or delete button
            if (e.target.closest('.star-btn') || e.target.closest('button[title="Delete email"]')) {
                return;
            }
            
            const emailId = this.dataset.id;
            
            // Navigate to message detail page
            window.location.href = `/message/${emailId}`;
        });
    });
    
    // Star button functionality
    document.querySelectorAll('.star-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            
            const emailId = this.dataset.emailId;
            const isStarred = this.classList.contains('text-amber-500');
            
            // Toggle visual state immediately
            if (isStarred) {
                this.classList.remove('text-amber-500');
                this.classList.add('text-slate-300');
                this.querySelector('svg').setAttribute('fill', 'none');
                this.title = 'Add to favorites';
            } else {
                this.classList.remove('text-slate-300');
                this.classList.add('text-amber-500');
                this.querySelector('svg').setAttribute('fill', 'currentColor');
                this.title = 'Remove from favorites';
            }
            
            // Make AJAX request to toggle favorite status
            fetch(`/favorite/${emailId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    // Revert visual changes if request failed
                    if (isStarred) {
                        this.classList.remove('text-slate-300');
                        this.classList.add('text-amber-500');
                        this.querySelector('svg').setAttribute('fill', 'currentColor');
                        this.title = 'Remove from favorites';
                    } else {
                        this.classList.remove('text-amber-500');
                        this.classList.add('text-slate-300');
                        this.querySelector('svg').setAttribute('fill', 'none');
                        this.title = 'Add to favorites';
                    }
                }
            })
            .catch(error => {
                console.error('Error toggling favorite:', error);
                // Revert visual changes on error
                if (isStarred) {
                    this.classList.remove('text-slate-300');
                    this.classList.add('text-amber-500');
                    this.querySelector('svg').setAttribute('fill', 'currentColor');
                    this.title = 'Remove from favorites';
                } else {
                    this.classList.remove('text-amber-500');
                    this.classList.add('text-slate-300');
                    this.querySelector('svg').setAttribute('fill', 'none');
                    this.title = 'Add to favorites';
                }
            });
        });
    });
});
</script>
