<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmailMessage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'temp_email_id',
        'message_id',
        'from',
        'subject',
        'body_html',
        'body_text',
        'headers',
        'is_read',
        'is_starred',
        'in_reply_to_id',
        'received_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'headers' => 'array',
        'is_read' => 'boolean',
        'is_starred' => 'boolean',
        'received_at' => 'datetime',
    ];

    /**
     * Get the temporary email that owns the message.
     */
    public function temporaryEmail(): BelongsTo
    {
        return $this->belongsTo(TemporaryEmail::class, 'temp_email_id');
    }

    /**
     * Get the parent message that this message is a reply to.
     */
    public function parentMessage(): BelongsTo
    {
        return $this->belongsTo(EmailMessage::class, 'in_reply_to_id');
    }
    
    /**
     * Get the replies to this message.
     */
    public function replies(): HasMany
    {
        return $this->hasMany(EmailMessage::class, 'in_reply_to_id');
    }

    /**
     * Get the attachments for the email message.
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(EmailAttachment::class);
    }

    /**
     * Mark the email as read.
     */
    public function markAsRead(): bool
    {
        return $this->update(['is_read' => true]);
    }

    /**
     * Toggle the starred status of the email.
     */
    public function toggleStar(): bool
    {
        return $this->update(['is_starred' => !$this->is_starred]);
    }
}
