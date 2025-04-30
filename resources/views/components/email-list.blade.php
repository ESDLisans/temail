@props(['emails' => [], 'isFavorites' => false])

<div class="flex flex-col space-y-6">
    <div class="relative">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500 dark:text-slate-400 dark:stroke-white"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        <input id="search-emails" type="text" placeholder="Search emails" class="w-full rounded-md border bg-white dark:text-white pl-10 pr-10 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent placeholder:text-slate-500 dark:placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-slate-200 dark:border-slate-800 dark:bg-slate-950 focus-visible:ring-emerald-500">
        <button id="clear-search" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            <span class="sr-only">Clear search</span>
        </button>
        <div id="search-status" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hidden animate-pulse">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
    </div>

    <div id="search-results-info" class="text-xs text-slate-500 dark:text-white hidden">
        Showing <span id="results-count">0</span> results for "<span id="search-term"></span>"
    </div>

    <div id="empty-state" class="{{ count($emails) > 0 ? 'hidden' : '' }} flex flex-col items-center justify-center space-y-3 rounded-md border border-dashed p-8 text-center animate-in fade-in-50 border-slate-200 dark:border-slate-800">
        <div class="rounded-full bg-slate-100 p-3 dark:bg-slate-800">
            @if($isFavorites)
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-slate-500 dark:text-slate-400 dark:stroke-white"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-slate-500 dark:text-slate-400 dark:stroke-white"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            @endif
        </div>
        <div class="max-w-xs">
            @if($isFavorites)
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">No favorite emails</h3>
                <p class="text-sm text-slate-600 dark:text-slate-300">Star emails in your inbox to add them to your favorites.</p>
            @else
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">No emails yet</h3>
                <p class="text-sm text-slate-600 dark:text-slate-300">Your inbox is empty. Emails will appear here when you receive them.</p>
            @endif
        </div>
    </div>

    <div id="email-list" class="{{ count($emails) === 0 ? 'hidden' : '' }} divide-y animate-in fade-in-50 divide-slate-200 dark:divide-slate-800 -mx-6">
        @forelse($emails as $email)
            <div class="email-item cursor-pointer border-l-2 px-6 py-4 transition-all hover:bg-slate-50 dark:hover:bg-slate-900 {{ $loop->first ? 'border-emerald-500' : 'border-transparent' }}" data-id="{{ $email->id }}">
                <div class="flex justify-between gap-2">
                    <h3 class="line-clamp-1 font-medium text-slate-900 dark:text-white">{{ $email->subject ?? 'No Subject' }}</h3>
                    <time datetime="{{ $email->created_at->toIso8601String() }}" class="shrink-0 text-xs text-slate-500 dark:text-slate-400">{{ $email->created_at->format('h:i A') }}</time>
                </div>
                <div class="flex items-center gap-2 text-xs text-slate-600 dark:text-slate-300">
                    <span class="line-clamp-1">From: {{ $email->from }}</span>
                </div>
                <p class="line-clamp-1 text-xs text-slate-500 dark:text-slate-400 mt-1">{{ $email->text_content ?? 'No preview available' }}</p>
            </div>
        @empty
            <!-- Empty state is handled by the separate div above -->
        @endforelse
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Email search functionality
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
    
    if (searchInput) {
        // Show clear button when there's text in the search input
        searchInput.addEventListener('input', function() {
            if (this.value.length > 0) {
                clearButton.classList.remove('hidden');
                searchStatus.classList.remove('hidden');
                
                // Clear any existing timeout
                if (searchTimeout) {
                    clearTimeout(searchTimeout);
                }
                
                // Set a timeout for the search to avoid searching on every keystroke
                searchTimeout = setTimeout(() => {
                    performSearch(this.value);
                }, 300); // 300ms delay for better performance
            } else {
                clearButton.classList.add('hidden');
                searchStatus.classList.add('hidden');
                searchResultsInfo.classList.add('hidden');
                resetSearch();
            }
        });
        
        // Clear search when clicking the clear button
        clearButton.addEventListener('click', function() {
            searchInput.value = '';
            searchInput.focus();
            clearButton.classList.add('hidden');
            searchStatus.classList.add('hidden');
            searchResultsInfo.classList.add('hidden');
            resetSearch();
        });
        
        // Clear search when pressing Escape
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (this.value.length > 0) {
                    this.value = '';
                    clearButton.classList.add('hidden');
                    searchStatus.classList.add('hidden');
                    searchResultsInfo.classList.add('hidden');
                    resetSearch();
                }
            }
        });
    }
    
    function performSearch(term) {
        const searchTerm = term.toLowerCase();
        let visibleCount = 0;
        
        emailItems.forEach(item => {
            const emailSubject = item.querySelector('h3').textContent.toLowerCase();
            const emailFrom = item.querySelector('.text-slate-600, .dark\\:text-slate-300').textContent.toLowerCase();
            const emailContent = item.querySelector('.text-slate-500, .dark\\:text-slate-400').textContent.toLowerCase();
            
            if (emailSubject.includes(searchTerm) || emailFrom.includes(searchTerm) || emailContent.includes(searchTerm)) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        
        // Update search results info
        if (searchTerm.length > 0) {
            resultsCount.textContent = visibleCount;
            searchTermDisplay.textContent = term;
            searchResultsInfo.classList.remove('hidden');
        } else {
            searchResultsInfo.classList.add('hidden');
        }
        
        // Show/hide the empty state depending on results
        if (visibleCount === 0) {
            emptyState.classList.remove('hidden');
            emailList.classList.add('hidden');
        } else {
            emptyState.classList.add('hidden');
            emailList.classList.remove('hidden');
        }
        
        // Hide search status after search is complete
        searchStatus.classList.add('hidden');
    }
    
    function resetSearch() {
        // Show all email items
        emailItems.forEach(item => {
            item.style.display = '';
        });
        
        // Show/hide the empty state depending on if there are emails
        if (emailItems.length === 0) {
            emptyState.classList.remove('hidden');
            emailList.classList.add('hidden');
        } else {
            emptyState.classList.add('hidden');
            emailList.classList.remove('hidden');
        }
    }
    
    // Email selection functionality
    emailItems.forEach(item => {
        item.addEventListener('click', function() {
            const emailId = this.dataset.id;
            
            // Remove selected state from all emails
            emailItems.forEach(el => {
                el.classList.remove('border-emerald-500');
                el.classList.add('border-transparent');
            });
            
            // Add selected state to clicked email
            this.classList.remove('border-transparent');
            this.classList.add('border-emerald-500');
            
            // Fetch and display the email content (handled by controller)
            window.location.href = `/temp-mail?id=${emailId}`;
        });
    });
    
    // Add favorite button to each email item
    emailItems.forEach(item => {
        const emailControls = document.createElement('div');
        emailControls.className = 'flex items-center gap-2 mt-2';
        
        const favoriteButton = document.createElement('button');
        favoriteButton.className = 'inline-flex items-center text-xs text-slate-500 hover:text-amber-500 dark:text-slate-400 dark:hover:text-amber-400';
        favoriteButton.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            Favorite
        `;
        
        favoriteButton.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent triggering the parent click event
            const emailId = item.dataset.id;
            
            // Toggle favorite status
            if (this.classList.contains('text-amber-500')) {
                this.classList.remove('text-amber-500');
                this.classList.add('text-slate-500', 'hover:text-amber-500');
            } else {
                this.classList.remove('text-slate-500', 'hover:text-amber-500');
                this.classList.add('text-amber-500');
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
                if (data.success) {
                    // You could show a toast notification here
                }
            });
        });
        
        emailControls.appendChild(favoriteButton);
        item.appendChild(emailControls);
    });
});
</script>
