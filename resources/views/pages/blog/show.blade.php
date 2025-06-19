@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title . ' | TempMail Blog')
@section('meta_description', $post->meta_description ?: ($post->excerpt ?? Str::limit(strip_tags($post->content), 160)))
@section('meta_keywords', $post->meta_keywords)
@section('canonical', route('blog.show', $post->slug))

@push('meta')
<!-- Open Graph -->
<meta property="og:title" content="{{ $post->meta_title ?: $post->title }}">
<meta property="og:description" content="{{ $post->meta_description ?: ($post->excerpt ?? Str::limit(strip_tags($post->content), 160)) }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ route('blog.show', $post->slug) }}">
@if($post->featured_image)
<meta property="og:image" content="{{ asset('storage/' . $post->featured_image) }}">
@endif
<meta property="article:published_time" content="{{ $post->published_at->toISOString() }}">
<meta property="article:modified_time" content="{{ $post->updated_at->toISOString() }}">
@if($post->author)
<meta property="article:author" content="{{ $post->author->name }}">
@endif

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $post->meta_title ?: $post->title }}">
<meta name="twitter:description" content="{{ $post->meta_description ?: ($post->excerpt ?? Str::limit(strip_tags($post->content), 160)) }}">
@if($post->featured_image)
<meta name="twitter:image" content="{{ asset('storage/' . $post->featured_image) }}">
@endif

