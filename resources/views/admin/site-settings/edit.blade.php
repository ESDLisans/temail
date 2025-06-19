<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }} {{ ucfirst(str_replace('_', ' ', $group)) }} {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('admin.site-settings.update', $group) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-6">
                            @foreach($settings as $setting)
                                <div class="relative">
                                    <label for="{{ $setting->key }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 block mb-1">
                                        {{ ucfirst(str_replace(['_', $group . '.'], [' ', ''], $setting->key)) }}
                                        @if($setting->required)
                                            <span class="text-red-500">*</span>
                                        @endif
                                    </label>
                                    
                                    @if($setting->type === 'text')
                                        <input type="text" 
                                            name="settings[{{ $setting->key }}]" 
                                            id="{{ $setting->key }}" 
                                            value="{{ old('settings.' . $setting->key, $setting->value) }}" 
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md"
                                            @if($setting->required) required @endif>
                                    @elseif($setting->type === 'textarea')
                                        <textarea
                                            name="settings[{{ $setting->key }}]" 
                                            id="{{ $setting->key }}" 
                                            rows="4"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md"
                                            @if($setting->required) required @endif>{{ old('settings.' . $setting->key, $setting->value) }}</textarea>
                                    @elseif($setting->type === 'boolean')
                                        <div class="flex items-center">
                                            <input type="checkbox" 
                                                name="settings[{{ $setting->key }}]" 
                                                id="{{ $setting->key }}" 
                                                value="1" 
                                                @if(old('settings.' . $setting->key, $setting->value)) checked @endif
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                            <label for="{{ $setting->key }}" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                                                {{ __('Enabled') }}
                                            </label>
                                        </div>
                                    @elseif($setting->type === 'number')
                                        <input type="number" 
                                            name="settings[{{ $setting->key }}]" 
                                            id="{{ $setting->key }}" 
                                            value="{{ old('settings.' . $setting->key, $setting->value) }}" 
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md"
                                            @if($setting->required) required @endif>
                                    @elseif($setting->type === 'email')
                                        <input type="email" 
                                            name="settings[{{ $setting->key }}]" 
                                            id="{{ $setting->key }}" 
                                            value="{{ old('settings.' . $setting->key, $setting->value) }}" 
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md"
                                            @if($setting->required) required @endif>
                                    @elseif($setting->type === 'url')
                                        <input type="url" 
                                            name="settings[{{ $setting->key }}]" 
                                            id="{{ $setting->key }}" 
                                            value="{{ old('settings.' . $setting->key, $setting->value) }}" 
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md"
                                            @if($setting->required) required @endif>
                                    @elseif($setting->type === 'image')
                                        <div class="grid grid-cols-1 gap-4">
                                            @if(!empty($setting->value))
                                                <div class="mt-2 flex items-start space-x-4">
                                                    <img src="{{ Storage::url($setting->value) }}" alt="{{ $setting->key }}" class="max-h-36 object-contain rounded border border-gray-300 dark:border-gray-600">
                                                    <!-- Delete Form -->
                                                    <form action="{{ route('admin.site-settings.delete-image', $setting->key) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                            <input type="file" 
                                                name="settings[{{ $setting->key }}]" 
                                                id="{{ $setting->key }}" 
                                                accept="image/*"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md"
                                                @if($setting->required && empty($setting->value)) required @endif>
                                        </div>
                                    @elseif($setting->type === 'color')
                                        <input type="color" 
                                            name="settings[{{ $setting->key }}]" 
                                            id="{{ $setting->key }}" 
                                            value="{{ old('settings.' . $setting->key, $setting->value) }}" 
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full h-10 shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md"
                                            @if($setting->required) required @endif>
                                    @elseif($setting->type === 'select')
                                        <select name="settings[{{ $setting->key }}]" 
                                            id="{{ $setting->key }}" 
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md"
                                            @if($setting->required) required @endif>
                                            @if(isset($setting->options) && is_array($setting->options))
                                                @foreach($setting->options as $value => $label)
                                                    <option value="{{ $value }}" @if(old('settings.' . $setting->key, $setting->value) == $value) selected @endif>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    @endif
                                    
                                    @if(!empty($setting->description))
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ $setting->description }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="flex justify-between mt-8">
                            <a href="{{ route('admin.site-settings.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-500 active:bg-gray-500 dark:active:bg-gray-400 focus:outline-none focus:border-gray-500 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout> 