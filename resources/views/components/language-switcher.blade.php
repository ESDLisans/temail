<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-slate-100 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors duration-200">
        <!-- Current Language Flag -->
        @if(app()->getLocale() === 'tr')
            <div class="w-5 h-5 rounded-full overflow-hidden border border-slate-200 dark:border-slate-700">
                <svg viewBox="0 0 32 32" class="w-full h-full">
                    <rect width="32" height="32" fill="#e30a17"/>
                    <circle cx="10" cy="16" r="4" fill="white"/>
                    <circle cx="12" cy="16" r="3.2" fill="#e30a17"/>
                    <polygon points="16,12 18,14 20,12 18,16 20,20 18,18 16,20 18,16" fill="white"/>
                </svg>
            </div>
            <span class="hidden sm:inline">{{ __('messages.turkish') }}</span>
        @else
            <div class="w-5 h-5 rounded-full overflow-hidden border border-slate-200 dark:border-slate-700">
                <svg viewBox="0 0 32 32" class="w-full h-full">
                    <rect width="32" height="32" fill="#012169"/>
                    <path d="M0,0 L32,21.33 L32,0 Z" fill="white"/>
                    <path d="M32,32 L0,10.67 L0,32 Z" fill="white"/>
                    <path d="M32,0 L0,21.33 L0,32 L32,10.67 Z" fill="#C8102E"/>
                    <path d="M0,0 L32,21.33 M32,32 L0,10.67" stroke="#C8102E" stroke-width="2.13"/>
                    <path d="M16,0 L16,32 M0,16 L32,16" stroke="white" stroke-width="5.33"/>
                    <path d="M16,0 L16,32 M0,16 L32,16" stroke="#C8102E" stroke-width="3.2"/>
                </svg>
            </div>
            <span class="hidden sm:inline">{{ __('messages.english') }}</span>
        @endif
        
        <!-- Dropdown Arrow -->
        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    
    <!-- Dropdown Menu -->
    <div x-show="open" 
         @click.away="open = false" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute right-0 top-full mt-2 w-48 bg-white dark:bg-slate-800 rounded-lg shadow-lg border border-slate-200 dark:border-slate-700 py-2 z-50">
        
        <!-- English Option -->
        <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}" 
           class="flex items-center gap-3 px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors duration-200 {{ app()->getLocale() === 'en' ? 'bg-slate-50 dark:bg-slate-700 text-emerald-600 dark:text-emerald-400' : '' }}">
            <div class="w-5 h-5 rounded-full overflow-hidden border border-slate-200 dark:border-slate-600">
                <svg viewBox="0 0 32 32" class="w-full h-full">
                    <rect width="32" height="32" fill="#012169"/>
                    <path d="M0,0 L32,21.33 L32,0 Z" fill="white"/>
                    <path d="M32,32 L0,10.67 L0,32 Z" fill="white"/>
                    <path d="M32,0 L0,21.33 L0,32 L32,10.67 Z" fill="#C8102E"/>
                    <path d="M0,0 L32,21.33 M32,32 L0,10.67" stroke="#C8102E" stroke-width="2.13"/>
                    <path d="M16,0 L16,32 M0,16 L32,16" stroke="white" stroke-width="5.33"/>
                    <path d="M16,0 L16,32 M0,16 L32,16" stroke="#C8102E" stroke-width="3.2"/>
                </svg>
            </div>
            <span>{{ __('messages.english') }}</span>
            @if(app()->getLocale() === 'en')
                <svg class="w-4 h-4 ml-auto text-emerald-600 dark:text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
            @endif
        </a>
        
        <!-- Turkish Option -->
        <a href="{{ request()->fullUrlWithQuery(['lang' => 'tr']) }}" 
           class="flex items-center gap-3 px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors duration-200 {{ app()->getLocale() === 'tr' ? 'bg-slate-50 dark:bg-slate-700 text-emerald-600 dark:text-emerald-400' : '' }}">
            <div class="w-5 h-5 rounded-full overflow-hidden border border-slate-200 dark:border-slate-600">
                <svg viewBox="0 0 32 32" class="w-full h-full">
                    <rect width="32" height="32" fill="#e30a17"/>
                    <circle cx="10" cy="16" r="4" fill="white"/>
                    <circle cx="12" cy="16" r="3.2" fill="#e30a17"/>
                    <polygon points="16,12 18,14 20,12 18,16 20,20 18,18 16,20 18,16" fill="white"/>
                </svg>
            </div>
            <span>{{ __('messages.turkish') }}</span>
            @if(app()->getLocale() === 'tr')
                <svg class="w-4 h-4 ml-auto text-emerald-600 dark:text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
            @endif
        </a>
    </div>
</div> 