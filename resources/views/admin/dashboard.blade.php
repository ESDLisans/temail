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
                    <span class="font-medium text-gray-500">Auto-expire after 10 hours</span>
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

    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Installation Instructions
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Follow these steps to properly set up TempMail on your server.
            </p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <div class="space-y-6">
                <div>
                    <h4 class="text-md font-medium text-gray-900">Server Requirements</h4>
                    <ul class="mt-2 list-disc pl-5 text-sm text-gray-600 space-y-1">
                        <li>PHP 8.2 or higher</li>
                        <li>MySQL 5.7+ or MariaDB 10.3+</li>
                        <li>Composer 2.0+</li>
                        <li>PHP extensions: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML, IMAP</li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-md font-medium text-gray-900">Environment Setup</h4>
                    <ol class="mt-2 list-decimal pl-5 text-sm text-gray-600 space-y-1">
                        <li>Configure your <code class="bg-gray-100 px-1 py-0.5 rounded">.env</code> file with proper database credentials</li>
                        <li>Set <code class="bg-gray-100 px-1 py-0.5 rounded">QUEUE_CONNECTION=database</code> for email processing</li>
                        <li>Configure mail settings for proper notification delivery</li>
                    </ol>
                </div>

                <div>
                    <h4 class="text-md font-medium text-gray-900">cPanel Configuration</h4>
                    <p class="mt-2 text-sm text-gray-600">
                        If you're using cPanel, set up the following:
                    </p>
                    <ol class="mt-2 list-decimal pl-5 text-sm text-gray-600 space-y-1">
                        <li>Create a dedicated MySQL database and user for TempMail</li>
                        <li>Set up proper permissions on the storage directory: <code class="bg-gray-100 px-1 py-0.5 rounded">chmod -R 755 storage bootstrap/cache</code></li>
                        <li>Configure an SSL certificate for your domain</li>
                        <li>Set the document root to the <code class="bg-gray-100 px-1 py-0.5 rounded">public</code> folder of your Laravel installation</li>
                    </ol>
                </div>

                <div>
                    <h4 class="text-md font-medium text-gray-900">Required Cron Jobs</h4>
                    <p class="mt-2 text-sm text-gray-600">
                        Add the following cron jobs to your cPanel or server:
                    </p>
                    <div class="mt-2 bg-gray-50 p-3 rounded-md border border-gray-200 text-sm font-mono overflow-x-auto">
                        <p class="text-gray-700 mb-3">Main Laravel scheduler (runs all scheduled tasks):</p>
                        <pre class="text-gray-600">* * * * * cd /path/to/your/project && php artisan schedule:run >> /dev/null 2>&1</pre>
                        
                        <p class="text-gray-700 mt-4 mb-3">Queue worker (processes email fetching in background):</p>
                        <pre class="text-gray-600">* * * * * cd /path/to/your/project && php artisan queue:work --sleep=3 --tries=3 --max-time=3600 >> /dev/null 2>&1</pre>
                    </div>
                    <p class="mt-3 text-sm text-gray-600">
                        <strong>Note:</strong> Replace <code class="bg-gray-100 px-1 py-0.5 rounded">/path/to/your/project</code> with the actual path to your TempMail installation.
                    </p>
                </div>

                <div>
                    <h4 class="text-md font-medium text-gray-900">Important Commands</h4>
                    <ul class="mt-2 list-disc pl-5 text-sm text-gray-600 space-y-1">
                        <li>Run migrations: <code class="bg-gray-100 px-1 py-0.5 rounded">php artisan migrate</code></li>
                        <li>Clear cache: <code class="bg-gray-100 px-1 py-0.5 rounded">php artisan optimize:clear</code></li>
                        <li>Check email fetching: <code class="bg-gray-100 px-1 py-0.5 rounded">php artisan emails:fetch</code></li>
                        <li>Manual cleanup: <code class="bg-gray-100 px-1 py-0.5 rounded">php artisan emails:cleanup</code></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection 