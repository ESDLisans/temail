<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SiteSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'order',
        'is_required',
        'description',
        'options'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_required' => 'boolean',
        'options' => 'array',
    ];

    /**
     * The cache key prefix for settings.
     */
    const CACHE_KEY = 'site_settings';

    /**
     * Get a setting value by key.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        return self::getValue($key, $default);
    }

    /**
     * Get a setting by key with enhanced caching and type handling
     *
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public static function getValue(string $key, mixed $default = null): mixed
    {
        // Use a unique cache key for each setting
        $cacheKey = self::CACHE_KEY . "_{$key}";
        
        // Shorter cache time to ensure updates are reflected quickly
        $setting = Cache::remember($cacheKey, 60, function () use ($key) {
            return self::where('key', $key)->first();
        });

        if (!$setting) {
            return $default;
        }

        // Handle image types by returning the full URL
        if ($setting->type === 'image' && !empty($setting->value)) {
            return Storage::url($setting->value);
        }

        return $setting->value ?? $default;
    }

    /**
     * Set a setting value by key.
     *
     * @param string $key
     * @param mixed $value
     * @return SiteSetting|null
     */
    public static function set($key, $value)
    {
        return self::setValue($key, $value);
    }

    /**
     * Set a setting by key with validation and caching
     *
     * @param string $key
     * @param mixed $value
     * @return bool|SiteSetting
     */
    public static function setValue(string $key, mixed $value)
    {
        $setting = self::where('key', $key)->first();

        if (!$setting) {
            $setting = self::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        } else {
            $setting->value = $value;
            $setting->save();
        }

        // Clear the cache for this specific setting
        $cacheKey = self::CACHE_KEY . "_{$key}";
        Cache::forget($cacheKey);
        
        // Also clear the general cache
        self::flushCache();

        return $setting;
    }

    /**
     * Get all settings as a key-value array.
     *
     * @return array
     */
    public static function getAll()
    {
        return Cache::remember(self::CACHE_KEY . '_array', 60, function () {
            return self::all()->pluck('value', 'key')->toArray();
        });
    }

    /**
     * Get all settings grouped by their group or by the first part of the key.
     *
     * @return array|\Illuminate\Support\Collection
     */
    public static function getAllGrouped()
    {
        return Cache::remember('settings_grouped', 60, function () {
            $settings = self::orderBy('group')
                ->orderBy('order')
                ->get();

            // If we have explicit group fields, use those
            if ($settings->first() && isset($settings->first()->group)) {
                $grouped = [];
                foreach ($settings as $setting) {
                    $grouped[$setting->group][] = $setting;
                }
                return $grouped;
            } 
            
            // Otherwise group by the first part of the key
            return $settings->groupBy(function ($setting) {
                $parts = explode('.', $setting->key);
                return $parts[0];
            });
        });
    }

    /**
     * Clear all settings cache.
     *
     * @return void
     */
    public static function flushCache()
    {
        Cache::forget(self::CACHE_KEY);
        Cache::forget(self::CACHE_KEY . '_array');
        Cache::forget(self::CACHE_KEY . '_grouped');
        Cache::forget('settings_grouped');
        
        // Get all settings and forget their individual caches
        $settings = self::all();
        foreach ($settings as $setting) {
            Cache::forget(self::CACHE_KEY . "_{$setting->key}");
        }
    }
}
