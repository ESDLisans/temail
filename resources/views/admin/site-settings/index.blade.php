<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Site Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">{{ __('Manage Site Settings') }}</h3>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                        @forelse($grouped_settings as $group => $settings)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                                <div class="p-4 bg-gray-50 dark:bg-gray-600 border-b border-gray-200 dark:border-gray-500">
                                    <h4 class="text-md font-medium text-gray-900 dark:text-gray-100">
                                        {{ ucfirst(str_replace('_', ' ', $group)) }}
                                    </h4>
                                </div>
                                <div class="p-4">
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                                        {{ __('Manage') }} {{ strtolower(str_replace('_', ' ', $group)) }} {{ __('settings') }}
                                    </p>
                                    <a href="{{ route('admin.site-settings.edit', $group) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        {{ __('Edit') }}
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full">
                                <p class="text-gray-600 dark:text-gray-300">{{ __('No settings available.') }}</p>
                                <a href="{{ route('admin.site-settings.create-defaults') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    {{ __('Create Default Settings') }}
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout> 