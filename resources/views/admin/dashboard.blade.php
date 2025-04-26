@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">Total Domains</dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $stats['total_domains'] }}</dd>
                </dl>
            </div>
            <div class="bg-gray-50 px-4 py-4 sm:px-6">
                <div class="text-sm">
                    <a href="{{ route('admin.domains.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        View all domains
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">Active Temporary Emails</dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $stats['active_temp_emails'] }}</dd>
                </dl>
            </div>
            <div class="bg-gray-50 px-4 py-4 sm:px-6">
                <div class="text-sm">
                    <span class="font-medium text-gray-500">Auto-expire after 15 min</span>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">Emails Today</dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $stats['messages_today'] }}</dd>
                </dl>
            </div>
            <div class="bg-gray-50 px-4 py-4 sm:px-6">
                <div class="text-sm">
                    <span class="font-medium text-gray-500">Total: {{ $stats['total_messages'] }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Recent Email Messages
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                The 10 most recent email messages received.
            </p>
        </div>
        <div class="border-t border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Temporary Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                From
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subject
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Received
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($recentMessages as $message)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $message->temporaryEmail->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $message->from }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $message->subject }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $message->received_at->diffForHumans() }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    No email messages found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection 