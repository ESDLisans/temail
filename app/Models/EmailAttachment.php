<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class EmailAttachment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email_message_id',
        'filename',
        'mime_type',
        'file_size',
        'storage_path',
    ];

    /**
     * Get the email message that owns the attachment.
     */
    public function emailMessage(): BelongsTo
    {
        return $this->belongsTo(EmailMessage::class);
    }

    /**
     * Get the attachment file URL.
     */
    public function getFileUrl(): string
    {
        return Storage::url($this->storage_path);
    }

    /**
     * Get the attachment file contents.
     */
    public function getFileContents(): string
    {
        return Storage::get($this->storage_path);
    }
}
