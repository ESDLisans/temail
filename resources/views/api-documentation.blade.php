@extends('layouts.app')

@section('content')
    <x-temp-mail-header />

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white dark:bg-slate-950 shadow-md rounded-lg overflow-hidden border border-slate-200 dark:border-slate-800">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">TempMail API Documentation</h1>
                <p class="text-slate-600 dark:text-slate-400 mb-6">
                    Access our temporary email service programmatically with these API endpoints.
                </p>

                <div class="border-t border-slate-200 dark:border-slate-800 -mx-6 px-6 py-4">
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">API Base URL</h2>
                    <code class="block bg-slate-100 dark:bg-slate-800 p-3 rounded text-sm overflow-x-auto">
                        {{ url('/api/v1') }}
                    </code>
                </div>

                <div class="border-t border-slate-200 dark:border-slate-800 -mx-6 px-6 py-4">
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">Authentication</h2>
                    <p class="text-slate-600 dark:text-slate-400 mb-4">
                        Currently, the API does not require authentication. All endpoints accept query parameters to identify the temporary email.
                    </p>
                </div>

                <div class="border-t border-slate-200 dark:border-slate-800 -mx-6 px-6 py-4">
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">API Endpoints</h2>

                    <!-- Get Emails -->
                    <div class="mb-8">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">GET</span>
                            <h3 class="text-lg font-medium text-slate-900 dark:text-white">/emails</h3>
                        </div>
                        <p class="text-slate-600 dark:text-slate-400 mb-3">
                            Get all emails for a specified temporary email address.
                        </p>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Query Parameters</h4>
                            <ul class="list-disc ml-5 text-sm">
                                <li class="text-slate-600 dark:text-slate-400 mb-1"><code>email</code> (required) - The temporary email address</li>
                                <li class="text-slate-600 dark:text-slate-400 mb-1"><code>limit</code> (optional) - Number of emails per page (default: 20, max: 100)</li>
                                <li class="text-slate-600 dark:text-slate-400"><code>page</code> (optional) - Page number (default: 1)</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Example Request</h4>
                            <code class="block bg-slate-100 dark:bg-slate-800 p-3 rounded text-sm overflow-x-auto">
                                {{ url('/api/v1/emails?email=example@tempmail.com&limit=10&page=1') }}
                            </code>
                        </div>
                    </div>

                    <!-- Get One Message -->
                    <div class="mb-8">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">GET</span>
                            <h3 class="text-lg font-medium text-slate-900 dark:text-white">/messages/{id}</h3>
                        </div>
                        <p class="text-slate-600 dark:text-slate-400 mb-3">
                            Get a specific email message with its content and attachments.
                        </p>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Path Parameters</h4>
                            <ul class="list-disc ml-5 text-sm">
                                <li class="text-slate-600 dark:text-slate-400 mb-1"><code>id</code> - The email message ID</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Query Parameters</h4>
                            <ul class="list-disc ml-5 text-sm">
                                <li class="text-slate-600 dark:text-slate-400"><code>email</code> (required) - The temporary email address</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Example Request</h4>
                            <code class="block bg-slate-100 dark:bg-slate-800 p-3 rounded text-sm overflow-x-auto">
                                {{ url('/api/v1/messages/123?email=example@tempmail.com') }}
                            </code>
                        </div>
                    </div>

                    <!-- Delete Message -->
                    <div class="mb-8">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">GET</span>
                            <h3 class="text-lg font-medium text-slate-900 dark:text-white">/messages/{id}/delete</h3>
                        </div>
                        <p class="text-slate-600 dark:text-slate-400 mb-3">
                            Delete a specific email message.
                        </p>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Path Parameters</h4>
                            <ul class="list-disc ml-5 text-sm">
                                <li class="text-slate-600 dark:text-slate-400 mb-1"><code>id</code> - The email message ID</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Query Parameters</h4>
                            <ul class="list-disc ml-5 text-sm">
                                <li class="text-slate-600 dark:text-slate-400"><code>email</code> (required) - The temporary email address</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Example Request</h4>
                            <code class="block bg-slate-100 dark:bg-slate-800 p-3 rounded text-sm overflow-x-auto">
                                {{ url('/api/v1/messages/123/delete?email=example@tempmail.com') }}
                            </code>
                        </div>
                    </div>

                    <!-- Source Message -->
                    <div class="mb-8">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">GET</span>
                            <h3 class="text-lg font-medium text-slate-900 dark:text-white">/messages/{id}/source</h3>
                        </div>
                        <p class="text-slate-600 dark:text-slate-400 mb-3">
                            Get the source of an email message including headers and raw content.
                        </p>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Path Parameters</h4>
                            <ul class="list-disc ml-5 text-sm">
                                <li class="text-slate-600 dark:text-slate-400 mb-1"><code>id</code> - The email message ID</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Query Parameters</h4>
                            <ul class="list-disc ml-5 text-sm">
                                <li class="text-slate-600 dark:text-slate-400"><code>email</code> (required) - The temporary email address</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Example Request</h4>
                            <code class="block bg-slate-100 dark:bg-slate-800 p-3 rounded text-sm overflow-x-auto">
                                {{ url('/api/v1/messages/123/source?email=example@tempmail.com') }}
                            </code>
                        </div>
                    </div>

                    <!-- Get Message Attachments -->
                    <div class="mb-8">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">GET</span>
                            <h3 class="text-lg font-medium text-slate-900 dark:text-white">/messages/{id}/attachments</h3>
                        </div>
                        <p class="text-slate-600 dark:text-slate-400 mb-3">
                            Get all attachments for a specific email message.
                        </p>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Path Parameters</h4>
                            <ul class="list-disc ml-5 text-sm">
                                <li class="text-slate-600 dark:text-slate-400 mb-1"><code>id</code> - The email message ID</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Query Parameters</h4>
                            <ul class="list-disc ml-5 text-sm">
                                <li class="text-slate-600 dark:text-slate-400"><code>email</code> (required) - The temporary email address</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Example Request</h4>
                            <code class="block bg-slate-100 dark:bg-slate-800 p-3 rounded text-sm overflow-x-auto">
                                {{ url('/api/v1/messages/123/attachments?email=example@tempmail.com') }}
                            </code>
                        </div>
                    </div>

                    <!-- Get Message Attachments (Legacy) -->
                    <div class="mb-8">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">GET</span>
                            <h3 class="text-lg font-medium text-slate-900 dark:text-white">/messages/{id}/attachments/legacy</h3>
                        </div>
                        <p class="text-slate-600 dark:text-slate-400 mb-3">
                            Legacy endpoint for getting message attachments.
                        </p>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Path Parameters</h4>
                            <ul class="list-disc ml-5 text-sm">
                                <li class="text-slate-600 dark:text-slate-400 mb-1"><code>id</code> - The email message ID</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Query Parameters</h4>
                            <ul class="list-disc ml-5 text-sm">
                                <li class="text-slate-600 dark:text-slate-400"><code>email</code> (required) - The temporary email address</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Example Request</h4>
                            <code class="block bg-slate-100 dark:bg-slate-800 p-3 rounded text-sm overflow-x-auto">
                                {{ url('/api/v1/messages/123/attachments/legacy?email=example@tempmail.com') }}
                            </code>
                        </div>
                    </div>

                    <!-- Get One Attachment -->
                    <div class="mb-8">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">GET</span>
                            <h3 class="text-lg font-medium text-slate-900 dark:text-white">/attachments/{id}</h3>
                        </div>
                        <p class="text-slate-600 dark:text-slate-400 mb-3">
                            Get a specific attachment file.
                        </p>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Path Parameters</h4>
                            <ul class="list-disc ml-5 text-sm">
                                <li class="text-slate-600 dark:text-slate-400 mb-1"><code>id</code> - The attachment ID</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Query Parameters</h4>
                            <ul class="list-disc ml-5 text-sm">
                                <li class="text-slate-600 dark:text-slate-400 mb-1"><code>email</code> (required) - The temporary email address</li>
                                <li class="text-slate-600 dark:text-slate-400"><code>download</code> (optional) - Set to true to download the file instead of viewing it (default: false)</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Example Request</h4>
                            <code class="block bg-slate-100 dark:bg-slate-800 p-3 rounded text-sm overflow-x-auto">
                                {{ url('/api/v1/attachments/123?email=example@tempmail.com&download=true') }}
                            </code>
                        </div>
                    </div>

                    <!-- Get Domains List -->
                    <div class="mb-8">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">GET</span>
                            <h3 class="text-lg font-medium text-slate-900 dark:text-white">/domains</h3>
                        </div>
                        <p class="text-slate-600 dark:text-slate-400 mb-3">
                            Get a list of all available domains for temporary email creation.
                        </p>
                        <div class="mb-3">
                            <h4 class="font-medium text-slate-900 dark:text-white mb-1">Example Request</h4>
                            <code class="block bg-slate-100 dark:bg-slate-800 p-3 rounded text-sm overflow-x-auto">
                                {{ url('/api/v1/domains') }}
                            </code>
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-200 dark:border-slate-800 -mx-6 px-6 py-4">
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">Response Format</h2>
                    <p class="text-slate-600 dark:text-slate-400 mb-3">
                        All API responses are in JSON format with the following structure:
                    </p>
                    <pre class="bg-slate-100 dark:bg-slate-800 p-3 rounded text-sm overflow-x-auto mb-4">
{
    "success": true, // boolean indicating success or failure
    "data": {        // present only for successful responses
        // response data
    },
    "message": ""    // error message (present only for failures)
}
                    </pre>
                </div>

                <div class="border-t border-slate-200 dark:border-slate-800 -mx-6 px-6 py-4">
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">Error Codes</h2>
                    <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                        <thead>
                            <tr>
                                <th class="px-3 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">Status Code</th>
                                <th class="px-3 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">Description</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                            <tr class="text-slate-600 dark:text-slate-400">
                                <td class="px-3 py-3 text-sm">200</td>
                                <td class="px-3 py-3 text-sm">Successful request</td>
                            </tr>
                            <tr class="text-slate-600 dark:text-slate-400">
                                <td class="px-3 py-3 text-sm">400</td>
                                <td class="px-3 py-3 text-sm">Bad request - validation error</td>
                            </tr>
                            <tr class="text-slate-600 dark:text-slate-400">
                                <td class="px-3 py-3 text-sm">404</td>
                                <td class="px-3 py-3 text-sm">Not found - email address, message, or attachment not found</td>
                            </tr>
                            <tr class="text-slate-600 dark:text-slate-400">
                                <td class="px-3 py-3 text-sm">500</td>
                                <td class="px-3 py-3 text-sm">Server error</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
@endsection 