@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    
    <!-- Page header -->
    <div class="mb-8">
        <div class="flex items-center space-x-3">
            <div class="h-10 w-10 rounded-lg bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">Edit Blog Post</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Update your blog post content and settings</p>
            </div>
        </div>
    </div>
    
    <!-- Form -->
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl border border-gray-200 dark:border-gray-700">
        <div class="p-6">
            <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium mb-1">Title <span class="text-rose-500">*</span></label>
                        <input id="title" name="title" class="form-input w-full" type="text" value="{{ old('title', $post->title) }}" required />
                        @error('title')
                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium mb-1">Slug</label>
                        <input id="slug" name="slug" class="form-input w-full" type="text" value="{{ old('slug', $post->slug) }}" />
                        <p class="text-xs text-slate-500 mt-1">URL-friendly name (e.g., "my-blog-post-title")</p>
                        @error('slug')
                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Featured Image -->
                    <div>
                        <label for="featured_image" class="block text-sm font-medium mb-1">Featured Image</label>
                        @if($post->featured_image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="max-w-full h-auto rounded-md shadow-sm" style="max-height: 200px;">
                            </div>
                        @endif
                        <input id="featured_image" name="featured_image" class="form-input w-full" type="file" accept="image/*" />
                        <p class="text-xs text-slate-500 mt-1">Recommended size: 1200x630px (2:1 ratio)</p>
                        @error('featured_image')
                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Excerpt -->
                    <div>
                        <label for="excerpt" class="block text-sm font-medium mb-1">Excerpt</label>
                        <textarea id="excerpt" name="excerpt" class="form-textarea w-full" rows="3">{{ old('excerpt', $post->excerpt) }}</textarea>
                        <p class="text-xs text-slate-500 mt-1">A short summary of the post (150-160 characters)</p>
                        @error('excerpt')
                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-sm font-medium mb-1">Content <span class="text-rose-500">*</span></label>
                        <input id="content" type="hidden" name="content" value="{{ old('content', $post->content) }}">
                        <trix-editor input="content" class="form-input trix-content w-full"></trix-editor>
                        @error('content')
                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- SEO Settings Section -->
                    <div class="border-t border-slate-200 dark:border-slate-700 pt-6">
                        <h3 class="text-lg font-medium mb-4">SEO Settings</h3>
                        
                        <!-- Meta Title -->
                        <div class="mb-4">
                            <label for="meta_title" class="block text-sm font-medium mb-1">Meta Title</label>
                            <input id="meta_title" name="meta_title" class="form-input w-full" type="text" value="{{ old('meta_title', $post->meta_title) }}" />
                            <p class="text-xs text-slate-500 mt-1">SEO title for search engines (50-60 characters)</p>
                        </div>
                        
                        <!-- Meta Description -->
                        <div class="mb-4">
                            <label for="meta_description" class="block text-sm font-medium mb-1">Meta Description</label>
                            <textarea id="meta_description" name="meta_description" class="form-textarea w-full" rows="3">{{ old('meta_description', $post->meta_description) }}</textarea>
                            <p class="text-xs text-slate-500 mt-1">SEO description for search engines (150-160 characters)</p>
                        </div>
                        
                        <!-- Meta Keywords -->
                        <div class="mb-4">
                            <label for="meta_keywords" class="block text-sm font-medium mb-1">Meta Keywords</label>
                            <input id="meta_keywords" name="meta_keywords" class="form-input w-full" type="text" value="{{ old('meta_keywords', $post->meta_keywords) }}" />
                            <p class="text-xs text-slate-500 mt-1">SEO keywords separated by commas</p>
                        </div>
                    </div>
                    
                    <!-- Status -->
                    <div>
                        <label class="flex items-center">
                            <input type="hidden" name="is_published" value="0" />
                            <input type="checkbox" name="is_published" class="form-checkbox" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }} />
                            <span class="text-sm ml-2">Publish post</span>
                        </label>
                    </div>
                    
                    <!-- Submit buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Update Post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generate slug from title (only if slug is empty)
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    
    titleInput.addEventListener('blur', function() {
        if (slugInput.value === '') {
            // Simple slug generation
            const slug = titleInput.value
                .toLowerCase()
                .replace(/[^\w\s-]/g, '')  // Remove special chars
                .replace(/\s+/g, '-')     // Replace spaces with dashes
                .replace(/-+/g, '-')      // Replace multiple dashes with single dash
                .trim();                   // Trim whitespace
            
            slugInput.value = slug;
        }
    });
});
</script>
@endpush 