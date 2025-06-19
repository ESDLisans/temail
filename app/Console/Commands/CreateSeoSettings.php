<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SiteSetting;

class CreateSeoSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seo:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create SEO settings for the site';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Creating SEO settings...');
        
        // Define SEO settings
        $seoSettings = [
            // SEO Settings
            [
                'key' => 'google_analytics_id',
                'value' => '',
                'group' => 'seo',
                'type' => 'text',
                'label' => 'Google Analytics ID',
                'description' => 'Google Analytics tracking ID (e.g., G-XXXXXXXXXX)',
                'is_required' => false,
                'order' => 1,
            ],
            [
                'key' => 'google_tag_manager_id',
                'value' => '',
                'group' => 'seo',
                'type' => 'text',
                'label' => 'Google Tag Manager ID',
                'description' => 'Google Tag Manager container ID (e.g., GTM-XXXXXXX)',
                'is_required' => false,
                'order' => 2,
            ],
            [
                'key' => 'google_search_console_verification',
                'value' => '',
                'group' => 'seo',
                'type' => 'text',
                'label' => 'Google Search Console Verification',
                'description' => 'Google Search Console verification meta tag content',
                'is_required' => false,
                'order' => 3,
            ],
            [
                'key' => 'bing_webmaster_verification',
                'value' => '',
                'group' => 'seo',
                'type' => 'text',
                'label' => 'Bing Webmaster Verification',
                'description' => 'Bing Webmaster Tools verification meta tag content',
                'is_required' => false,
                'order' => 4,
            ],
            [
                'key' => 'robots_txt',
                'value' => "User-agent: *\nAllow: /\nSitemap: " . url('/sitemap.xml'),
                'group' => 'seo',
                'type' => 'textarea',
                'label' => 'Robots.txt Content',
                'description' => 'Content for robots.txt file',
                'is_required' => false,
                'order' => 5,
            ],
            [
                'key' => 'structured_data_enabled',
                'value' => '1',
                'group' => 'seo',
                'type' => 'boolean',
                'label' => 'Enable Structured Data',
                'description' => 'Enable JSON-LD structured data for better SEO',
                'is_required' => false,
                'order' => 6,
            ],
            [
                'key' => 'sitemap_enabled',
                'value' => '1',
                'group' => 'seo',
                'type' => 'boolean',
                'label' => 'Enable XML Sitemap',
                'description' => 'Automatically generate XML sitemap',
                'is_required' => false,
                'order' => 7,
            ],
            [
                'key' => 'canonical_urls_enabled',
                'value' => '1',
                'group' => 'seo',
                'type' => 'boolean',
                'label' => 'Enable Canonical URLs',
                'description' => 'Add canonical URLs to prevent duplicate content',
                'is_required' => false,
                'order' => 8,
            ],
            [
                'key' => 'meta_robots',
                'value' => 'index, follow',
                'group' => 'seo',
                'type' => 'select',
                'label' => 'Meta Robots',
                'description' => 'Default robots directive for search engines',
                'options' => [
                    'index, follow' => 'Index, Follow',
                    'index, nofollow' => 'Index, No Follow',
                    'noindex, follow' => 'No Index, Follow',
                    'noindex, nofollow' => 'No Index, No Follow',
                ],
                'is_required' => false,
                'order' => 9,
            ],
            [
                'key' => 'hreflang_enabled',
                'value' => '0',
                'group' => 'seo',
                'type' => 'boolean',
                'label' => 'Enable Hreflang',
                'description' => 'Enable hreflang tags for multi-language support',
                'is_required' => false,
                'order' => 10,
            ],
        ];
        
        // Create settings
        $created = 0;
        $updated = 0;
        
        foreach ($seoSettings as $setting) {
            $existing = SiteSetting::where('key', $setting['key'])->first();
            
            if ($existing) {
                $existing->update($setting);
                $updated++;
                $this->line("Updated: {$setting['key']}");
            } else {
                SiteSetting::create($setting);
                $created++;
                $this->line("Created: {$setting['key']}");
            }
        }
        
        // Clear cache
        SiteSetting::flushCache();
        
        $this->info("SEO settings setup completed!");
        $this->info("Created: {$created} settings");
        $this->info("Updated: {$updated} settings");
        
        return Command::SUCCESS;
    }
}
