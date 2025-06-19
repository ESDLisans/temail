<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add default language setting
        \App\Models\SiteSetting::create([
            'key' => 'default_language',
            'value' => 'en',
            'group' => 'general',
            'type' => 'select',
            'options' => json_encode([
                'en' => 'English',
                'tr' => 'Türkçe'
            ]),
            'label' => 'Default Language',
            'description' => 'Set the default language for the website',
            'order' => 99
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \App\Models\SiteSetting::where('key', 'default_language')->delete();
    }
};
