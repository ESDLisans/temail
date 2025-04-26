@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Add Ad Slot</h1>
        <a href="{{ route('admin.ad-slots.index') }}" class="px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-700">
            Back to Ad Slots
        </a>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <form action="{{ route('admin.ad-slots.store') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                            placeholder="Header Banner">
                        <p class="mt-1 text-sm text-gray-500">
                            Descriptive name for this ad slot
                        </p>
                    </div>
                    
                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                        <select name="position" id="position" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @foreach($positions as $value => $label)
                                <option value="{{ $value }}" {{ old('position') == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        <p class="mt-1 text-sm text-gray-500">
                            Where this ad will appear on the site
                        </p>
                    </div>
                    
                    <div>
                        <label for="ad_code" class="block text-sm font-medium text-gray-700">Ad Code</label>
                        <textarea name="ad_code" id="ad_code" rows="6" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md font-mono">{{ old('ad_code') }}</textarea>
                        <p class="mt-1 text-sm text-gray-500">
                            Paste your ad code here (Google Ads, AdSense, etc.)
                        </p>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="is_active" id="is_active" value="1" checked
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_active" class="font-medium text-gray-700">Active</label>
                            <p class="text-gray-500">Enable this ad to be shown on the site</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Ad Slot
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 