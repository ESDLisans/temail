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
            
            // Save the email message
            $emailMessage = $this->saveEmailMessage($mail, $tempEmail);
            
            // Process attachments if any
            if (!empty($mail->getAttachments())) {
                $this->processAttachments($mail, $emailMessage);
            }
            
            // Delete the email from server after processing
            $mailbox->deleteMail($mailId);
            
        } catch (\Exception $e) {
            Log::error("Error processing email ID $mailId: " . $e->getMessage());
        }
    }
    
    /**
     * Extract recipient email from headers.
     */
    private function extractRecipientEmail(object $headers): ?string
    {
        // Try to get from To, Cc, or Delivered-To headers
        $possibleHeaders = ['to', 'delivered-to', 'x-delivered-to', 'cc'];
        
        foreach ($possibleHeaders as $header) {
            if (isset($headers->$header)) {
                $matches = [];
                if (preg_match('/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})/', $headers->$header, $matches)) {
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
        return TemporaryEmail::where('email', strtolower($email))
            ->where('expires_at', '>', Carbon::now())
            ->first();
    }
    
    /**
     * Save an email message to the database.
     */
    private function saveEmailMessage($mail, TemporaryEmail $tempEmail): EmailMessage
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
