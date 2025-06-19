<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function robots()
    {
        $content = SiteSetting::get('robots_txt', "User-agent: *\nAllow: /\nSitemap: " . url('/sitemap.xml'));
        return response($content)->header('Content-Type', 'text/plain');
    }
    
    public function sitemap()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        $urls = [
            ['url' => url('/'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => url('/temp-mail'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => url('/features'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => url('/faq'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => url('/contact'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => url('/blog'), 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['url' => url('/api-docs'), 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => url('/terms-of-service'), 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => url('/privacy-policy'), 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => url('/cookie-policy'), 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => url('/gdpr-compliance'), 'priority' => '0.6', 'changefreq' => 'monthly'],
        ];
        
        foreach ($urls as $url) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . htmlspecialchars($url['url']) . '</loc>' . "\n";
            $xml .= '    <priority>' . $url['priority'] . '</priority>' . "\n";
            $xml .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . "\n";
            $xml .= '  </url>' . "\n";
        }
        
        $xml .= '</urlset>';
        
        return response($xml)->header('Content-Type', 'application/xml');
    }
}
