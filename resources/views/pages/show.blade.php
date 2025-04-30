@extends('layouts.app')

@section('content')
    <x-temp-mail-header />

    @if($page)
        <div class="container mx-auto px-4 py-8 md:py-12">
            <div class="bg-white dark:bg-slate-950 shadow-md rounded-lg overflow-hidden border border-slate-200 dark:border-slate-800">
                <div class="p-6 md:p-8">
                    <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-6">{{ $page->title }}</h1>
                    
                    <div class="prose dark:prose-invert max-w-none prose-headings:text-slate-900 dark:prose-headings:text-white prose-p:text-slate-600 dark:prose-p:text-slate-300 prose-a:text-emerald-600 dark:prose-a:text-emerald-400 hover:prose-a:text-emerald-700 dark:hover:prose-a:text-emerald-300 prose-img:rounded-lg">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container mx-auto px-4 py-8 text-center">
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Page not found</h1>
            <p class="mt-4 text-slate-600 dark:text-slate-400">The page you are looking for does not exist.</p>
            <a href="{{ route('home') }}" class="mt-6 inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700">
                Return Home
            </a>
        </div>
    @endif

    <x-footer />
@endsection

@push('meta')
    @if($page)
        <meta name="description" content="{{ $page->meta_description ?? '' }}">
        <meta name="keywords" content="{{ $page->meta_keywords ?? '' }}">
    @endif
@endpush 