<!-- Article Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "{{ $post->title }}",
  "description": "{{ $post->meta_description ?: ($post->excerpt ?? Str::limit(strip_tags($post->content), 160)) }}",
  "author": {
    "@type": "Person",
    "name": "{{ $post->author->name ?? 'TempMail Team' }}"
  },
  "datePublished": "{{ $post->published_at->toISOString() }}",
  "dateModified": "{{ $post->updated_at->toISOString() }}",
  "publisher": {
    "@type": "Organization",
    "name": "TempMail",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('logo-light.svg') }}"
    }
  },
  @if($post->featured_image)
  "image": "{{ asset($post->featured_image) }}",
  @endif
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ route('blog.show', $post->slug) }}"
  }
}
</script>
@endpush

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
                <a href="{{ route('blog.index') }}" class="text-slate-500 hover:text-emerald-600 dark:text-slate-400 dark:hover:text-emerald-400 transition-colors">Blog</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-slate-400 dark:text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-slate-700 dark:text-slate-300 font-medium truncate">{{ $post->title }}</span>
            </div>
            
            <!-- Post header -->
            <header class="mb-10 w-full relative bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm p-6 sm:p-8">
                <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-emerald-500 to-teal-500 rounded-l-xl"></div>
                <div class="space-y-4">
                    @if(isset($post->category) && $post->category)
                    <div class="text-emerald-600 dark:text-emerald-400 text-sm font-medium flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        {{ $post->category }}
                    </div>
                    @endif
                    <div>
                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-slate-800 dark:text-white leading-snug">{{ $post->title }}</h1>
                    </div>
                    <div class="flex items-center text-sm text-slate-500 dark:text-slate-400 border-t border-slate-100 dark:border-slate-700 pt-4">
                        <time datetime="{{ $post->published_at->format('Y-m-d') }}" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ $post->published_at->format('F j, Y') }}
                        </time>
                        <span class="mx-2">•</span>
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            {{ $post->author->name ?? 'Team' }}
                        </span>
                        @if($post->reading_time)
                        <span class="mx-2">•</span>
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $post->reading_time }} min read
                        </span>
                        @endif
                    </div>
                </div>
            </header>
            
            <!-- Featured image -->
            @if($post->featured_image)
            <div class="mb-10 w-full rounded-xl overflow-hidden shadow-lg">
                <img 
                    src="{{ asset($post->featured_image) }}" 
                    alt="{{ $post->title }}" 
                    class="w-full h-auto object-cover"
                    style="max-height: 400px;"
                >
            </div>
            @endif
            
            <!-- Top Ad Slot -->
            @php
                $topAd = \App\Models\AdSlot::where('position', 'blog_top')
                    ->where('is_active', true)
                    ->first();
            @endphp
            @if($topAd)
            <div class="mb-8 w-full text-center bg-white dark:bg-slate-800 rounded-xl shadow-md p-4 border border-slate-200 dark:border-slate-700">
                {!! $topAd->ad_code !!}
            </div>
            @endif
            
            <!-- Post content -->
            <div class="w-full bg-white dark:bg-slate-800 rounded-xl shadow-lg p-6 sm:p-8 mb-12 border border-slate-200 dark:border-slate-700">
                @if($post->excerpt)
                <div class="text-lg mb-8 font-medium text-slate-600 dark:text-slate-300 border-l-4 border-emerald-500 pl-4 py-2 bg-slate-50 dark:bg-slate-700/30 rounded-r-lg">
                    {{ $post->excerpt }}
                </div>
                @endif
                
                <div class="prose dark:prose-invert lg:prose-lg max-w-none prose-headings:font-bold prose-a:text-emerald-600 dark:prose-a:text-emerald-400 prose-img:rounded-xl prose-img:shadow-md">
                    <style>
                        .prose a[style*="background-color"] {
                            color: white !important;
                            text-decoration: none !important;
                        }
                        .prose a[style*="background-color"]:hover {
                            transform: translateY(-1px);
                            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
                        }
                    </style>
                    @php
                        $content = $post->content;
                        $middleAd = \App\Models\AdSlot::where('position', 'blog_middle')
                            ->where('is_active', true)
                            ->first();
                        
                        if($middleAd) {
                            // Split content into paragraphs
                            $paragraphs = preg_split('/(<\/p>\s*<p[^>]*>)/i', $content, -1, PREG_SPLIT_DELIM_CAPTURE);
                            $totalParagraphs = count($paragraphs);
                            $middleIndex = intval($totalParagraphs / 2);
                            
                            // Show first half
                            for($i = 0; $i < $middleIndex; $i++) {
                                echo $paragraphs[$i];
                            }
                            
                            // Show middle ad
                            echo '</div><div class="my-10 text-center bg-slate-50 dark:bg-slate-700/30 rounded-xl p-6 border border-slate-200 dark:border-slate-600">';
                            echo $middleAd->ad_code;
                            echo '</div><div class="prose dark:prose-invert lg:prose-lg max-w-none prose-headings:font-bold prose-a:text-emerald-600 dark:prose-a:text-emerald-400 prose-img:rounded-xl prose-img:shadow-md">
                            <style>
                                .prose a[style*="background-color"] {
                                    color: white !important;
                                    text-decoration: none !important;
                                }
                                .prose a[style*="background-color"]:hover {
                                    transform: translateY(-1px);
                                    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
                                }
                            </style>';
                            
                            // Show second half
                            for($i = $middleIndex; $i < $totalParagraphs; $i++) {
                                echo $paragraphs[$i];
                            }
                        } else {
                            echo $content;
                        }
                    @endphp
                </div>
                
                <!-- Post Footer -->
                <div class="mt-10 pt-8 border-t border-slate-200 dark:border-slate-700">
                    <!-- Tags if applicable -->
                    @if(isset($post->tags) && count($post->tags) > 0)
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($post->tags as $tag)
                        <a href="{{ route('blog.tag', $tag->slug) }}" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-800 hover:bg-slate-200 dark:bg-slate-700 dark:text-slate-200 dark:hover:bg-slate-600 transition-colors">
                            #{{ $tag->name }}
                        </a>
                        @endforeach
                    </div>
                    @endif
                    
                    <!-- Sharing -->
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-2">Share this article</p>
                            <div class="flex space-x-3">
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}" target="_blank" class="text-slate-400 hover:text-blue-500 dark:hover:text-blue-400 transition-colors">
                                    <span class="sr-only">Share on Twitter</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                    </svg>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" class="text-slate-400 hover:text-blue-700 dark:hover:text-blue-500 transition-colors">
                                    <span class="sr-only">Share on Facebook</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a href="mailto:?subject={{ urlencode($post->title) }}&body={{ urlencode('Check out this article: ' . route('blog.show', $post->slug)) }}" class="text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-500 transition-colors">
                                    <span class="sr-only">Share by Email</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @if(isset($post->author) && $post->author)
                        <div class="flex items-center">
                            @if($post->author->avatar)
                            <img src="{{ Storage::url($post->author->avatar) }}" alt="{{ $post->author->name }}" class="h-8 w-8 rounded-full mr-2 object-cover"> 
                            @endif
                            <span class="text-sm text-slate-500 dark:text-slate-400">
                                Written by <span class="font-semibold text-slate-700 dark:text-slate-300">{{ $post->author->name }}</span>
                            </span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Bottom Ad Slot -->
            @php
                $bottomAd = \App\Models\AdSlot::where('position', 'blog_bottom')
                    ->where('is_active', true)
                    ->first();
            @endphp
            @if($bottomAd)
            <div class="mb-12 text-center bg-white dark:bg-slate-800 rounded-xl shadow-md p-4 border border-slate-200 dark:border-slate-700">
                {!! $bottomAd->ad_code !!}
            </div>
            @endif
            
            <!-- Related posts -->
            @php
                $relatedPosts = \App\Models\Post::where('is_published', true)
                    ->where('id', '!=', $post->id)
                    ->latest()
                    ->limit(3)
                    ->get();
            @endphp
            @if($relatedPosts->count() > 0)
            <div class="mb-16">
                <h2 class="text-2xl font-bold mb-8 text-slate-800 dark:text-white">Related Articles</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $relatedPost)
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col h-full border border-slate-200 dark:border-slate-700">
                        @if($relatedPost->featured_image)
                        <a href="{{ route('blog.show', $relatedPost->slug) }}" class="block overflow-hidden h-40">
                            <img 
                                src="{{ asset($relatedPost->featured_image) }}" 
                                alt="{{ $relatedPost->title }}" 
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                            >
                        </a>
                        @endif
                        
                        <div class="p-5 flex-grow">
                            <div class="text-xs text-slate-500 dark:text-slate-400 mb-2">
                                {{ $relatedPost->published_at->format('M d, Y') }}
                            </div>
                            
                            <h3 class="text-lg font-bold mb-2 text-slate-800 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                                <a href="{{ route('blog.show', $relatedPost->slug) }}">{{ $relatedPost->title }}</a>
                            </h3>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- CTA Section -->
            <div class="mb-12">
                <div class="bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 border border-emerald-200 dark:border-emerald-800 p-8 rounded-2xl text-center">
                    <div class="max-w-2xl mx-auto">
                        <h3 class="text-2xl font-bold text-emerald-800 dark:text-emerald-200 mb-3">
                            🚀 Ready to Protect Your Privacy?
                        </h3>
                        <p class="text-emerald-700 dark:text-emerald-300 mb-6 text-lg">
                            Start using our secure temporary email service now. No registration required, completely free!
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                            <a href="{{ url('/') }}" class="inline-flex items-center justify-center px-8 py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Generate Free Temp Mail
                            </a>
                            <div class="flex items-center text-emerald-600 dark:text-emerald-400 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                100% Secure & Private
                            </div>
                        </div>
                        <div class="mt-6 flex flex-wrap justify-center gap-6 text-sm text-emerald-600 dark:text-emerald-400">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                10-Hour Duration
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                No Registration
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                SSL Encrypted
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back to blog -->
            <div class="text-center">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center px-6 py-3 bg-slate-600 hover:bg-slate-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                    </svg>
                    Back to Blog
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 