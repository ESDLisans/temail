<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->string('type')->default('text');
            $table->string('label');
            $table->text('description')->nullable();
            $table->boolean('is_required')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
        
        // Insert default settings
        $this->insertDefaultSettings();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
    
    /**
     * Insert default site settings
     */
    private function insertDefaultSettings(): void
    {
        $settings = [
            // General Settings
            [
                'key' => 'site_title',
                'value' => 'TempMail - Free Temporary Disposable Email Service',
                'group' => 'general',
                'type' => 'text',
                'label' => 'Site Title',
                'description' => 'The title displayed in browser tabs and search results',
                'is_required' => true,
                'order' => 1,
            ],
            [
                'key' => 'site_description',
                'value' => 'Create temporary, disposable email addresses to protect your privacy from spam and unwanted emails. Our free service auto-deletes emails after 10 hours.',
                'group' => 'general',
                'type' => 'textarea',
                'label' => 'Site Description',
                'description' => 'Meta description for search engines',
                'is_required' => true,
                'order' => 2,
            ],
            [
                'key' => 'site_keywords',
                'value' => 'temporary email, disposable email, temp mail, fake email, anonymous email, email privacy, anti-spam',
                'group' => 'general',
                'type' => 'textarea',
                'label' => 'Site Keywords',
                'description' => 'Meta keywords for search engines (comma separated)',
                'is_required' => false,
                'order' => 3,
            ],
            
            // Logo & Favicon Settings
            [
                'key' => 'site_logo',
                'value' => null,
                'group' => 'appearance',
                'type' => 'image',
                'label' => 'Site Logo',
                'description' => 'Upload your site logo (recommended size: 200x50)',
                'is_required' => false,
                'order' => 1,
            ],
            [
                'key' => 'site_favicon',
                'value' => null,
                'group' => 'appearance',
                'type' => 'image',
                'label' => 'Site Favicon',
                'description' => 'Upload your site favicon (recommended size: 32x32)',
                'is_required' => false,
                'order' => 2,
            ],
            [
                'key' => 'site_apple_touch_icon',
                'value' => null,
                'group' => 'appearance',
                'type' => 'image',
                'label' => 'Apple Touch Icon',
                'description' => 'Upload your Apple touch icon (recommended size: 180x180)',
                'is_required' => false,
                'order' => 3,
            ],
            
            // Social Media Settings
            [
                'key' => 'og_image',
                'value' => null,
                'group' => 'social',
                'type' => 'image',
                'label' => 'Social Media Image',
                'description' => 'Image displayed when sharing on social media (recommended size: 1200x630)',
                'is_required' => false,
                'order' => 1,
            ],
            [
                'key' => 'og_title',
                'value' => 'TempMail - Free Temporary Disposable Email Service',
                'group' => 'social',
                'type' => 'text',
                'label' => 'Social Media Title',
                'description' => 'Title displayed when sharing on social media',
                'is_required' => false,
                'order' => 2,
            ],
            [
                'key' => 'og_description',
                'value' => 'Create temporary, disposable email addresses to protect your privacy from spam and unwanted emails.',
                'group' => 'social',
                'type' => 'textarea',
                'label' => 'Social Media Description',
                'description' => 'Description displayed when sharing on social media',
                'is_required' => false,
                'order' => 3,
            ],
            
            // Footer Settings
            [
                'key' => 'footer_about',
                'value' => 'Secure, temporary email addresses for your privacy needs. No registration required.',
                'group' => 'footer',
                'type' => 'textarea',
                'label' => 'Footer About Text',
                'description' => 'Short description displayed in the footer',
                'is_required' => false,
                'order' => 1,
            ],
            [
                'key' => 'footer_contact_email',
                'value' => 'contact@tempmail.io',
                'group' => 'footer',
                'type' => 'text',
                'label' => 'Contact Email',
                'description' => 'Email address displayed in the footer',
                'is_required' => false,
                'order' => 2,
            ],
            [
                'key' => 'footer_copyright',
                'value' => '© ' . date('Y') . ' TempMail. All rights reserved.',
                'group' => 'footer',
                'type' => 'text',
                'label' => 'Copyright Text',
                'description' => 'Copyright notice displayed in the footer',
                'is_required' => false,
                'order' => 3,
            ],
        ];
        
        foreach ($settings as $setting) {
            DB::table('site_settings')->insert($setting);
        }
    }
};
