<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\SiteSetting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $settingsToAdd = [
            [
                'key' => 'app_store_url',
                'value' => '#',
                'group' => 'social',
                'type' => 'url',
                'label' => 'App Store URL',
                'description' => 'Link to your application on the Apple App Store',
                'is_required' => false,
                'order' => 4,
            ],
            [
                'key' => 'google_play_url',
                'value' => '#',
                'group' => 'social',
                'type' => 'url',
                'label' => 'Google Play URL',
                'description' => 'Link to your application on the Google Play Store',
                'is_required' => false,
                'order' => 5,
            ],
            [
                'key' => 'chrome_extension_url',
                'value' => '#',
                'group' => 'social',
                'type' => 'url',
                'label' => 'Chrome Extension URL',
                'description' => 'Link to your Chrome browser extension',
                'is_required' => false,
                'order' => 6,
            ],
        ];

        foreach ($settingsToAdd as $setting) {
            SiteSetting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        SiteSetting::whereIn('key', ['app_store_url', 'google_play_url', 'chrome_extension_url'])->delete();
    }
};
