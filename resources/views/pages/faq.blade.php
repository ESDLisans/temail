@extends('layouts.app')

@section('title', 'FAQ - Frequently Asked Questions | TempMail')
@section('meta_description', 'Get answers to frequently asked questions about our temporary email service. Learn about privacy, security, email limits, and how to use disposable emails effectively.')
@section('canonical', route('faq'))

@section('content')
<div class="bg-gradient-to-b from-slate-50 to-white dark:from-slate-900 dark:to-slate-800 py-16 md:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-12 max-w-4xl mx-auto">
            <div class="w-full relative bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm p-6 sm:p-8">
                <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-emerald-500 to-teal-500 rounded-l-xl"></div>
                <div class="space-y-4">
                    <div class="text-emerald-600 dark:text-emerald-400 text-sm font-medium flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Support Center
                    </div>
                    <div>
                        <h1 class="text-3xl sm:text-4xl font-bold text-slate-800 dark:text-white leading-snug">
                            {{ $page->title ?? 'Frequently Asked Questions' }}
                        </h1>
                        <p class="mt-2 text-lg text-slate-600 dark:text-slate-300 leading-relaxed">
                            {{ $page->meta_description ?? 'Find answers to common questions about our temporary email service.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Content -->
        <div class="max-w-4xl mx-auto">
            @if($page && $page->content)
                <div class="bg-white dark:bg-slate-800 p-8 md:p-10 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 prose-lg dark:prose-invert dark:text-slate-200 prose-slate prose-img:rounded-xl prose-headings:font-bold prose-a:text-emerald-600 dark:prose-a:text-emerald-400">
                    {!! $page->content !!}
                </div>
            @else
                <div class="space-y-16">
                    <!-- FAQ Group 1: General -->
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-8 flex items-center">
                            <span class="flex items-center justify-center w-10 h-10 bg-emerald-100 dark:bg-emerald-800 text-emerald-600 dark:text-emerald-300 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            General Questions
                        </h2>
                        
                        <div class="space-y-4">
                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 overflow-hidden transition-all duration-200 hover:shadow-lg">
                                <div x-data="{ open: false }" class="w-full">
                                    <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-5 text-left transition-colors duration-200 hover:bg-slate-50 dark:hover:bg-slate-700/50">
                                        <span class="font-semibold text-lg text-slate-800 dark:text-white">What is TempMail?</span>
                                        <span class="flex-shrink-0 ml-2">
                                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-emerald-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <div x-show="open" x-collapse x-cloak class="px-6 pt-0 pb-6">
                                        <div class="prose dark:prose-invert prose-slate">
                                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                                TempMail is a free online service that allows you to create temporary, disposable email addresses. These addresses automatically expire after a set period, helping you protect your privacy and avoid spam in your primary inbox.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 overflow-hidden transition-all duration-200 hover:shadow-lg">
                                <div x-data="{ open: false }" class="w-full">
                                    <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-5 text-left transition-colors duration-200 hover:bg-slate-50 dark:hover:bg-slate-700/50">
                                        <span class="font-semibold text-lg text-slate-800 dark:text-white">How long do temporary emails last?</span>
                                        <span class="flex-shrink-0 ml-2">
                                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-emerald-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <div x-show="open" x-collapse x-cloak class="px-6 pt-0 pb-6">
                                        <div class="prose dark:prose-invert prose-slate">
                                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                                By default, emails in your temporary inbox will be automatically deleted after 10 hours. This timeframe gives you sufficient time to receive and use verification emails or sign-up confirmations while ensuring your data doesn't linger unnecessarily.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 overflow-hidden transition-all duration-200 hover:shadow-lg">
                                <div x-data="{ open: false }" class="w-full">
                                    <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-5 text-left transition-colors duration-200 hover:bg-slate-50 dark:hover:bg-slate-700/50">
                                        <span class="font-semibold text-lg text-slate-800 dark:text-white">Is TempMail completely free?</span>
                                        <span class="flex-shrink-0 ml-2">
                                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-emerald-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <div x-show="open" x-collapse x-cloak class="px-6 pt-0 pb-6">
                                        <div class="prose dark:prose-invert prose-slate">
                                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                                Yes, TempMail is completely free to use for everyone. There are no hidden fees, subscriptions, or usage limits. The service is supported by minimal, non-intrusive advertising, allowing us to maintain and improve our platform while keeping it free for all users.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Group 2: Privacy & Security -->
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-8 flex items-center">
                            <span class="flex items-center justify-center w-10 h-10 bg-blue-100 dark:bg-blue-800 text-blue-600 dark:text-blue-300 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            Privacy & Security
                        </h2>
                        
                        <div class="space-y-4">
                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 overflow-hidden transition-all duration-200 hover:shadow-lg">
                                <div x-data="{ open: false }" class="w-full">
                                    <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-5 text-left transition-colors duration-200 hover:bg-slate-50 dark:hover:bg-slate-700/50">
                                        <span class="font-semibold text-lg text-slate-800 dark:text-white">Is my data secure with TempMail?</span>
                                        <span class="flex-shrink-0 ml-2">
                                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-emerald-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <div x-show="open" x-collapse x-cloak class="px-6 pt-0 pb-6">
                                        <div class="prose dark:prose-invert prose-slate">
                                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                                Yes, we prioritize your privacy and security. We don't require any personal information to create a temporary email address. All emails are automatically deleted after the expiration period, and we don't store or share any of your data with third parties. Our service runs on secure servers with industry-standard encryption.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 overflow-hidden transition-all duration-200 hover:shadow-lg">
                                <div x-data="{ open: false }" class="w-full">
                                    <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-5 text-left transition-colors duration-200 hover:bg-slate-50 dark:hover:bg-slate-700/50">
                                        <span class="font-semibold text-lg text-slate-800 dark:text-white">Can someone trace my temporary email back to me?</span>
                                        <span class="flex-shrink-0 ml-2">
                                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-emerald-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <div x-show="open" x-collapse x-cloak class="px-6 pt-0 pb-6">
                                        <div class="prose dark:prose-invert prose-slate">
                                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                                TempMail is designed to be anonymous. We don't collect or store your IP address or any personal information that could be used to identify you. However, keep in mind that if you use your temporary email to log into services that require personal information, those services may have their own data collection practices.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 overflow-hidden transition-all duration-200 hover:shadow-lg">
                                <div x-data="{ open: false }" class="w-full">
                                    <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-5 text-left transition-colors duration-200 hover:bg-slate-50 dark:hover:bg-slate-700/50">
                                        <span class="font-semibold text-lg text-slate-800 dark:text-white">Is it legal to use temporary email services?</span>
                                        <span class="flex-shrink-0 ml-2">
                                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-emerald-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <div x-show="open" x-collapse x-cloak class="px-6 pt-0 pb-6">
                                        <div class="prose dark:prose-invert prose-slate">
                                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                                Yes, using temporary email services is completely legal for legitimate purposes such as protecting your privacy, testing services, or avoiding spam. However, like any tool, they should not be used for fraudulent activities or to violate terms of service of other platforms that explicitly prohibit temporary emails.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Group 3: Using TempMail -->
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-8 flex items-center">
                            <span class="flex items-center justify-center w-10 h-10 bg-purple-100 dark:bg-purple-800 text-purple-600 dark:text-purple-300 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </span>
                            Using TempMail
                        </h2>
                        
                        <div class="space-y-4">
                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 overflow-hidden transition-all duration-200 hover:shadow-lg">
                                <div x-data="{ open: false }" class="w-full">
                                    <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-5 text-left transition-colors duration-200 hover:bg-slate-50 dark:hover:bg-slate-700/50">
                                        <span class="font-semibold text-lg text-slate-800 dark:text-white">How do I create a temporary email address?</span>
                                        <span class="flex-shrink-0 ml-2">
                                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-emerald-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <div x-show="open" x-collapse x-cloak class="px-6 pt-0 pb-6">
                                        <div class="prose dark:prose-invert prose-slate">
                                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
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
                            </div>

                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 overflow-hidden transition-all duration-200 hover:shadow-lg">
                                <div x-data="{ open: false }" class="w-full">
                                    <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-5 text-left transition-colors duration-200 hover:bg-slate-50 dark:hover:bg-slate-700/50">
                                        <span class="font-semibold text-lg text-slate-800 dark:text-white">Can I choose my own email address?</span>
                                        <span class="flex-shrink-0 ml-2">
                                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-emerald-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <div x-show="open" x-collapse x-cloak class="px-6 pt-0 pb-6">
                                        <div class="prose dark:prose-invert prose-slate">
                                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                                Yes, with TempMail you can customize the username part of your temporary email address. Simply click on the email address field and edit it to your preferred username. Note that the domain part (@tempmail.io) cannot be changed in the free version.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700 overflow-hidden transition-all duration-200 hover:shadow-lg">
                                <div x-data="{ open: false }" class="w-full">
                                    <button @click="open = !open" class="flex justify-between items-center w-full px-6 py-5 text-left transition-colors duration-200 hover:bg-slate-50 dark:hover:bg-slate-700/50">
                                        <span class="font-semibold text-lg text-slate-800 dark:text-white">What types of attachments can I receive?</span>
                                        <span class="flex-shrink-0 ml-2">
                                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-emerald-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <div x-show="open" x-collapse x-cloak class="px-6 pt-0 pb-6">
                                        <div class="prose dark:prose-invert prose-slate">
                                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                                TempMail supports most common file types as attachments, including images (JPEG, PNG, GIF), documents (PDF, DOCX, XLSX, TXT), and archives (ZIP, RAR). For security reasons, we block potentially dangerous file types like executable files (.exe, .bat, etc.). There's a size limit of 10MB per attachment.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ Contact CTA -->
                    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-slate-800 dark:to-slate-800/50 rounded-2xl p-8 md:p-10 mt-12 relative overflow-hidden">
                        <div class="absolute right-0 top-0 opacity-10">
                            <svg width="230" height="230" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 2H7C4.23858 2 2 4.23858 2 7V17C2 19.7614 4.23858 22 7 22H17C19.7614 22 22 19.7614 22 17V7C22 4.23858 19.7614 2 17 2Z" stroke="currentColor" stroke-width="1.5" />
                                <path d="M12 16V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M12 8V8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                            <div>
                                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-2">Still have questions?</h3>
                                <p class="text-slate-600 dark:text-slate-300">If you couldn't find the answer to your question, feel free to contact us.</p>
                            </div>
                            <a href="{{ route('contact') }}" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors shadow-sm whitespace-nowrap">
                                Contact Support
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Alpine.js initialization is included via the main layout
    // This ensures the FAQ accordions will work properly
</script>
@endpush 