<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'order',
        'is_active',
        'type',
        'page_id',
        'route_name'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function getUrlAttribute($value)
    {
        if ($this->type === 'page' && $this->page) {
            // Use the page.show route for pages
            try {
                return route('page.show', $this->page->slug);
            } catch (\Exception $e) {
                // Fallback to direct slug
                return url('/' . $this->page->slug);
            }
        } elseif ($this->type === 'route' && $this->route_name) {
            try {
                return route($this->route_name);
            } catch (\Exception $e) {
                // Fallback if route doesn't exist
                return url('/');
            }
        }
        
        return $value;
    }
}
