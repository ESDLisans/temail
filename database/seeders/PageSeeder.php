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
            'title' => 'TempMail Features',
            'slug' => 'features',
            'content' => '<h2>Our Features</h2>
            <p>TempMail offers a comprehensive set of features designed to protect your privacy and provide a seamless temporary email experience:</p>
            
            <ul>
                <li><strong>Instant Email Creation</strong> - Generate a random email address in seconds with no registration or personal information required.</li>
                <li><strong>Complete Privacy</strong> - Protect your identity with our anonymous email service. We never collect or share your personal data.</li>
                <li><strong>Real-Time Notifications</strong> - Receive instant alerts when new emails arrive in your temporary inbox without refreshing the page.</li>
                <li><strong>Rich Email Viewer</strong> - View emails with full HTML support, images, and attachments directly in your browser.</li>
                <li><strong>Email Forwarding</strong> - Forward messages from your temporary inbox to your permanent email address with a single click.</li>
                <li><strong>Multiple Domains</strong> - Choose from multiple domain options for your temporary email address to bypass email restrictions.</li>
                <li><strong>Auto-Delete</strong> - Emails are automatically deleted after 10 hours to maintain your privacy and keep your inbox clean.</li>
                <li><strong>Spam Detection</strong> - Our advanced algorithms automatically detect and flag suspicious emails to protect you from phishing and malware.</li>
                <li><strong>Developer API</strong> - Integrate our temporary email service into your applications with our comprehensive API for developers.</li>
            </ul>',
            'meta_title' => 'TempMail Features - Protect Your Privacy with Our Temporary Email Service',
            'meta_description' => 'Discover all the powerful features that make our temporary email service the best choice for protecting your privacy.',
            'is_active' => true,
        ]);

        // Create FAQ page
        Page::create([
            'title' => 'Frequently Asked Questions',
            'slug' => 'faq',
            'content' => '<h2>General Questions</h2>
            <h3>What is TempMail?</h3>
            <p>TempMail is a free online service that allows you to create temporary, disposable email addresses. These addresses automatically expire after a set period, helping you protect your privacy and avoid spam in your primary inbox.</p>
            
            <h3>How long do temporary emails last?</h3>
            <p>By default, emails in your temporary inbox will be automatically deleted after 10 hours. This timeframe gives you sufficient time to receive and use verification emails or sign-up confirmations while ensuring your data doesn\'t linger unnecessarily.</p>
            
            <h3>Is TempMail completely free?</h3>
            <p>Yes, TempMail is completely free to use for everyone. There are no hidden fees, subscriptions, or usage limits. The service is supported by minimal, non-intrusive advertising, allowing us to maintain and improve our platform while keeping it free for all users.</p>
            
            <h2>Privacy & Security</h2>
            <h3>Is my data secure with TempMail?</h3>
            <p>Yes, we prioritize your privacy and security. We don\'t require any personal information to create a temporary email address. All emails are automatically deleted after the expiration period, and we don\'t store or share any of your data with third parties. Our service runs on secure servers with industry-standard encryption.</p>
            
            <h3>Can someone trace my temporary email back to me?</h3>
            <p>TempMail is designed to be anonymous. We don\'t collect or store your IP address or any personal information that could be used to identify you. However, keep in mind that if you use your temporary email to log into services that require personal information, those services may have their own data collection practices.</p>',
            'meta_title' => 'TempMail FAQ - Answers to Your Temporary Email Questions',
            'meta_description' => 'Find answers to common questions about our temporary email service, including privacy concerns, usage tips, and troubleshooting help.',
            'is_active' => true,
        ]);

        // Create Contact page
        Page::create([
            'title' => 'Contact Us',
            'slug' => 'contact',
            'content' => '<h2>Get in Touch</h2>
            <p>We\'re here to help with any questions, suggestions, or concerns you may have about our temporary email service. Fill out the form, and we\'ll get back to you as soon as possible.</p>
            
            <h3>Contact Information</h3>
            <ul>
                <li><strong>Email:</strong> support@tempmail.io</li>
                <li><strong>Support Hours:</strong> Monday to Friday, 9am - 5pm EST</li>
                <li><strong>Response Time:</strong> Within 24 hours</li>
            </ul>
            
            <h3>Feedback</h3>
            <p>We\'re constantly working to improve TempMail and would love to hear your feedback. Let us know what you like about our service and what we could do better.</p>',
            'meta_title' => 'Contact TempMail - Get Support and Share Feedback',
            'meta_description' => 'Have questions or feedback? Get in touch with our team. We\'re here to help with any inquiries about our temporary email service.',
            'is_active' => true,
        ]);
    }
}
