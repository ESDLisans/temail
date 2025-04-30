@extends('layouts.app')

@section('content')
@include('components.temp-mail-header')

<div class="container mx-auto px-4 py-12">
    <!-- Page Header -->
    <div class="text-center mb-12">
        <h1 class="text-3xl sm:text-4xl font-bold text-slate-800 dark:text-white mb-4">
            {{ $page->title ?? 'Contact Us' }}
        </h1>
        <p class="text-lg text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
            {{ $page->meta_description ?? 'Have questions or feedback? Get in touch with our team.' }}
        </p>
    </div>

    <!-- Contact Content -->
    <div class="max-w-5xl mx-auto">
        @if($page && $page->content)
            <div class="mx-auto">
                <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-md border border-slate-200 dark:border-slate-700 prose-lg dark:prose-invert dark:text-slate-200 prose-slate prose-img:rounded-xl prose-headings:font-bold prose-a:text-emerald-600 dark:prose-a:text-emerald-400">
                    {!! $page->content !!}
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-6">Get in Touch</h2>
                    <p class="text-slate-600 dark:text-slate-300 mb-6">
                        We're here to help with any questions, suggestions, or concerns you may have about our temporary email service. Fill out the form, and we'll get back to you as soon as possible.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-medium text-slate-800 dark:text-white">Email</h3>
                                <p class="text-slate-600 dark:text-slate-300">support@tempmail.io</p>
                                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">We aim to respond within 24 hours</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-medium text-slate-800 dark:text-white">Support</h3>
                                <p class="text-slate-600 dark:text-slate-300">Visit our <a href="{{ url('/faq') }}" class="text-emerald-600 dark:text-emerald-400 hover:underline">FAQ page</a> for quick answers to common questions</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-medium text-slate-800 dark:text-white">Social Media</h3>
                                <p class="text-slate-600 dark:text-slate-300">Connect with us on social media for updates and tips</p>
                                <div class="flex space-x-4 mt-2">
                                    <a href="#" class="text-slate-500 hover:text-emerald-500 dark:text-slate-400 dark:hover:text-emerald-400">
                                        <span class="sr-only">Twitter</span>
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="text-slate-500 hover:text-emerald-500 dark:text-slate-400 dark:hover:text-emerald-400">
                                        <span class="sr-only">GitHub</span>
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="text-slate-500 hover:text-emerald-500 dark:text-slate-400 dark:hover:text-emerald-400">
                                        <span class="sr-only">LinkedIn</span>
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700 p-6">
                        <h2 class="text-xl font-bold text-slate-800 dark:text-white mb-6">Contact Form</h2>
                        
                        <form id="contact-form" class="space-y-6">
                            <!-- Name field -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Name</label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-slate-700 dark:text-white" placeholder="Your name" required>
                            </div>
                            
                            <!-- Email field -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Email</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-slate-700 dark:text-white" placeholder="your.email@example.com" required>
                            </div>
                            
                            <!-- Subject field -->
                            <div>
                                <label for="subject" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Subject</label>
                                <select id="subject" name="subject" class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-slate-700 dark:text-white">
                                    <option value="general">General Inquiry</option>
                                    <option value="support">Technical Support</option>
                                    <option value="feedback">Feedback</option>
                                    <option value="partnership">Partnership</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            
                            <!-- Message field -->
                            <div>
                                <label for="message" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Message</label>
                                <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-slate-700 dark:text-white" placeholder="Your message here..." required></textarea>
                            </div>
                            
                            <!-- Submit button -->
                            <div>
                                <button type="submit" class="w-full inline-flex justify-center items-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    Send Message
                                </button>
                            </div>
                            
                            <!-- Success message (hidden by default) -->
                            <div id="success-message" class="hidden p-4 bg-emerald-50 text-emerald-700 rounded-md">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <p>Your message has been sent successfully. We'll get back to you soon!</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-6 text-center">Find Us</h2>
                <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md border border-slate-200 dark:border-slate-700 p-6">
                    <div class="aspect-w-16 aspect-h-7">
                        <iframe class="w-full h-96 rounded-md" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48393.92737830003!2d-74.01265292425471!3d40.70513839578584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a2a3bda0bef%3A0xae75a34888a26a34!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1637691487155!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@include('components.footer')
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.getElementById('contact-form');
        const successMessage = document.getElementById('success-message');
        
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // In a real implementation, you would send the form data to your backend
                // For now, we'll just show the success message after a short delay
                setTimeout(function() {
                    successMessage.classList.remove('hidden');
                    contactForm.reset();
                    
                    // Hide the success message after 5 seconds
                    setTimeout(function() {
                        successMessage.classList.add('hidden');
                    }, 5000);
                }, 1000);
            });
        }
    });
</script>
@endpush 