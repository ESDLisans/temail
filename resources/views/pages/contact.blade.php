@extends('layouts.app')

@section('title', ($page->meta_title ?? 'Contact Us') . ' - TempMail')
@section('meta_description', $page->meta_description ?? 'Get in touch with us for support, questions, or feedback about our temporary email service.')

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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Support Center
                        </div>
                        <div>
                            <h1 class="text-3xl sm:text-4xl font-bold text-slate-800 dark:text-white leading-snug">
                                {{ $page->title ?? 'Contact Us' }}
                            </h1>
                            <p class="mt-2 text-lg text-slate-600 dark:text-slate-300 leading-relaxed">
                                {{ $page->meta_description ?? 'Have a question or need help? We\'re here to assist you with our temporary email service.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 p-6 sm:p-8">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">Send us a message</h2>
                            <p class="text-slate-600 dark:text-slate-300">Fill out the form below and we'll get back to you as soon as possible.</p>
                </div>

                        <!-- Success/Error Messages -->
                        @if(session('success'))
                            <div class="mb-6 p-4 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-lg">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 dark:text-emerald-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    <p class="text-emerald-700 dark:text-emerald-300 font-medium">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 dark:text-red-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    <p class="text-red-700 dark:text-red-300 font-medium">{{ session('error') }}</p>
                                    </div>
                                    </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                        Full Name *
                                    </label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                           class="w-full px-4 py-3 border border-slate-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-slate-700 dark:text-white @error('name') border-red-500 @enderror">
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                        Email Address *
                                    </label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                           class="w-full px-4 py-3 border border-slate-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-slate-700 dark:text-white @error('email') border-red-500 @enderror">
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                        
                        <div>
                                <label for="subject" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                    Subject *
                                </label>
                                <select id="subject" name="subject" required
                                        class="w-full px-4 py-3 border border-slate-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-slate-700 dark:text-white @error('subject') border-red-500 @enderror">
                                    <option value="">Select a subject</option>
                                    <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                                    <option value="Technical Support" {{ old('subject') == 'Technical Support' ? 'selected' : '' }}>Technical Support</option>
                                    <option value="Bug Report" {{ old('subject') == 'Bug Report' ? 'selected' : '' }}>Bug Report</option>
                                    <option value="Feature Request" {{ old('subject') == 'Feature Request' ? 'selected' : '' }}>Feature Request</option>
                                    <option value="Account Issues" {{ old('subject') == 'Account Issues' ? 'selected' : '' }}>Account Issues</option>
                                    <option value="Privacy Concerns" {{ old('subject') == 'Privacy Concerns' ? 'selected' : '' }}>Privacy Concerns</option>
                                    <option value="Report Abuse" {{ old('subject') == 'Report Abuse' ? 'selected' : '' }}>Report Abuse</option>
                                    <option value="Partnership" {{ old('subject') == 'Partnership' ? 'selected' : '' }}>Partnership</option>
                                    <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                @error('subject')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                                    </div>
                                    
                                    <div>
                                <label for="message" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                    Message *
                                </label>
                                <textarea id="message" name="message" rows="6" required placeholder="Please provide as much detail as possible..."
                                          class="w-full px-4 py-3 border border-slate-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-slate-700 dark:text-white resize-none @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                                <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">Maximum 5,000 characters</p>
                                    </div>
                                    
                            <div class="pt-4">
                                <button type="submit" 
                                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors shadow-lg hover:shadow-xl transform hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                            </svg>
                                            Send Message
                                        </button>
                                    </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="space-y-6">
                    <!-- Contact Methods -->
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 p-6">
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4">Get in Touch</h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-slate-900 dark:text-white">Email</h4>
                                    <p class="text-sm text-slate-600 dark:text-slate-300">{{ \App\Models\SiteSetting::get('footer_contact_email', 'contact@tempmail.io') }}</p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">We respond within 24 hours</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-slate-900 dark:text-white">Help Center</h4>
                                    <p class="text-sm text-slate-600 dark:text-slate-300">Check our FAQ page first</p>
                                    <a href="{{ route('faq') }}" class="text-xs text-emerald-600 dark:text-emerald-400 hover:underline">View FAQ →</a>
                                        </div>
                                    </div>
                            
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-slate-900 dark:text-white">Response Time</h4>
                                    <p class="text-sm text-slate-600 dark:text-slate-300">24/7 Support</p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Usually within 2-4 hours</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 p-6">
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4">Quick Links</h3>
                        <div class="space-y-3">
                            <a href="{{ route('faq') }}" class="block text-sm text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                                Frequently Asked Questions
                            </a>
                            <a href="{{ route('features') }}" class="block text-sm text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                                Service Features
                            </a>
                            <a href="{{ route('page.show', 'privacy-policy') }}" class="block text-sm text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                                Privacy Policy
                            </a>
                            <a href="{{ route('page.show', 'terms-of-service') }}" class="block text-sm text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                                Terms of Service
                            </a>
                            <a href="{{ route('api.docs') }}" class="block text-sm text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                                API Documentation
                            </a>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 rounded-xl border border-emerald-200 dark:border-emerald-800 p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="font-bold text-emerald-800 dark:text-emerald-300">Need Help?</h3>
                        </div>
                        <p class="text-sm text-emerald-700 dark:text-emerald-300 mb-3">
                            Our support team is available 24/7 to help you with any questions about our temporary email service.
                        </p>
                        <div class="text-xs text-emerald-600 dark:text-emerald-400">
                            Average response time: 2-4 hours
                            </div>
                        </div>
                    </div>
                </div>
                
            <!-- Custom Page Content -->
            @if($page && $page->content)
                <div class="mt-12">
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 p-6 sm:p-8">
                        <div class="prose dark:prose-invert prose-slate prose-lg max-w-none prose-headings:font-bold prose-h2:text-2xl prose-h3:text-xl prose-a:text-emerald-600 dark:prose-a:text-emerald-400 prose-img:rounded-lg prose-img:shadow-md">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
// Form validation and enhancement
    document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    form.addEventListener('submit', function() {
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            Sending...
        `;
    });
    
    // Character counter for message field
    const messageField = document.getElementById('message');
    const counter = document.createElement('div');
    counter.className = 'text-xs text-slate-400 mt-1 text-right';
    messageField.parentNode.appendChild(counter);
    
    function updateCounter() {
        const length = messageField.value.length;
        const maxLength = 5000;
        counter.textContent = `${length}/${maxLength} characters`;
        
        if (length > maxLength * 0.9) {
            counter.className = 'text-xs text-orange-500 mt-1 text-right';
        } else if (length > maxLength * 0.95) {
            counter.className = 'text-xs text-red-500 mt-1 text-right';
        } else {
            counter.className = 'text-xs text-slate-400 mt-1 text-right';
        }
    }
    
    messageField.addEventListener('input', updateCounter);
    updateCounter();
    });
</script>
@endsection 