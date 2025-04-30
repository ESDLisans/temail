<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the site settings grouped by category.
     */
    public function index()
    {
        $settings = SiteSetting::all();
        
        // Group settings by group
        $grouped_settings = $settings->groupBy('group');
        
        return view('admin.site-settings.index', compact('grouped_settings'));
    }

    /**
     * Show the form for editing the settings of a specific group.
     */
    public function edit($group)
    {
        $settings = SiteSetting::where('group', $group)->orderBy('order')->get();
        
        if ($settings->isEmpty()) {
            return redirect()->route('admin.site-settings.index')
                ->with('error', "No settings found for group: {$group}");
        }
        
        return view('admin.site-settings.edit', compact('settings', 'group'));
    }

    /**
     * Update the specified settings in storage.
     */
    public function update(Request $request, $group)
    {
        $settings = SiteSetting::where('group', $group)->get();
        
        if ($settings->isEmpty()) {
            return redirect()->route('admin.site-settings.index')
                ->with('error', "No settings found for group: {$group}");
        }
        
        // Build validation rules based on settings
        $rules = [];
        foreach ($settings as $setting) {
            $validation_type = match($setting->type) {
                'text', 'textarea' => 'string',
                'number' => 'numeric',
                'boolean' => 'boolean',
                'email' => 'email',
                'url' => 'url',
                'image' => 'nullable|image|max:2048',
                'color' => ['regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
                default => 'string',
            };
            
            if ($setting->type === 'image') {
                // Image can be null if it already exists
                if ($setting->is_required && empty($setting->value)) {
                    $rules["settings.{$setting->key}"] = $validation_type;
                } else {
                    $rules["settings.{$setting->key}"] = 'nullable|' . $validation_type;
                }
            } else {
                if ($setting->is_required) {
                    $rules["settings.{$setting->key}"] = 'required|' . $validation_type;
                } else {
                    $rules["settings.{$setting->key}"] = 'nullable|' . $validation_type;
                }
            }
        }
        
        $validated = $request->validate($rules);
        
        // Update settings
        foreach ($settings as $setting) {
            if (isset($validated['settings'][$setting->key]) || $request->hasFile("settings.{$setting->key}")) {
                // Handle file uploads
                if ($setting->type === 'image' && $request->hasFile("settings.{$setting->key}")) {
                    // Remove old file if exists
                    if (!empty($setting->value) && Storage::exists($setting->value)) {
                        Storage::delete($setting->value);
                    }
                    
                    // Store new file
                    $path = $request->file("settings.{$setting->key}")->store('site-settings', 'public');
                    $setting->value = $path;
                } 
                // Handle boolean values for checkboxes
                elseif ($setting->type === 'boolean') {
                    $setting->value = isset($validated['settings'][$setting->key]) ? 1 : 0;
                }
                // Handle all other types
                else {
                    $setting->value = $validated['settings'][$setting->key] ?? null;
                }
                
                $setting->save();
            }
        }
        
        // Flush the cache
        SiteSetting::flushCache();
        
        return redirect()->route('admin.site-settings.index')
            ->with('success', ucfirst($group) . ' settings updated successfully');
    }

    /**
     * Create default settings for a fresh installation.
     * 
     * @param bool $fromCli Whether this method is being called from CLI
     * @return mixed
     */
    public function createDefaults($fromCli = false)
    {
        // Define default settings
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
        
        // Insert default settings if they don't exist
        foreach ($settings as $setting) {
            SiteSetting::firstOrCreate(['key' => $setting['key']], $setting);
        }
        
        // Flush the cache
        SiteSetting::flushCache();
        
        if ($fromCli) {
            return true;
        }
        
        return redirect()->route('admin.site-settings.index')
            ->with('success', 'Default settings created successfully');
    }
}
