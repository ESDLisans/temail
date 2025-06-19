@extends('layouts.app')

@section('title', 'Features - Advanced Temporary Email Service | TempMail')
@section('meta_description', 'Discover advanced features of our temporary email service: instant email generation, privacy protection, spam blocking, auto-delete, and more. Perfect for online privacy.')
@section('canonical', route('features'))

@section('content')
<div class="bg-gradient-to-b from-slate-50 to-white dark:from-slate-900 dark:to-slate-800 py-16 md:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Page Header -->
            <div class="mb-12">
                <div class="w-full relative bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm p-6 sm:p-8">
                    <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-emerald-500 to-teal-500 rounded-l-xl"></div>
                    <div class="space-y-4">
                        <div class="text-emerald-600 dark:text-emerald-400 text-sm font-medium flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Premium Features
                        </div>
                        <div>
                            <h1 class="text-3xl sm:text-4xl font-bold text-slate-800 dark:text-white leading-snug">
                                {{ $page->title ?? 'TempMail Features' }}
                            </h1>
                            <p class="mt-2 text-lg text-slate-600 dark:text-slate-300 leading-relaxed">
                                {{ $page->meta_description ?? 'Discover all the powerful features that make our temporary email service the best choice for protecting your privacy.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Content -->
            @if($page && $page->content)
                <div class="w-full bg-white dark:bg-slate-800 p-6 sm:p-8 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 prose-lg dark:prose-invert dark:text-slate-200 prose-slate prose-img:rounded-xl prose-headings:font-bold prose-a:text-emerald-600 dark:prose-a:text-emerald-400 mb-12">
                    {!! $page->content !!}
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 hover:shadow-lg transition-all duration-300 group">
                        <div class="w-14 h-14 bg-emerald-100 dark:bg-emerald-900/50 rounded-xl flex items-center justify-center mb-6 transition-transform group-hover:scale-110 duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-slate-800 dark:text-white mb-3">Instant Email Creation</h3>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed">Generate a random email address in seconds with no registration or personal information required.</p>
                    </div>
                    
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 hover:shadow-lg transition-all duration-300 group">
                        <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900/50 rounded-xl flex items-center justify-center mb-6 transition-transform group-hover:scale-110 duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-slate-800 dark:text-white mb-3">Complete Privacy</h3>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed">Protect your identity with our anonymous email service. We never collect or share your personal data.</p>
                    </div>
                    
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 hover:shadow-lg transition-all duration-300 group">
                        <div class="w-14 h-14 bg-purple-100 dark:bg-purple-900/50 rounded-xl flex items-center justify-center mb-6 transition-transform group-hover:scale-110 duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-slate-800 dark:text-white mb-3">Real-Time Notifications</h3>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed">Receive instant alerts when new emails arrive in your temporary inbox without refreshing the page.</p>
                    </div>
                    
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 hover:shadow-lg transition-all duration-300 group">
                        <div class="w-14 h-14 bg-amber-100 dark:bg-amber-900/50 rounded-xl flex items-center justify-center mb-6 transition-transform group-hover:scale-110 duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-slate-800 dark:text-white mb-3">Rich Email Viewer</h3>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed">View emails with full HTML support, images, and attachments directly in your browser.</p>
                    </div>
                    
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 hover:shadow-lg transition-all duration-300 group">
                        <div class="w-14 h-14 bg-rose-100 dark:bg-rose-900/50 rounded-xl flex items-center justify-center mb-6 transition-transform group-hover:scale-110 duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-rose-600 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-slate-800 dark:text-white mb-3">Email Forwarding</h3>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed">Forward messages from your temporary inbox to your permanent email address with a single click.</p>
                    </div>
                    
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 hover:shadow-lg transition-all duration-300 group">
                        <div class="w-14 h-14 bg-teal-100 dark:bg-teal-900/50 rounded-xl flex items-center justify-center mb-6 transition-transform group-hover:scale-110 duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-teal-600 dark:text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-slate-800 dark:text-white mb-3">Multiple Domains</h3>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed">Choose from multiple domain options for your temporary email address to bypass email restrictions.</p>
                    </div>
                </div>
                
                <div class="relative my-24">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-slate-200 dark:border-slate-700"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="bg-gradient-to-b from-slate-50 to-white dark:from-slate-900 dark:to-slate-800 px-4 text-lg font-medium text-slate-600 dark:text-slate-300">Advanced Features</span>
                    </div>
                </div>

                <div class="mt-16 mb-20">
                    <div class="bg-white dark:bg-slate-800 p-6 sm:p-8 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 mb-12">
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="relative">
                                <div class="flex space-y-6 flex-col">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 mt-1 bg-emerald-100 dark:bg-emerald-900/30 p-1.5 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 dark:text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="font-bold text-lg text-slate-800 dark:text-white mb-1">Auto-Delete</h3>
                                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">Emails are automatically deleted after 10 hours to maintain your privacy and keep your inbox clean.</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 mt-1 bg-emerald-100 dark:bg-emerald-900/30 p-1.5 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 dark:text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="font-bold text-lg text-slate-800 dark:text-white mb-1">Spam Detection</h3>
                                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">Our advanced algorithms automatically detect and flag suspicious emails to protect you from phishing and malware.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex flex-col space-y-6">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 mt-1 bg-emerald-100 dark:bg-emerald-900/30 p-1.5 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 dark:text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="font-bold text-lg text-slate-800 dark:text-white mb-1">Developer API</h3>
                                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">Integrate our temporary email service into your applications with our comprehensive API for developers.</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 mt-1 bg-emerald-100 dark:bg-emerald-900/30 p-1.5 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 dark:text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="font-bold text-lg text-slate-800 dark:text-white mb-1">Custom Email Options</h3>
                                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">Create custom email addresses or let our system generate a random one for you – the choice is yours.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="w-full bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-slate-800 dark:to-slate-800/50 rounded-xl p-6 sm:p-8 mt-12 relative overflow-hidden shadow-sm mb-12">
                    <div class="absolute right-0 top-0 opacity-10">
                        <svg width="230" height="230" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke="currentColor" stroke-width="1.5" />
                        </svg>
                    </div>
                    <div class="relative">
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-emerald-400 mb-4">Why Choose Our Temporary Email Service?</h2>
                        <p class="text-slate-700 dark:text-slate-300 mb-4 leading-relaxed">
                            TempMail provides the most reliable, secure, and user-friendly temporary email service available today. Our focus on privacy, combined with an intuitive interface and powerful features, makes us the top choice for protecting your primary inbox from spam and unwanted communications.
                        </p>
                        <p class="text-slate-700 dark:text-slate-300 leading-relaxed">
                            Whether you're signing up for a new service, testing an application, or just want to keep your personal email address private, TempMail has you covered with our comprehensive suite of privacy tools.
                        </p>
                    </div>
                </div>
                
                <div class="text-center mb-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-emerald-600 hover:bg-emerald-700 transition-colors shadow-sm">
                        Try TempMail Now
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 