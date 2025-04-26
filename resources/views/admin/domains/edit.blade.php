@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Edit Domain</h1>
        <a href="{{ route('admin.domains.index') }}" class="px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-700">
            Back to Domains
        </a>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <form action="{{ route('admin.domains.update', $domain) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Domain Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $domain->name) }}" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                            placeholder="example.com">
                        <p class="mt-1 text-sm text-gray-500">
                            Enter the domain name without http:// or www (e.g., example.com)
                        </p>
                    </div>
                    
                    <div>
                        <label for="mx_record" class="block text-sm font-medium text-gray-700">MX Record</label>
                        <input type="text" name="mx_record" id="mx_record" value="{{ old('mx_record', $domain->mx_record) }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                            placeholder="mail.example.com">
                        <p class="mt-1 text-sm text-gray-500">
                            Optional: The mail exchange server for this domain
                        </p>
                    </div>
                    
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                        <textarea name="notes" id="notes" rows="3"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('notes', $domain->notes) }}</textarea>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ $domain->is_active ? 'checked' : '' }}
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_active" class="font-medium text-gray-700">Active</label>
                            <p class="text-gray-500">Enable this domain for temporary email generation</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Domain
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 