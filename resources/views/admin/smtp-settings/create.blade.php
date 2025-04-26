@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Add SMTP Setting</h1>
        <a href="{{ route('admin.smtp-settings.index') }}" class="px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-700">
            Back to SMTP Settings
        </a>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <form action="{{ route('admin.smtp-settings.store') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="host" class="block text-sm font-medium text-gray-700">SMTP Host</label>
                        <input type="text" name="host" id="host" value="{{ old('host') }}" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                            placeholder="smtp.example.com">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="port" class="block text-sm font-medium text-gray-700">Port</label>
                            <input type="number" name="port" id="port" value="{{ old('port', 587) }}" required
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        
                        <div>
                            <label for="encryption" class="block text-sm font-medium text-gray-700">Encryption</label>
                            <select name="encryption" id="encryption" required
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value="tls" {{ old('encryption') == 'tls' ? 'selected' : '' }}>TLS</option>
                                <option value="ssl" {{ old('encryption') == 'ssl' ? 'selected' : '' }}>SSL</option>
                                <option value="none" {{ old('encryption') == 'none' ? 'selected' : '' }}>None</option>
                            </select>
                        </div>
                    </div>
                    
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                            placeholder="user@example.com">
                    </div>
                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <p class="mt-1 text-sm text-gray-500">Password will be stored encrypted</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="from_address" class="block text-sm font-medium text-gray-700">From Address (Optional)</label>
                            <input type="email" name="from_address" id="from_address" value="{{ old('from_address') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                                placeholder="noreply@example.com">
                        </div>
                        
                        <div>
                            <label for="from_name" class="block text-sm font-medium text-gray-700">From Name (Optional)</label>
                            <input type="text" name="from_name" id="from_name" value="{{ old('from_name') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                                placeholder="Example Mail Service">
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="is_active" id="is_active" value="1" checked
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_active" class="font-medium text-gray-700">Active</label>
                            <p class="text-gray-500">Only one SMTP connection can be active at a time</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save SMTP Setting
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 