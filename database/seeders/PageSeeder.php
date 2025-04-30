<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Features page
        Page::create([
            'title' => 'Features',
            'slug' => 'features',
            'content' => <<<HTML
<h2>Key Features of Our Temporary Email Service</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-4">📧 Instant Email Generation</h3>
        <p>Create a disposable email address instantly with just one click. No registration or personal information required.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-4">🔒 Enhanced Privacy Protection</h3>
        <p>Keep your real email address private while signing up for services, newsletters, or forums. Prevent spam and protect your identity.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-4">⏱️ Auto-Delete After 10 Hours</h3>
        <p>All emails automatically delete after 10 hours, ensuring your temporary inbox stays clean and your information remains secure.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-4">📱 Mobile Friendly Design</h3>
        <p>Access your temporary email from any device with our responsive interface that works perfectly on desktops, tablets, and mobile phones.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-4">⚡ Real-time Email Delivery</h3>
        <p>Receive emails instantly with automatic inbox refresh. No need to manually check for new messages.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-4">📝 Copy Email with One Click</h3>
        <p>Copy your temporary email address to clipboard instantly to use it on other websites and services.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-4">🔍 Email Source Viewing</h3>
        <p>View the complete HTML source of received emails if needed for technical analysis or verification purposes.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-4">📎 Attachment Support</h3>
        <p>View and download attachments from received emails, just like a regular email service.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-4">🌓 Dark Mode Support</h3>
        <p>Enjoy our eye-friendly dark mode that automatically adapts to your system preferences.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-4">✨ No Ads Premium Option</h3>
        <p>Upgrade to our premium service for an ad-free experience and extended email retention.</p>
    </div>
</div>

<h2 class="mt-12 mb-6">Why Use a Temporary Email?</h2>

<p class="mb-4">Using a temporary email service like ours offers several important benefits in today's digital world:</p>

<ul class="list-disc pl-6 space-y-2">
    <li><strong>Avoid Spam</strong> - Keep unwanted promotional emails out of your main inbox</li>
    <li><strong>Protect Privacy</strong> - Don't share your personal email with services you don't fully trust</li>
    <li><strong>Test Services</strong> - Try out new platforms without committing your real contact information</li>
    <li><strong>One-time Signups</strong> - Perfect for services you only need to use once</li>
    <li><strong>Simplified Account Creation</strong> - Quick registration for forums and services</li>
</ul>

<div class="bg-emerald-50 dark:bg-emerald-900/30 p-6 rounded-lg mt-8">
    <h3 class="text-xl font-bold mb-4">Ready to get started?</h3>
    <p class="mb-4">Try our temporary email service now - it's free, instant, and requires no registration!</p>
    <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700">
        Create Temporary Email
    </a>
</div>
HTML,
            'meta_description' => 'Explore the features of our temporary email service: instant email generation, privacy protection, auto-deletion, and more.',
            'meta_keywords' => 'temporary email features, disposable email benefits, temp mail service, email privacy',
            'is_published' => true,
        ]);
        
        // Create FAQ page
        Page::create([
            'title' => 'Frequently Asked Questions',
            'slug' => 'faq',
            'content' => <<<HTML
<h2>Frequently Asked Questions</h2>

<div class="space-y-6 mt-8">
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-2">What is a temporary email?</h3>
        <p>A temporary email is a disposable email address that you can use for a short period of time without revealing your personal email. It's perfect for signing up to websites, testing services, or avoiding spam.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-2">How long does my temporary email last?</h3>
        <p>All temporary emails and their contents are automatically deleted after 10 hours. This ensures your privacy and keeps our service running efficiently.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-2">Do I need to create an account to use this service?</h3>
        <p>No, our service requires no registration or personal information. Simply visit our website and get a temporary email instantly.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-2">Can I choose my own email address?</h3>
        <p>Currently, our system generates random addresses for maximum efficiency. If you require a custom address, consider our premium options.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-2">Is this service really free?</h3>
        <p>Yes, our basic temporary email service is completely free. We also offer premium features for users who need enhanced functionality.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-2">Can I send emails from my temporary address?</h3>
        <p>No, our service is receive-only. You can receive messages but cannot send them from the temporary address.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-2">Can I access attachments in received emails?</h3>
        <p>Yes, you can view and download attachments from emails received at your temporary address.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-2">Is my temporary email private?</h3>
        <p>We take privacy seriously. Your temporary email address and its contents are only accessible to you via your browser session. However, as with any free email service, we recommend not using it for sensitive or confidential communications.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-2">Can I extend the life of my temporary email?</h3>
        <p>Our free service has a fixed 10-hour lifespan. For longer-lasting disposable emails, please check our premium options.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-2">What happens if I close my browser?</h3>
        <p>Your temporary email address is stored in your browser's local storage. If you clear your browser data or use a different device, you won't be able to access the same temporary inbox.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-2">Are there any limitations to the service?</h3>
        <p>Our free service has some limitations: 10-hour email lifetime, limited attachment size, and some domains may be blocked from sending to our temporary addresses.</p>
    </div>
    
    <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-2">Do you have a mobile app?</h3>
        <p>Yes, we offer mobile apps for both Android and iOS. You can download them from the Google Play Store or Apple App Store.</p>
    </div>
</div>

<div class="mt-10">
    <h3 class="text-xl font-bold mb-4">Still have questions?</h3>
    <p>If you couldn't find the answer to your question, feel free to contact us.</p>
    <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center px-4 py-2 mt-4 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700">
        Contact Us
    </a>
</div>
HTML,
            'meta_description' => 'Find answers to frequently asked questions about our temporary email service, including how it works, email lifetime, privacy, and more.',
            'meta_keywords' => 'temporary email FAQ, disposable email questions, temp mail help, email privacy FAQ',
            'is_published' => true,
        ]);
        
        // Create Contact page
        Page::create([
            'title' => 'Contact Us',
            'slug' => 'contact',
            'content' => <<<HTML
<h2>Contact Us</h2>

<div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
    <div>
        <p class="mb-6">Have questions, feedback, or need assistance with our temporary email service? We're here to help! Please use the form below to get in touch with our team.</p>
        
        <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg mb-6">
            <h3 class="text-xl font-bold mb-4">Contact Information</h3>
            <ul class="space-y-3">
                <li class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-emerald-600 dark:text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>support@tempmail.example.com</span>
                </li>
                <li class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-emerald-600 dark:text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Response Time: Within 24-48 hours</span>
                </li>
            </ul>
        </div>
        
        <div class="bg-slate-50 dark:bg-slate-900 p-6 rounded-lg">
            <h3 class="text-xl font-bold mb-4">Follow Us</h3>
            <div class="flex space-x-4">
                <a href="#" class="text-slate-700 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                    </svg>
                </a>
                <a href="#" class="text-slate-700 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                <a href="#" class="text-slate-700 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    
    <div>
        <form class="bg-white dark:bg-slate-900 p-6 rounded-lg border border-slate-200 dark:border-slate-800 shadow-sm">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Your Name</label>
                <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-slate-300 dark:border-slate-700 rounded-md shadow-sm dark:bg-slate-800 dark:text-white" required>
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Your Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-slate-300 dark:border-slate-700 rounded-md shadow-sm dark:bg-slate-800 dark:text-white" required>
            </div>
            
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Subject</label>
                <input type="text" id="subject" name="subject" class="w-full px-3 py-2 border border-slate-300 dark:border-slate-700 rounded-md shadow-sm dark:bg-slate-800 dark:text-white" required>
            </div>
            
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Message</label>
                <textarea id="message" name="message" rows="5" class="w-full px-3 py-2 border border-slate-300 dark:border-slate-700 rounded-md shadow-sm dark:bg-slate-800 dark:text-white" required></textarea>
            </div>
            
            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-4 rounded transition-colors">
                Send Message
            </button>
        </form>
    </div>
</div>

<div class="mt-12">
    <h3 class="text-xl font-bold mb-6">Frequently Asked Questions</h3>
    <p>Looking for answers to common questions? Check out our <a href="{{ url('/faq') }}" class="text-emerald-600 dark:text-emerald-400 hover:underline">FAQ page</a>.</p>
</div>
HTML,
            'meta_description' => 'Contact our team for questions, feedback, or assistance with our temporary email service. We\'re here to help!',
            'meta_keywords' => 'contact temporary email, email support, temp mail help, disposable email contact',
            'is_published' => true,
        ]);
    }
}
