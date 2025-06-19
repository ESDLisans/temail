@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title)
@section('meta_description', $page->meta_description ?? Str::limit(strip_tags($page->content), 160))

@section('content')
<div class="bg-gradient-to-b from-slate-50 to-white dark:from-slate-900 dark:to-slate-800 py-16 md:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumbs -->
            <div class="mb-6 text-sm flex items-center">
                <a href="{{ route('home') }}" class="text-slate-500 hover:text-emerald-600 dark:text-slate-400 dark:hover:text-emerald-400 transition-colors">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-slate-400 dark:text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-slate-700 dark:text-slate-300 font-medium">{{ $page->title }}</span>
            </div>
            
            <!-- Page header -->
            <header class="mb-10 w-full relative bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm p-6 sm:p-8">
                <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-emerald-500 to-teal-500 rounded-l-xl"></div>
                <div class="space-y-4">
                    @if(isset($page->category) && $page->category)
                    <div class="text-emerald-600 dark:text-emerald-400 text-sm font-medium flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        {{ $page->category }}
                    </div>
                    @endif
                    <div>
                        <h1 class="text-3xl sm:text-4xl font-bold text-slate-800 dark:text-white leading-snug">{{ $page->title }}</h1>
                        @if(isset($page->subtitle) && $page->subtitle)
                        <p class="mt-2 text-lg text-slate-600 dark:text-slate-300 leading-relaxed">
                            {{ $page->subtitle }}
                        </p>
                        @endif
                    </div>
                </div>
            </header>
            
            <!-- Page content -->
            <div class="w-full bg-white dark:bg-slate-800 rounded-xl shadow-lg p-6 sm:p-8 mb-12">
                <div class="prose dark:prose-invert prose-slate prose-lg max-w-none prose-headings:font-bold prose-h2:text-2xl prose-h3:text-xl prose-a:text-emerald-600 dark:prose-a:text-emerald-400 prose-img:rounded-lg prose-img:shadow-md">
                    {!! $page->content !!}
                </div>
            </div>
            
            <!-- Related content or CTA -->
            @if(isset($relatedPages) && count($relatedPages) > 0)
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-6">Related Pages</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($relatedPages as $relatedPage)
                    <a href="{{ route('pages.show', $relatedPage->slug) }}" class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 p-6 hover:shadow-lg transition-shadow">
                        <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-2">{{ $relatedPage->title }}</h3>
                        <p class="text-slate-600 dark:text-slate-300">{{ Str::limit(strip_tags($relatedPage->content), 100) }}</p>
                    </a>
                    @endforeach
                </div>
            </div>
            @else
            <div class="bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-slate-800 dark:to-slate-800/50 rounded-2xl p-8 md:p-10 mt-12 relative overflow-hidden">
                <div class="absolute right-0 top-0 opacity-10">
                    <svg width="230" height="230" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 2H7C4.23858 2 2 4.23858 2 7V17C2 19.7614 4.23858 22 7 22H17C19.7614 22 22 19.7614 22 17V7C22 4.23858 19.7614 2 17 2Z" stroke="currentColor" stroke-width="1.5" />
                        <path d="M12 16V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M12 8V8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-2">Need more information?</h3>
                        <p class="text-slate-600 dark:text-slate-300">Check out our FAQ or contact our support team for any questions.</p>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('faq') }}" class="px-6 py-3 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-white font-medium rounded-lg transition-colors shadow-sm hover:bg-slate-50 dark:hover:bg-slate-600 whitespace-nowrap">
                            Read FAQ
                        </a>
                        <a href="{{ route('contact') }}" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors shadow-sm whitespace-nowrap">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection 