@extends('layouts.app')

@section('title', 'Blog - Latest News & Tips | TempMail')
@section('meta_description', 'Read the latest news, tips, and guides about temporary email services, online privacy, and digital security. Stay updated with TempMail blog.')
@section('canonical', route('blog.index'))

@section('content')
<div class="bg-gradient-to-b from-slate-50 to-white dark:from-slate-900 dark:to-slate-800 py-16 md:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-12 max-w-6xl mx-auto">
            <div class="w-full relative bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm p-6 sm:p-8">
                <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-emerald-500 to-teal-500 rounded-l-xl"></div>
                <div class="space-y-4">
                    <div class="text-emerald-600 dark:text-emerald-400 text-sm font-medium flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        Latest Articles
                    </div>
                    <div>
                        <h1 class="text-3xl sm:text-4xl font-bold text-slate-800 dark:text-white leading-snug">Our Blog</h1>
                        <p class="mt-2 text-lg text-slate-600 dark:text-slate-300 leading-relaxed">
                            Latest articles, news, and updates about temp mail and online privacy
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Blog posts grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @forelse ($posts as $post)
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col h-full border border-slate-200 dark:border-slate-700">
                @if ($post->featured_image)
                <a href="{{ route('blog.show', $post->slug) }}" class="block overflow-hidden h-52 relative">
                    <img 
                        src="{{ asset($post->featured_image) }}" 
                        alt="{{ $post->title }}" 
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                    >
                    @if($post->is_featured)
                    <div class="absolute top-3 right-3">
                        <span class="bg-emerald-600/90 text-white text-xs px-2 py-1 rounded-md font-medium">Featured</span>
                    </div>
                    @endif
                </a>
                @endif
                
                <div class="p-6 md:p-7 flex-grow">
                    <div class="flex items-center mb-4">
                        <span class="text-xs text-slate-500 dark:text-slate-400">
                            {{ $post->published_at->format('M d, Y') }}
                        </span>
                        <span class="mx-2 text-slate-300 dark:text-slate-600">•</span>
                        <span class="text-xs text-slate-500 dark:text-slate-400">
                            {{ $post->author->name ?? 'Team' }}
                        </span>
                    </div>
                    
                    <h2 class="text-xl font-bold mb-3 text-slate-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h2>
                    
                    @if ($post->excerpt)
                    <p class="text-slate-600 dark:text-slate-300 mb-4 line-clamp-3 leading-relaxed">
                        {{ $post->excerpt }}
                    </p>
                    @else
                    <p class="text-slate-600 dark:text-slate-300 mb-4 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($post->content), 150) }}
                    </p>
                    @endif
                </div>
                
                <div class="px-6 pb-6 mt-auto">
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-sm font-medium text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 flex items-center group">
                        Read more
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="ml-1 w-4 h-4 group-hover:translate-x-0.5 transition-transform">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20">
                <div class="text-center max-w-md mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-slate-300 dark:text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <h2 class="mt-6 text-2xl font-bold text-slate-700 dark:text-slate-300">No blog posts yet</h2>
                    <p class="mt-3 text-slate-500 dark:text-slate-400 leading-relaxed">Check back soon for new articles and updates about temporary email services and online privacy.</p>
                </div>
            </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        <div class="mt-16">
            {{ $posts->links() }}
        </div>
        
        <!-- Newsletter Signup -->
        <div class="mt-24 max-w-4xl mx-auto">
            <div class="bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-slate-800 dark:to-slate-800/50 rounded-2xl p-8 md:p-10 relative overflow-hidden">
                <div class="absolute right-0 top-0 opacity-10">
                    <svg width="230" height="230" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                </div>
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-2">Subscribe to our newsletter</h3>
                        <p class="text-slate-600 dark:text-slate-300">Get the latest updates, news and tips straight to your inbox.</p>
                    </div>
                    <div class="w-full md:w-auto">
                        <form class="flex">
                            <input type="email" placeholder="Your email address" class="flex-1 min-w-0 px-4 py-3 rounded-l-lg border border-slate-300 dark:border-slate-600 shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white dark:bg-slate-700 text-slate-900 dark:text-white">
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-3 border border-transparent font-medium rounded-r-lg text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors shadow-sm whitespace-nowrap">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 