<?php

namespace App\Services;

use App\Models\EmailAttachment;
use App\Models\EmailMessage;
use App\Models\SmtpSetting;
use App\Models\TemporaryEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpImap\Exceptions\ConnectionException;
use PhpImap\Mailbox;

class EmailReceiver
{
    /**
     * Fetch emails from the IMAP server.
     */
    public function fetchEmails(): void
    {
        try {
            $smtpSetting = SmtpSetting::where('is_active', true)->first();
            
            if (!$smtpSetting) {
                Log::warning('No active SMTP settings found for email fetching');
                return;
            }
            
            // Setup mailbox connection
            $mailbox = $this->connectToMailbox($smtpSetting);
            
            // Get mailbox emails
            $mailIds = $mailbox->searchMailbox('ALL');
            
            if (!$mailIds) {
                Log::info('No emails found on the server');
                return;
            }
            
            foreach ($mailIds as $mailId) {
                $this->processEmail($mailbox, $mailId);
            }
            
        } catch (ConnectionException $e) {
            Log::error('IMAP Connection Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error fetching emails: ' . $e->getMessage());
        }
    }
    
    /**
     * Connect to the IMAP mailbox.
     */
    private function connectToMailbox(SmtpSetting $smtpSetting): Mailbox
    {
        $host = $smtpSetting->host;
        $port = $smtpSetting->port;
        $username = $smtpSetting->username;
        $password = $smtpSetting->decrypted_password;
        $encryption = $smtpSetting->encryption;
        
        // IMAP path format: {imap.example.com:993/imap/ssl}INBOX
        $imapPath = "{{$host}:{$port}/imap/{$encryption}}INBOX";
        
        return new Mailbox(
            $imapPath,
            $username,
            $password,
            storage_path('app/attachments'),
            'UTF-8'
        );
    }
    
    /**
     * Process a single email from the mailbox.
     */
    private function processEmail(Mailbox $mailbox, int $mailId): void
    {
        try {
            $mail = $mailbox->getMail($mailId);
            
            // Extract the recipient email address
            $recipientEmail = $this->extractRecipientEmail($mail->headers);
            
            if (!$recipientEmail) {
                Log::warning("Could not determine recipient for email ID: $mailId");
                return;
            }
            
            // Find the temporary email in our database
            $tempEmail = $this->findTemporaryEmail($recipientEmail);
            
            if (!$tempEmail) {
                Log::info("Recipient not found or expired: $recipientEmail for email ID: $mailId");
                return;
            }
            
            // Check for spam indicators
            if ($this->isLikelySpam($mail)) {
                Log::info("Detected potential spam email for: $recipientEmail, email ID: $mailId");
                // You can decide to still save it but mark as spam, or just log the occurrence
            }
            
            // Check if it's a reply to an existing message
            $isReply = $this->isReplyToExistingMessage($mail, $tempEmail);
            
            // Save the email message
            $emailMessage = $this->saveEmailMessage($mail, $tempEmail, $isReply);
            
            // Process attachments if any
            if (!empty($mail->getAttachments())) {
                $this->processAttachments($mail, $emailMessage);
            }
            
            // Delete the email from server after processing
            $mailbox->deleteMail($mailId);
            
        } catch (\Throwable $e) {
            Log::error("Error processing email ID $mailId: " . $e->getMessage());
            Log::error($e->getTraceAsString());
        }
    }
    
    /**
     * Check if an email is likely to be spam.
     */
    private function isLikelySpam($mail): bool
    {
        $spamIndicators = 0;
        $maxIndicators = 5;
        
        // Check for common spam words in subject
        $spamWords = ['viagra', 'cialis', 'casino', 'lottery', 'winner', 'free money', 'bank account', 
                      'password', 'credit card', 'investment', 'loan', 'bitcoin', 'crypto'];
                      
        foreach ($spamWords as $word) {
            if (stripos($mail->subject, $word) !== false) {
                $spamIndicators++;
            }
        }
        
        // Check for excessive exclamation marks in subject
        if (substr_count($mail->subject, '!') > 3) {
            $spamIndicators++;
        }
        
        // Check for typical spam headers
        $headers = (array)$mail->headers;
        if (isset($headers['x-spam-flag']) && strtolower($headers['x-spam-flag']) === 'yes') {
            $spamIndicators += 2;
        }
        
        // Check for suspicious bulk mail headers
        if (isset($headers['precedence']) && in_array(strtolower($headers['precedence']), ['bulk', 'junk'])) {
            $spamIndicators++;
        }
        
        return $spamIndicators >= 2; // If 2 or more indicators, consider it spam
    }
    
