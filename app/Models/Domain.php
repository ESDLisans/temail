<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Domain extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'is_active',
        'mx_record',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // Clear cache when domain is updated or created
        static::saved(function () {
            Cache::forget('available_domains');
        });
        
        // Clear cache when domain is deleted
        static::deleted(function () {
            Cache::forget('available_domains');
        });
    }

    /**
     * Get the temporary emails associated with this domain.
     */
    public function temporaryEmails(): HasMany
    {
        return $this->hasMany(TemporaryEmail::class);
    }
}
