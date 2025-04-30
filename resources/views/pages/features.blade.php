@extends('layouts.app')

@section('content')
@include('components.temp-mail-header')

<div class="container mx-auto px-4 py-12">
    <!-- Page Header -->
    <div class="text-center mb-12">
        <h1 class="text-3xl sm:text-4xl font-bold text-slate-800 dark:text-white mb-4">
            {{ $page->title ?? 'TempMail Features' }}
        </h1>
        <p class="text-lg text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
            {{ $page->meta_description ?? 'Discover all the powerful features that make our temporary email service the best choice for protecting your privacy.' }}
        </p>
    </div>

    <!-- Features Content -->
    <div class="max-w-5xl mx-auto">
        @if($page && $page->content)
            <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-md border border-slate-200 dark:border-slate-700 prose-lg dark:prose-invert dark:text-slate-200 prose-slate prose-img:rounded-xl prose-headings:font-bold prose-a:text-emerald-600 dark:prose-a:text-emerald-400">
                {!! $page->content !!}
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16 prose dark:prose-invert prose-slate prose-img:rounded-xl prose-headings:font-bold prose-a:text-emerald-600 dark:prose-a:text-emerald-400">
                <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg text-slate-800 dark:text-white mb-2">Instant Email Creation</h3>
                    <p class="text-slate-600 dark:text-slate-300">Generate a random email address in seconds with no registration or personal information required.</p>
                </div>
                
                <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg text-slate-800 dark:text-white mb-2">Complete Privacy</h3>
                    <p class="text-slate-600 dark:text-slate-300">Protect your identity with our anonymous email service. We never collect or share your personal data.</p>
                </div>
                
                <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg text-slate-800 dark:text-white mb-2">Real-Time Notifications</h3>
                    <p class="text-slate-600 dark:text-slate-300">Receive instant alerts when new emails arrive in your temporary inbox without refreshing the page.</p>
                </div>
                
                <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg text-slate-800 dark:text-white mb-2">Rich Email Viewer</h3>
                    <p class="text-slate-600 dark:text-slate-300">View emails with full HTML support, images, and attachments directly in your browser.</p>
                </div>
                
                <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg text-slate-800 dark:text-white mb-2">Email Forwarding</h3>
                    <p class="text-slate-600 dark:text-slate-300">Forward messages from your temporary inbox to your permanent email address with a single click.</p>
                </div>
                
                <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-md border border-slate-200 dark:border-slate-700">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-lg text-slate-800 dark:text-white mb-2">Multiple Domains</h3>
                    <p class="text-slate-600 dark:text-slate-300">Choose from multiple domain options for your temporary email address to bypass email restrictions.</p>
                </div>
            </div>
            
            <h2 class="text-2xl font-bold mb-4">Advanced Features</h2>
            
            <div class="space-y-6 mb-12">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="font-semibold text-slate-800 dark:text-white">Auto-Delete</h3>
                        <p class="text-slate-600 dark:text-slate-300">Emails are automatically deleted after 10 hours to maintain your privacy and keep your inbox clean.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="font-semibold text-slate-800 dark:text-white">Spam Detection</h3>
                        <p class="text-slate-600 dark:text-slate-300">Our advanced algorithms automatically detect and flag suspicious emails to protect you from phishing and malware.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="font-semibold text-slate-800 dark:text-white">Developer API</h3>
                        <p class="text-slate-600 dark:text-slate-300">Integrate our temporary email service into your applications with our comprehensive API for developers.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="font-semibold text-slate-800 dark:text-white">Custom Email Options</h3>
                        <p class="text-slate-600 dark:text-slate-300">Create custom email addresses or let our system generate a random one for you – the choice is yours.</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-emerald-50 dark:bg-emerald-900/30 p-6 rounded-lg border border-emerald-100 dark:border-emerald-800 mb-12">
                <h2 class="text-xl font-bold text-emerald-800 dark:text-emerald-400 mb-4">Why Choose Our Temporary Email Service?</h2>
                <p class="text-slate-700 dark:text-slate-300 mb-4">
                    TempMail provides the most reliable, secure, and user-friendly temporary email service available today. Our focus on privacy, combined with an intuitive interface and powerful features, makes us the top choice for protecting your primary inbox from spam and unwanted communications.
                </p>
                <p class="text-slate-700 dark:text-slate-300">
                    Whether you're signing up for a new service, testing an application, or just want to keep your personal email address private, TempMail has you covered with our comprehensive suite of privacy tools.
                </p>
            </div>
            
            <div class="text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700">
                    Try TempMail Now
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