    /**
     * Determine if the email is a reply to an existing message.
     */
    private function isReplyToExistingMessage($mail, TemporaryEmail $tempEmail): ?int
    {
        // Check for In-Reply-To or References headers
        $headers = (array)$mail->headers;
        $messageIds = [];
        
        if (isset($headers['in-reply-to'])) {
            $messageIds[] = $this->extractMessageId($headers['in-reply-to']);
        }
        
        if (isset($headers['references'])) {
            $references = explode(' ', $headers['references']);
            foreach ($references as $ref) {
                $messageIds[] = $this->extractMessageId($ref);
            }
        }
        
        // Remove empty entries
        $messageIds = array_filter($messageIds);
        
        if (empty($messageIds)) {
            return null;
        }
        
        // Find if any of the message IDs match a stored email
        foreach ($messageIds as $messageId) {
            $originalMessage = \App\Models\EmailMessage::where('message_id', $messageId)
                ->where('temp_email_id', $tempEmail->id)
                ->first();
                
            if ($originalMessage) {
                return $originalMessage->id;
            }
        }
        
        return null;
    }
    
    /**
     * Extract clean message ID from header.
     */
    private function extractMessageId(string $header): ?string
    {
        $matches = [];
        if (preg_match('/<(.+?)>/', $header, $matches)) {
            return $matches[1];
        }
        return null;
    }
    
    /**
     * Extract recipient email from headers.
     */
    private function extractRecipientEmail(object $headers): ?string
    {
        // Try to get from To, Cc, or Delivered-To headers
        $possibleHeaders = ['to', 'delivered-to', 'x-delivered-to', 'cc', 'x-original-to', 'envelope-to', 'x-rcpt-to', 'x-forwarded-to'];
        
        foreach ($possibleHeaders as $header) {
            if (isset($headers->$header)) {
                $matches = [];
                if (preg_match('/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})/', $headers->$header, $matches)) {
                    return strtolower($matches[1]);
                }
            }
        }
        
        // Fallback to check all headers if we can't find in standard headers
        foreach ((array)$headers as $headerName => $headerValue) {
            // Try to find any email address that might be the original recipient
            if (is_string($headerValue)) {
                $matches = [];
                if (preg_match('/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})/', $headerValue, $matches)) {
                    return strtolower($matches[1]);
                }
            }
        }
        
        return null;
    }
    
    /**
     * Find a temporary email by email address.
     */
    private function findTemporaryEmail(string $email): ?TemporaryEmail
    {
        // First try exact match
        $tempEmail = TemporaryEmail::where('email', strtolower($email))
            ->where('expires_at', '>', Carbon::now())
            ->first();
            
        if ($tempEmail) {
            return $tempEmail;
        }
        
        // If no exact match, try to extract local part and domain
        $parts = explode('@', strtolower($email));
        if (count($parts) == 2) {
            $localPart = $parts[0];
            $domain = $parts[1];
            
            // Search by local part and domain
            return TemporaryEmail::whereHas('domain', function ($query) use ($domain) {
                    $query->where('name', $domain);
                })
                ->where('local_part', $localPart)
                ->where('expires_at', '>', Carbon::now())
                ->first();
        }
        
        return null;
    }
    
    /**
     * Save an email message to the database.
     */
    private function saveEmailMessage($mail, TemporaryEmail $tempEmail, ?int $replyToId = null): EmailMessage
    {
        return EmailMessage::create([
            'temp_email_id' => $tempEmail->id,
            'message_id' => $mail->messageId,
            'from' => $mail->fromAddress,
            'subject' => $mail->subject,
            'body_html' => $mail->textHtml ?: null,
            'body_text' => $mail->textPlain ?: null,
            'headers' => json_decode(json_encode($mail->headers), true),
            'is_read' => false,
            'is_starred' => false,
            'in_reply_to_id' => $replyToId,
            'received_at' => Carbon::createFromTimestamp($mail->date),
        ]);
    }
    
    /**
     * Process email attachments.
     */
    private function processAttachments($mail, EmailMessage $emailMessage): void
    {
        $attachmentsDir = 'public/attachments/' . $emailMessage->id;
        
        foreach ($mail->getAttachments() as $attachment) {
            $filename = $attachment->name;
            $fileContent = $attachment->getContents();
            $filePath = $attachmentsDir . '/' . $filename;
            
            // Save file content to storage
            Storage::put($filePath, $fileContent);
            
            // Create attachment record
            EmailAttachment::create([
                'email_message_id' => $emailMessage->id,
                'filename' => $filename,
                'mime_type' => $attachment->mime,
                'file_size' => strlen($fileContent),
                'storage_path' => $filePath,
            ]);
        }
    }
}
