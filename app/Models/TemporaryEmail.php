<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TemporaryEmail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'local_part',
        'domain_id',
        'expires_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'expires_at' => 'datetime',
    ];

    /**
     * Get the domain that owns the temporary email.
     */
    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }

    /**
     * Get the email messages for the temporary email.
     */
    public function messages(): HasMany
    {
        return $this->hasMany(EmailMessage::class, 'temp_email_id');
    }

    /**
     * Check if the temporary email has expired.
     */
    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }
}
