<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class LegalPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Terms of Service
        Page::create([
            'title' => 'Terms of Service',
            'slug' => 'terms-of-service',
            'content' => '
            <h2>1. Acceptance of Terms</h2>
            <p>By accessing and using TempMail, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>
            
            <h2>2. Service Description</h2>
            <p>TempMail provides temporary, disposable email addresses that automatically expire after a set period. Our service is designed to protect your privacy when signing up for online services or receiving verification emails.</p>
            
            <h2>3. User Responsibilities</h2>
            <ul>
                <li>You must not use our service for any unlawful or prohibited activities</li>
                <li>You must not attempt to abuse or circumvent any technical limitations</li>
                <li>You must not use our service to send spam or malicious content</li>
                <li>You must not use our service for any illegal activities</li>
            </ul>
            
            <h2>4. Privacy and Data Protection</h2>
            <p>We are committed to protecting your privacy. All temporary email addresses are automatically deleted after 10 hours. We do not store personal information or track user activities beyond what is necessary for service operation.</p>
            
            <h2>5. Service Availability</h2>
            <p>While we strive to provide reliable service, we do not guarantee 100% uptime. The service is provided "as is" without warranties of any kind, either express or implied.</p>
            
            <h2>6. Limitations of Liability</h2>
            <p>TempMail shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly.</p>
            
            <h2>7. Changes to Terms</h2>
            <p>We reserve the right to modify these terms at any time. Changes will be effective immediately upon posting on this page.</p>
            
            <h2>8. Contact Information</h2>
            <p>If you have any questions about these Terms of Service, please contact us through our Contact page.</p>
            
            <p><em>Last updated: ' . now()->format('F j, Y') . '</em></p>',
            'meta_title' => 'Terms of Service - TempMail',
            'meta_description' => 'Read our Terms of Service to understand the rules and guidelines for using our temporary email service.',
            'is_active' => true,
        ]);

        // Privacy Policy
        Page::create([
            'title' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'content' => '
            <h2>Information We Collect</h2>
            <p>TempMail is designed with privacy in mind. We collect minimal information necessary to provide our service:</p>
            <ul>
                <li><strong>Temporary Email Data:</strong> Generated email addresses and received messages are stored temporarily</li>
                <li><strong>Usage Analytics:</strong> Basic, anonymized usage statistics to improve our service</li>
                <li><strong>Technical Data:</strong> Server logs for security and performance monitoring</li>
            </ul>
            
            <h2>How We Use Your Information</h2>
            <p>The information we collect is used solely to:</p>
            <ul>
                <li>Provide and maintain our temporary email service</li>
                <li>Improve service performance and reliability</li>
                <li>Detect and prevent abuse or security threats</li>
                <li>Comply with legal obligations when required</li>
            </ul>
            
            <h2>Data Retention</h2>
            <p>We automatically delete all temporary email addresses and their contents after 10 hours. This ensures your privacy and prevents data accumulation.</p>
            
            <h2>Data Sharing</h2>
            <p>We do not sell, trade, or share your personal information with third parties, except:</p>
            <ul>
                <li>When required by law or legal process</li>
                <li>To protect our rights, property, or safety</li>
                <li>With service providers who assist in site operation (under strict confidentiality)</li>
            </ul>
            
            <h2>Cookies and Tracking</h2>
            <p>We use minimal cookies to maintain your session and preferences. We do not use tracking cookies for advertising purposes.</p>
            
            <h2>Security</h2>
            <p>We implement appropriate security measures to protect your information against unauthorized access, alteration, disclosure, or destruction.</p>
            
            <h2>Your Rights</h2>
            <p>You have the right to:</p>
            <ul>
                <li>Delete your temporary email at any time</li>
                <li>Request information about data we may have</li>
                <li>Opt out of non-essential services</li>
            </ul>
            
            <h2>Contact Us</h2>
            <p>If you have questions about this Privacy Policy, please contact us through our Contact page.</p>
            
            <p><em>Last updated: ' . now()->format('F j, Y') . '</em></p>',
            'meta_title' => 'Privacy Policy - TempMail',
            'meta_description' => 'Learn how we protect your privacy and handle your data when using our temporary email service.',
            'is_active' => true,
        ]);

        // Cookie Policy
        Page::create([
            'title' => 'Cookie Policy',
            'slug' => 'cookie-policy',
            'content' => '
            <h2>What Are Cookies?</h2>
            <p>Cookies are small text files that are stored on your device when you visit our website. They help us provide you with a better experience by remembering your preferences and improving site functionality.</p>
            
            <h2>Types of Cookies We Use</h2>
            
            <h3>Essential Cookies</h3>
            <p>These cookies are necessary for the website to function properly. They enable core functionality such as:</p>
            <ul>
                <li>Maintaining your temporary email session</li>
                <li>Remembering your theme preference (light/dark mode)</li>
                <li>Security and authentication</li>
            </ul>
            
            <h3>Functional Cookies</h3>
            <p>These cookies enhance your experience by:</p>
            <ul>
                <li>Remembering your language preferences</li>
                <li>Storing your email refresh settings</li>
                <li>Maintaining your inbox view preferences</li>
            </ul>
            
            <h3>Analytics Cookies</h3>
            <p>We use minimal analytics to understand how our service is used. These cookies help us:</p>
            <ul>
                <li>Count visitors and measure traffic</li>
                <li>Understand which features are most popular</li>
                <li>Identify and fix technical issues</li>
            </ul>
            
            <h2>Third-Party Cookies</h2>
            <p>We may use services from trusted third parties that place cookies on your device. These include:</p>
            <ul>
                <li>Content delivery networks for faster loading</li>
                <li>Analytics services for usage statistics</li>
                <li>Security services for DDoS protection</li>
            </ul>
            
            <h2>Managing Cookies</h2>
            <p>You can control cookies through your browser settings. However, disabling certain cookies may affect the functionality of our service.</p>
            
            <h3>Browser Controls</h3>
            <ul>
                <li><strong>Chrome:</strong> Settings > Privacy and Security > Cookies</li>
                <li><strong>Firefox:</strong> Options > Privacy & Security</li>
                <li><strong>Safari:</strong> Preferences > Privacy</li>
                <li><strong>Edge:</strong> Settings > Site Permissions > Cookies</li>
            </ul>
            
            <h2>Cookie Duration</h2>
            <p>Most of our cookies expire when you close your browser (session cookies). Some functional cookies may last longer to remember your preferences across visits.</p>
            
            <h2>Updates to This Policy</h2>
            <p>We may update this Cookie Policy to reflect changes in our practices or for other operational, legal, or regulatory reasons.</p>
            
            <p><em>Last updated: ' . now()->format('F j, Y') . '</em></p>',
            'meta_title' => 'Cookie Policy - TempMail',
            'meta_description' => 'Learn about how we use cookies to improve your experience on our temporary email service.',
            'is_active' => true,
        ]);

        // GDPR Compliance
        Page::create([
            'title' => 'GDPR Compliance',
            'slug' => 'gdpr-compliance',
            'content' => '
            <h2>Our Commitment to GDPR</h2>
            <p>TempMail is committed to complying with the General Data Protection Regulation (GDPR) and protecting the privacy rights of all users, especially those in the European Union.</p>
            
            <h2>Lawful Basis for Processing</h2>
            <p>We process personal data based on the following lawful bases:</p>
            <ul>
                <li><strong>Legitimate Interest:</strong> To provide and improve our temporary email service</li>
                <li><strong>Consent:</strong> For optional features like analytics (where applicable)</li>
                <li><strong>Legal Obligation:</strong> When required to comply with laws</li>
            </ul>
            
            <h2>Your Rights Under GDPR</h2>
            <p>As a user, you have the following rights:</p>
            
            <h3>Right to Access</h3>
            <p>You can request information about what personal data we process about you.</p>
            
            <h3>Right to Rectification</h3>
            <p>You can request correction of inaccurate personal data.</p>
            
            <h3>Right to Erasure</h3>
            <p>You can request deletion of your personal data. Note: All temporary emails are automatically deleted after 10 hours.</p>
            
            <h3>Right to Restrict Processing</h3>
            <p>You can request limitation of how we process your personal data.</p>
            
            <h3>Right to Data Portability</h3>
            <p>You can request your data in a structured, commonly used format.</p>
            
            <h3>Right to Object</h3>
            <p>You can object to processing based on legitimate interests.</p>
            
            <h2>Data Protection Measures</h2>
            <ul>
                <li><strong>Data Minimization:</strong> We collect only necessary data</li>
                <li><strong>Purpose Limitation:</strong> Data is used only for stated purposes</li>
                <li><strong>Storage Limitation:</strong> Automatic deletion after 10 hours</li>
                <li><strong>Security:</strong> Appropriate technical and organizational measures</li>
                <li><strong>Transparency:</strong> Clear information about data processing</li>
            </ul>
            
            <h2>International Transfers</h2>
            <p>If we transfer data outside the EU, we ensure appropriate safeguards are in place, such as:</p>
            <ul>
                <li>Adequacy decisions by the European Commission</li>
                <li>Standard contractual clauses</li>
                <li>Binding corporate rules</li>
            </ul>
            
            <h2>Data Protection Officer</h2>
            <p>For GDPR-related inquiries, you can contact our Data Protection Officer through our Contact page. Please specify that your inquiry is GDPR-related.</p>
            
            <h2>Supervisory Authority</h2>
            <p>You have the right to lodge a complaint with your local data protection supervisory authority if you believe we have not complied with GDPR requirements.</p>
            
            <h2>Regular Updates</h2>
            <p>We regularly review and update our data protection practices to ensure continued GDPR compliance.</p>
            
            <p><em>Last updated: ' . now()->format('F j, Y') . '</em></p>',
            'meta_title' => 'GDPR Compliance - TempMail',
            'meta_description' => 'Learn about our GDPR compliance measures and your data protection rights when using our service.',
            'is_active' => true,
        ]);
    }
} 