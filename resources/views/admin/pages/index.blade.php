@extends('layouts.admin')

@section('title', 'Manage Pages')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    
    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-8">
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl font-bold">Pages</h1>
        </div>
        
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
            <a href="{{ route('admin.pages.create') }}" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
                <span class="hidden xs:block ml-2">Add Page</span>
            </a>
        </div>
    </div>
    
    <!-- Alert message -->
    @if (session('success'))
    <div x-data="{ open: true }" x-show="open" x-init="setTimeout(() => open = false, 5000)" class="p-4 mb-4 text-sm rounded-md bg-emerald-100 text-emerald-600">
        <div class="flex w-full justify-between">
            <div class="flex">
                <svg class="w-4 h-4 shrink-0 fill-current opacity-80 mt-[3px] mr-3" viewBox="0 0 16 16">
                    <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z" />
                </svg>
                <div>{{ session('success') }}</div>
            </div>
            <button @click="open = false" class="opacity-70 hover:opacity-80 ml-3 mt-[3px]">
                <div class="sr-only">Close</div>
                <svg class="w-4 h-4 fill-current">
                    <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                </svg>
            </button>
        </div>
    </div>
    @endif
    
    <!-- Main content -->
    <div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mb-8">
        <div class="p-3">
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50">
                        <tr>
                            <th class="px-2 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Title</div>
                            </th>
                            <th class="px-2 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Slug</div>
                            </th>
                            <th class="px-2 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Status</div>
                            </th>
                            <th class="px-2 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Last Updated</div>
                            </th>
                            <th class="px-2 py-3 whitespace-nowrap">
                                <div class="font-semibold text-right">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-slate-200 dark:divide-slate-700">
                        @forelse ($pages as $page)
                        <tr>
                            <td class="px-2 py-3 whitespace-nowrap">
                                <div class="font-medium text-slate-800 dark:text-slate-100">{{ $page->title }}</div>
                            </td>
                            <td class="px-2 py-3 whitespace-nowrap">
                                <div class="text-slate-500 dark:text-slate-400">{{ $page->slug }}</div>
                            </td>
                            <td class="px-2 py-3 whitespace-nowrap">
                                @if($page->is_active)
                                <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-400/30 dark:text-emerald-400">
                                    Published
                                </div>
                                @else
                                <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800 dark:bg-slate-700 dark:text-slate-400">
                                    Draft
                                </div>
                                @endif
                            </td>
                            <td class="px-2 py-3 whitespace-nowrap">
                                <div class="text-slate-500 dark:text-slate-400">{{ $page->updated_at->diffForHumans() }}</div>
                            </td>
                            <td class="px-2 py-3 whitespace-nowrap">
                                <div class="flex justify-end space-x-1">
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">
                                        <span class="sr-only">Edit</span>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16">
                                            <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-sm bg-rose-500 hover:bg-rose-600 text-white" onclick="return confirm('Are you sure you want to delete this page?')">
                                            <span class="sr-only">Delete</span>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16">
                                                <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-2 py-8 text-center text-slate-500 dark:text-slate-400">
                                No pages found. <a href="{{ route('admin.pages.create') }}" class="text-indigo-500 hover:text-indigo-600">Create your first page</a>.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 