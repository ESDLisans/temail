@extends('layouts.admin')

@section('title', 'Edit Page')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    
    <!-- Page header -->
    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl font-bold">Edit Page: {{ $page->title }}</h1>
    </div>
    
    <!-- Form -->
    <div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mb-8">
        <div class="p-6">
            <form action="{{ route('admin.pages.update', $page) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium mb-1">Title <span class="text-rose-500">*</span></label>
                        <input id="title" name="title" class="form-input w-full" type="text" value="{{ old('title', $page->title) }}" required />
                        @error('title')
                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium mb-1">Slug</label>
                        <input id="slug" name="slug" class="form-input w-full" type="text" value="{{ old('slug', $page->slug) }}" />
                        <p class="text-xs text-slate-500 mt-1">URL-friendly name (e.g., "my-page-title")</p>
                        @error('slug')
                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Meta Title -->
                    <div>
                        <label for="meta_title" class="block text-sm font-medium mb-1">Meta Title</label>
                        <input id="meta_title" name="meta_title" class="form-input w-full" type="text" value="{{ old('meta_title', $page->meta_title) }}" />
                        <p class="text-xs text-slate-500 mt-1">SEO title for search engines (leave empty to use the page title)</p>
                        @error('meta_title')
                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Meta Description -->
                    <div>
                        <label for="meta_description" class="block text-sm font-medium mb-1">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" class="form-textarea w-full" rows="3">{{ old('meta_description', $page->meta_description) }}</textarea>
                        <p class="text-xs text-slate-500 mt-1">Short description for search engine results (150-160 characters)</p>
                        @error('meta_description')
                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-sm font-medium mb-1">Content <span class="text-rose-500">*</span></label>
                        <input id="content" type="hidden" name="content" value="{{ old('content', $page->content) }}">
                        <trix-editor input="content" class="form-input trix-content w-full"></trix-editor>
                        @error('content')
                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Status -->
                    <div>
                        <label class="flex items-center">
                            <input type="hidden" name="is_active" value="0" />
                            <input type="checkbox" name="is_active" class="form-checkbox" value="1" {{ old('is_active', $page->is_active) ? 'checked' : '' }} />
                            <span class="text-sm ml-2">Publish page (make active)</span>
                        </label>
                    </div>
                    
                    <!-- Submit buttons -->
                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.pages.index') }}" class="btn border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 hover:border-slate-300 dark:hover:border-slate-600">Cancel</a>
                        <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">Update Page</button>
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