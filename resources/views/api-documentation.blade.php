@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">TempMail API Documentation</h1>
        
        <div class="mb-10">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Overview</h2>
            <p class="text-gray-700 dark:text-gray-300 mb-4">
                The TempMail API allows you to programmatically manage temporary email addresses and incoming emails. 
                All API endpoints follow RESTful principles and respond in JSON format.
            </p>
            
            <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4 mb-6">
                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200 mb-2">Base URL</h3>
                <code class="block bg-gray-800 dark:bg-gray-900 text-green-400 p-3 rounded">{{ url('/api/v1') }}</code>
            </div>
            
            <div class="bg-yellow-50 dark:bg-yellow-900/30 border-l-4 border-yellow-400 dark:border-yellow-500 p-4 mb-6">
                <p class="text-yellow-800 dark:text-yellow-200">
                    <strong>Note:</strong> API requests are subject to rate limits (30 requests/minute).
                    Check the <code class="bg-yellow-100 dark:bg-yellow-900 px-1 py-0.5 rounded">X-RateLimit-Remaining</code> field in response headers to monitor your remaining requests.
                </p>
            </div>
        </div>
        
        <div class="mb-10">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Endpoints</h2>
            
            <!-- Emails endpoint -->
            <div class="border dark:border-gray-700 rounded-lg mb-6 overflow-hidden">
                <div class="bg-blue-50 dark:bg-blue-900/30 px-6 py-4 border-b dark:border-gray-700">
                    <h3 class="text-xl font-medium text-blue-800 dark:text-blue-300">Get Emails</h3>
                    <div class="flex items-center mt-2">
                        <span class="bg-green-500 dark:bg-green-600 text-white px-3 py-1 rounded-md text-sm mr-3">GET</span>
                        <code class="text-blue-700 dark:text-blue-300">/emails?email={email}&limit={limit}&page={page}</code>
                    </div>
                </div>
                <div class="p-6 bg-white dark:bg-gray-900">
                    <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">Description</h4>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">Get all emails for a specific temporary email address.</p>
                    
                    <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">Parameters</h4>
                    <div class="overflow-x-auto">
                        <table class="w-full mb-4">
                            <thead class="bg-gray-100 dark:bg-gray-800">
                                <tr>
                                    <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Parameter</th>
                                    <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Type</th>
                                    <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Required</th>
                                    <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-t dark:border-gray-700">
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-200">email</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">string</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Yes</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Temporary email address</td>
                                </tr>
                                <tr class="border-t dark:border-gray-700">
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-200">limit</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">integer</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">No</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Number of emails per page (default: 20, max: 100)</td>
                                </tr>
                                <tr class="border-t dark:border-gray-700">
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-200">page</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">integer</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">No</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Page number (default: 1)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">Example Response</h4>
                    <pre class="bg-gray-800 dark:bg-black text-green-400 p-4 rounded overflow-x-auto mb-4"><code>{
    "success": true,
    "data": {
        "emails": [
            {
                "id": 123,
                "temp_email_id": 456,
                "message_id": "&lt;example123@mail.com&gt;",
                "from": "sender@example.com",
                "subject": "Test Email Subject",
                "is_read": false,
                "is_starred": false,
                "received_at": "2023-04-28T14:22:33.000000Z"
            }
        ],
        "pagination": {
            "total": 5,
            "per_page": 20,
            "current_page": 1,
            "last_page": 1
        }
    }
}</code></pre>
                </div>
            </div>
            
            <!-- Message endpoint -->
            <div class="border dark:border-gray-700 rounded-lg mb-6 overflow-hidden">
                <div class="bg-blue-50 dark:bg-blue-900/30 px-6 py-4 border-b dark:border-gray-700">
                    <h3 class="text-xl font-medium text-blue-800 dark:text-blue-300">Get Email Details</h3>
                    <div class="flex items-center mt-2">
                        <span class="bg-green-500 dark:bg-green-600 text-white px-3 py-1 rounded-md text-sm mr-3">GET</span>
                        <code class="text-blue-700 dark:text-blue-300">/messages/{id}?email={email}</code>
                    </div>
                </div>
                <div class="p-6 bg-white dark:bg-gray-900">
                    <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">Description</h4>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">Get detailed content of a specific email message.</p>
                    
                    <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">Parameters</h4>
                    <div class="overflow-x-auto">
                        <table class="w-full mb-4">
                            <thead class="bg-gray-100 dark:bg-gray-800">
                                <tr>
                                    <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Parameter</th>
                                    <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Type</th>
                                    <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Required</th>
                                    <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-t dark:border-gray-700">
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-200">id</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">integer</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Yes</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Email message ID</td>
                                </tr>
                                <tr class="border-t dark:border-gray-700">
                                    <td class="px-4 py-2 text-gray-800 dark:text-gray-200">email</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">string</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Yes</td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Temporary email address</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Domains endpoint -->
            <div class="border dark:border-gray-700 rounded-lg mb-6 overflow-hidden">
                <div class="bg-blue-50 dark:bg-blue-900/30 px-6 py-4 border-b dark:border-gray-700">
                    <h3 class="text-xl font-medium text-blue-800 dark:text-blue-300">Get Domains</h3>
                    <div class="flex items-center mt-2">
                        <span class="bg-green-500 dark:bg-green-600 text-white px-3 py-1 rounded-md text-sm mr-3">GET</span>
                        <code class="text-blue-700 dark:text-blue-300">/domains</code>
                    </div>
                </div>
                <div class="p-6 bg-white dark:bg-gray-900">
                    <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">Description</h4>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">Get a list of all available domains.</p>
                    
                    <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">Example Response</h4>
                    <pre class="bg-gray-800 dark:bg-black text-green-400 p-4 rounded overflow-x-auto"><code>{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "tempmail.example.com"
        },
        {
            "id": 2,
            "name": "disposable.example.org"
        }
    ]
}</code></pre>
                </div>
            </div>
        </div>
        
        <div class="mb-10">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Error Codes</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Status Code</th>
                            <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Error Type</th>
                            <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t dark:border-gray-700">
                            <td class="px-4 py-2 text-gray-800 dark:text-gray-200">400</td>
                            <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Bad Request</td>
                            <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Invalid request parameters</td>
                        </tr>
                        <tr class="border-t dark:border-gray-700">
                            <td class="px-4 py-2 text-gray-800 dark:text-gray-200">404</td>
                            <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Not Found</td>
                            <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Email or message not found</td>
                        </tr>
                        <tr class="border-t dark:border-gray-700">
                            <td class="px-4 py-2 text-gray-800 dark:text-gray-200">429</td>
                            <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Too Many Requests</td>
                            <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Request limit exceeded</td>
                        </tr>
                        <tr class="border-t dark:border-gray-700">
                            <td class="px-4 py-2 text-gray-800 dark:text-gray-200">500</td>
                            <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Server Error</td>
                            <td class="px-4 py-2 text-gray-600 dark:text-gray-400">Server error</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Example Usage (JavaScript)</h2>
            <pre class="bg-gray-800 dark:bg-black text-green-400 p-4 rounded overflow-x-auto"><code>// Example of fetching emails
async function getEmails(tempEmail) {
    try {
        const response = await fetch(`{{ url('/api/v1') }}/emails?email=${tempEmail}&limit=10`);
        const data = await response.json();
        
        if (data.success) {
            console.log('Emails:', data.data.emails);
        } else {
            console.error('Error:', data.message);
        }
    } catch (error) {
        console.error('API error:', error);
    }
}</code></pre>
        </div>
    </div>
@endsection 