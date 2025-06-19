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
        SiteSetting::firstOrCreate(
            ['key' => 'site_logo_dark'], 
            [
                'value' => null,
                'group' => 'appearance',
                'type' => 'image',
                'label' => 'Dark Mode Logo',
                'description' => 'Upload your site logo for dark mode (optional, uses light logo if empty)',
                'is_required' => false,
                'order' => 1.5,
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        SiteSetting::where('key', 'site_logo_dark')->delete();
    }
};
