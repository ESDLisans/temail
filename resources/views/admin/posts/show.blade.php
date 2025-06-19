@extends('layouts.admin')

@section('title', $post->title)

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    
    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-8">
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl font-bold">{{ $post->title }}</h1>
            <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                Posted {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }} 
                by {{ $post->author->name ?? 'Unknown' }}
            </div>
        </div>
        
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
            <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="btn bg-emerald-500 hover:bg-emerald-600 text-white">
                <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
                <span class="hidden xs:block ml-2">View on Site</span>
            </a>
            <a href="{{ route('admin.posts.edit', $post) }}" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                    <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                </svg>
                <span class="hidden xs:block ml-2">Edit</span>
            </a>
            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn bg-rose-500 hover:bg-rose-600 text-white" onclick="return confirm('Are you sure you want to delete this post?')">
                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                    </svg>
                    <span class="hidden xs:block ml-2">Delete</span>
                </button>
            </form>
        </div>
    </div>
    
    <!-- Post content -->
    <div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mb-8">
        @if($post->featured_image)
        <div class="w-full">
            <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover rounded-t-sm" style="max-height: 400px;">
        </div>
        @endif
        
        <div class="p-6">
            @if($post->excerpt)
            <div class="mb-6 text-lg italic text-slate-600 dark:text-slate-300 border-l-4 border-indigo-500 pl-4 py-2 bg-slate-50 dark:bg-slate-700/30 rounded">
                {{ $post->excerpt }}
            </div>
            @endif
            
            <div class="prose dark:prose-invert max-w-none">
                {!! $post->content !!}
            </div>
        </div>
    </div>
    
    <!-- Post details -->
    <div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mb-8">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-4">Post Details</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase mb-2">General Information</h3>
                    <ul class="space-y-2">
                        <li class="flex justify-between">
                            <span class="font-medium">Status:</span>
                            <span class="text-right">
                                @if($post->is_published)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-400/30 dark:text-emerald-400">
                                    Published
                                </span>
                                @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800 dark:bg-slate-700 dark:text-slate-400">
                                    Draft
                                </span>
                                @endif
                            </span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium">URL Slug:</span>
                            <span class="text-right text-slate-600 dark:text-slate-300">{{ $post->slug }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium">Author:</span>
                            <span class="text-right text-slate-600 dark:text-slate-300">{{ $post->author->name ?? 'Unknown' }}</span>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase mb-2">Time Information</h3>
                    <ul class="space-y-2">
                        <li class="flex justify-between">
                            <span class="font-medium">Created At:</span>
                            <span class="text-right text-slate-600 dark:text-slate-300">{{ $post->created_at->format('M d, Y H:i') }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium">Last Updated:</span>
                            <span class="text-right text-slate-600 dark:text-slate-300">{{ $post->updated_at->format('M d, Y H:i') }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium">Published At:</span>
                            <span class="text-right text-slate-600 dark:text-slate-300">
                                {{ $post->published_at ? $post->published_at->format('M d, Y H:i') : 'Not published' }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 