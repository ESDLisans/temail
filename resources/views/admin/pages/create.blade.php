@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Create Page</h1>
        <a href="{{ route('admin.pages.index') }}" class="px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-700">
            Back to Pages
        </a>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <form action="{{ route('admin.pages.store') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                            placeholder="Page Title">
                    </div>
                    
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                /
                            </span>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" 
                                placeholder="page-slug">
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            Leave empty to automatically generate from title
                        </p>
                    </div>
                    
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content" id="content" rows="15" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('content') }}</textarea>
                    </div>
                    
                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" rows="2"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Brief description for search engines">{{ old('meta_description') }}</textarea>
                    </div>
                    
                    <div>
                        <label for="meta_keywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                        <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords') }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                            placeholder="keyword1, keyword2, keyword3">
                    </div>
                    
                    <div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="is_published" name="is_published" type="checkbox" value="1" 
                                    {{ old('is_published', '1') == '1' ? 'checked' : '' }}
                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="is_published" class="font-medium text-gray-700">Published</label>
                                <p class="text-gray-500">Make this page visible to users</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create Page
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        
        titleInput.addEventListener('input', function() {
            if (!slugInput.value) {
                const slug = titleInput.value
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/--+/g, '-')
                    .trim();
                slugInput.value = slug;
            }
        });
    });
</script>
@endpush 