@extends('layouts.app')

@section('content')
@include('components.temp-mail-header')

<div class="container mx-auto px-4 py-12">
    <!-- Page Header -->
    <div class="text-center mb-12">
        <h1 class="text-3xl sm:text-4xl font-bold text-slate-800 dark:text-white mb-4">
            {{ $page->title ?? 'Frequently Asked Questions' }}
        </h1>
        <p class="text-lg text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
            {{ $page->meta_description ?? 'Find answers to common questions about our temporary email service.' }}
        </p>
    </div>

    <!-- FAQ Content -->
    <div class="max-w-5xl mx-auto">
        @if($page && $page->content)
            <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-md border border-slate-200 dark:border-slate-700 prose-lg dark:prose-invert dark:text-slate-200 prose-slate prose-img:rounded-xl prose-headings:font-bold prose-a:text-emerald-600 dark:prose-a:text-emerald-400">
                {!! $page->content !!}
            </div>
        @else
            <div class="space-y-8">
                <!-- FAQ Group 1: General -->
                <div>
                    <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-6">General Questions</h2>
                    
                    <div class="space-y-6">
                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                            <div x-data="{ open: false }" class="w-full">
                                <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left">
                                    <span class="font-medium text-slate-800 dark:text-white">What is TempMail?</span>
                                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="px-6 pb-4">
                                    <p class="text-slate-600 dark:text-slate-300">
                                        TempMail is a free online service that allows you to create temporary, disposable email addresses. These addresses automatically expire after a set period, helping you protect your privacy and avoid spam in your primary inbox.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                            <div x-data="{ open: false }" class="w-full">
                                <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left">
                                    <span class="font-medium text-slate-800 dark:text-white">How long do temporary emails last?</span>
                                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="px-6 pb-4">
                                    <p class="text-slate-600 dark:text-slate-300">
                                        By default, emails in your temporary inbox will be automatically deleted after 10 hours. This timeframe gives you sufficient time to receive and use verification emails or sign-up confirmations while ensuring your data doesn't linger unnecessarily.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                            <div x-data="{ open: false }" class="w-full">
                                <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left">
                                    <span class="font-medium text-slate-800 dark:text-white">Is TempMail completely free?</span>
                                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="px-6 pb-4">
                                    <p class="text-slate-600 dark:text-slate-300">
                                        Yes, TempMail is completely free to use for everyone. There are no hidden fees, subscriptions, or usage limits. The service is supported by minimal, non-intrusive advertising, allowing us to maintain and improve our platform while keeping it free for all users.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Group 2: Privacy & Security -->
                <div>
                    <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-6">Privacy & Security</h2>
                    
                    <div class="space-y-6">
                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                            <div x-data="{ open: false }" class="w-full">
                                <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left">
                                    <span class="font-medium text-slate-800 dark:text-white">Is my data secure with TempMail?</span>
                                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="px-6 pb-4">
                                    <p class="text-slate-600 dark:text-slate-300">
                                        Yes, we prioritize your privacy and security. We don't require any personal information to create a temporary email address. All emails are automatically deleted after the expiration period, and we don't store or share any of your data with third parties. Our service runs on secure servers with industry-standard encryption.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                            <div x-data="{ open: false }" class="w-full">
                                <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left">
                                    <span class="font-medium text-slate-800 dark:text-white">Can someone trace my temporary email back to me?</span>
                                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="px-6 pb-4">
                                    <p class="text-slate-600 dark:text-slate-300">
                                        TempMail is designed to be anonymous. We don't collect or store your IP address or any personal information that could be used to identify you. However, keep in mind that if you use your temporary email to log into services that require personal information, those services may have their own data collection practices.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                            <div x-data="{ open: false }" class="w-full">
                                <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left">
                                    <span class="font-medium text-slate-800 dark:text-white">Is it legal to use temporary email services?</span>
                                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="px-6 pb-4">
                                    <p class="text-slate-600 dark:text-slate-300">
                                        Yes, using temporary email services is completely legal for legitimate purposes such as protecting your privacy, testing services, or avoiding spam. However, like any tool, they should not be used for fraudulent activities or to violate terms of service of other platforms that explicitly prohibit temporary emails.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Group 3: Using TempMail -->
                <div>
                    <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-6">Using TempMail</h2>
                    
                    <div class="space-y-6">
                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                            <div x-data="{ open: false }" class="w-full">
                                <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left">
                                    <span class="font-medium text-slate-800 dark:text-white">How do I create a temporary email address?</span>
                                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="px-6 pb-4">
                                    <p class="text-slate-600 dark:text-slate-300">
                                        Creating a temporary email with TempMail is simple and requires no registration:
                                    </p>
                                    <ol class="list-decimal ml-5 mt-2 text-slate-600 dark:text-slate-300">
                                        <li>Visit our homepage at TempMail.io</li>
                                        <li>A random email address will be automatically generated for you</li>
                                        <li>Alternatively, you can click the "Regenerate" button to get a different address</li>
                                        <li>Use this email address wherever you need it</li>
                                        <li>Return to TempMail to view any received messages</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                            <div x-data="{ open: false }" class="w-full">
                                <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left">
                                    <span class="font-medium text-slate-800 dark:text-white">Can I choose my own email address?</span>
                                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="px-6 pb-4">
                                    <p class="text-slate-600 dark:text-slate-300">
                                        Yes, with TempMail you can customize the username part of your temporary email address. Simply click on the email address field and edit it to your preferred username. Note that the domain part (@tempmail.io) cannot be changed in the free version.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                            <div x-data="{ open: false }" class="w-full">
                                <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left">
                                    <span class="font-medium text-slate-800 dark:text-white">What types of attachments can I receive?</span>
                                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="px-6 pb-4">
                                    <p class="text-slate-600 dark:text-slate-300">
                                        TempMail supports most common file types as attachments, including images (JPEG, PNG, GIF), documents (PDF, DOCX, XLSX, TXT), and archives (ZIP, RAR). For security reasons, we block potentially dangerous file types like executable files (.exe, .bat, etc.). There's a size limit of 10MB per attachment.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Group 4: Troubleshooting -->
                <div>
                    <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-6">Troubleshooting</h2>
                    
                    <div class="space-y-6">
                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                            <div x-data="{ open: false }" class="w-full">
                                <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left">
                                    <span class="font-medium text-slate-800 dark:text-white">I'm not receiving emails. What should I do?</span>
                                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="px-6 pb-4">
                                    <p class="text-slate-600 dark:text-slate-300">
                                        If you're not receiving expected emails, try these steps:
                                    </p>
                                    <ul class="list-disc ml-5 mt-2 text-slate-600 dark:text-slate-300">
                                        <li>Check if you're using the correct email address</li>
                                        <li>Click the "Refresh Inbox" button to manually check for new messages</li>
                                        <li>Some services block temporary email domains; try using a different domain from our options</li>
                                        <li>Check your spam folder in case the message was flagged by the sender's email system</li>
                                        <li>Wait a few minutes as email delivery can sometimes be delayed</li>
                                    </ul>
                                    <p class="mt-2 text-slate-600 dark:text-slate-300">
                                        If you still don't receive emails after trying these steps, you can try generating a new temporary email address.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                            <div x-data="{ open: false }" class="w-full">
                                <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left">
                                    <span class="font-medium text-slate-800 dark:text-white">Can I recover a deleted email?</span>
                                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="px-6 pb-4">
                                    <p class="text-slate-600 dark:text-slate-300">
                                        No, once an email is deleted (either manually or after the expiration period), it cannot be recovered. This is part of our privacy-focused approach - ensuring that your data is permanently removed. We recommend saving any important information or attachments before the email is deleted.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                            <div x-data="{ open: false }" class="w-full">
                                <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-4 text-left">
                                    <span class="font-medium text-slate-800 dark:text-white">Some websites don't accept my temporary email. Why?</span>
                                    <svg :class="{'rotate-180': open}" class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="px-6 pb-4">
                                    <p class="text-slate-600 dark:text-slate-300">
                                        Some websites and services block known temporary email domains to prevent abuse or ensure they can contact users in the future. If a website rejects your temporary email, you can try:
                                    </p>
                                    <ul class="list-disc ml-5 mt-2 text-slate-600 dark:text-slate-300">
                                        <li>Using a different domain from our available options</li>
                                        <li>Regenerating a new email address</li>
                                        <li>Using our premium domain options which are less likely to be blocked</li>
                                    </ul>
                                    <p class="mt-2 text-slate-600 dark:text-slate-300">
                                        Remember that some services legitimately need long-term contact information, especially financial services or important accounts.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <p class="text-slate-600 dark:text-slate-300 mb-4">Still have questions?</p>
                <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700">
                    Contact Support
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        @endif
    </div>
</div>

@include('components.footer')
@endsection

@push('scripts')
<script>
    // Alpine.js initialization is included via the main layout
    // This ensures the FAQ accordions will work properly
</script>
@endpush 