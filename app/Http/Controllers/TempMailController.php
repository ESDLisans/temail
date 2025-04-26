<?php

namespace App\Http\Controllers;

use App\Models\AdSlot;
use App\Models\Domain;
use App\Models\EmailMessage;
use App\Models\TemporaryEmail;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TempMailController extends Controller
{
    /**
     * Display the temporary email inbox.
     */
    public function index(Request $request): View
    {
        // Get or create a temporary email
        $tempEmail = $this->getOrCreateTemporaryEmail($request);
        
        // Get ads for display
        $ads = AdSlot::where('is_active', true)->get()->keyBy('position');
        
        // Get the messages for this email
        $messages = [];
        $emails = []; // Initialize emails variable for the component
        $emailContent = null; // Initialize emailContent for the component
        $timeLeft = 0; // Initialize timeLeft variable for the timer
        
        if ($tempEmail) {
            $messages = EmailMessage::where('temp_email_id', $tempEmail->id)
                ->orderBy('received_at', 'desc')
                ->get();
            
            // Transform messages to format expected by email-list component
            $emails = $messages; // Assign messages to emails for the component
            
            // If we have messages, set the first one as email content
            if ($messages->isNotEmpty()) {
                $emailContent = $messages->first();
            }
            
            // Calculate time left until expiration in seconds
            $timeLeft = max(0, now()->diffInSeconds($tempEmail->expires_at));
        }
        
        // Get favorite emails
        $favoriteEmails = $tempEmail ? EmailMessage::where('temp_email_id', $tempEmail->id)
            ->where('is_starred', true)
            ->orderBy('received_at', 'desc')
            ->get() : collect();
        
        return view('temp-mail', [
            'tempEmail' => $tempEmail,
            'messages' => $messages,
            'emails' => $emails, // Pass emails variable to the view
            'emailContent' => $emailContent, // Pass emailContent variable
            'timeLeft' => $timeLeft, // Pass timeLeft for the countdown timer
            'favoriteEmails' => $favoriteEmails, // Pass favorite emails to the view
            'ads' => $ads,
        ]);
    }
    
    /**
     * View a specific email message.
     */
    public function viewMessage(Request $request, int $messageId): View|JsonResponse
    {
        $email = $this->getTemporaryEmail($request);
        
        if (!$email) {
            return response()->json(['error' => 'No temporary email found'], 404);
        }
        
        $message = EmailMessage::where('id', $messageId)
            ->where('temp_email_id', $email->id)
            ->with('attachments')
            ->first();
            
        if (!$message) {
            return response()->json(['error' => 'Message not found'], 404);
        }
        
        // Mark as read
        if (!$message->is_read) {
            $message->markAsRead();
        }
        
        return view('email-view', [
            'message' => $message,
            'email' => $email,
        ]);
    }
    
    /**
     * Generate a new random email.
     */
    public function regenerate(Request $request): JsonResponse
    {
        // Delete current email if exists
        $currentEmail = $this->getTemporaryEmail($request);
        if ($currentEmail) {
            $currentEmail->delete();
        }
        
        // Create new email
        $email = $this->createTemporaryEmail();
        
        // Set cookie
        Cookie::queue('temp_email_id', $email->id, 60); // 60 min
        
        return response()->json([
            'success' => true,
            'email' => $email->email,
        ]);
    }
    
    /**
     * Refresh inbox to check for new messages (AJAX endpoint).
     */
    public function refreshInbox(Request $request): JsonResponse
    {
        $email = $this->getTemporaryEmail($request);
        
        if (!$email) {
            return response()->json(['error' => 'No temporary email found'], 404);
        }
        
        $messages = EmailMessage::where('temp_email_id', $email->id)
            ->orderBy('received_at', 'desc')
            ->get();
            
        return response()->json([
            'success' => true,
            'messages' => $messages,
        ]);
    }
    
    /**
     * Get or create a temporary email for the current session.
     */
    private function getOrCreateTemporaryEmail(Request $request): ?TemporaryEmail
    {
        $emailId = $request->cookie('temp_email_id');
        
        // If we have an email ID in cookie, try to find it
        if ($emailId) {
            $email = TemporaryEmail::find($emailId);
            
            // If found and not expired, return it
            if ($email && !$email->isExpired()) {
                return $email;
            }
        }
        
        // Create a new temporary email
        return $this->createTemporaryEmail();
    }
    
    /**
     * Get the current temporary email (without creating a new one).
     */
    private function getTemporaryEmail(Request $request): ?TemporaryEmail
    {
        $emailId = $request->cookie('temp_email_id');
        
        if (!$emailId) {
            return null;
        }
        
        $email = TemporaryEmail::find($emailId);
        
        if (!$email || $email->isExpired()) {
            return null;
        }
        
        return $email;
    }
    
    /**
     * Create a new temporary email.
     */
    private function createTemporaryEmail(): TemporaryEmail
    {
        // Get a random active domain
        $domain = Domain::where('is_active', true)->inRandomOrder()->first();
        
        if (!$domain) {
            throw new \Exception('No active domains available for temporary email creation');
        }
        
        // Generate a random username
        $username = Str::random(10) . mt_rand(100, 999);
        
        // Create the email
        $email = TemporaryEmail::create([
            'email' => $username . '@' . $domain->name,
            'local_part' => $username,
            'domain_id' => $domain->id,
            'expires_at' => Carbon::now()->addMinutes(15),
        ]);
        
        // Set cookie
        Cookie::queue('temp_email_id', $email->id, 60); // 60 min
        
        return $email;
    }
    
    /**
     * Delete the current temporary email.
     */
    public function deleteEmail(Request $request): JsonResponse
    {
        // Get current email if it exists
        $email = $this->getTemporaryEmail($request);
        
        if ($email) {
            // Delete the email and all related data
            $email->delete();
            
            // Clear the cookie
            Cookie::queue(Cookie::forget('temp_email_id'));
            
            return response()->json([
                'success' => true,
                'message' => 'Email deleted successfully',
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'No email found to delete',
        ]);
    }
    
    /**
     * Toggle favorite status for an email message.
     */
    public function toggleFavorite(Request $request, int $id): JsonResponse
    {
        $email = $this->getTemporaryEmail($request);
        
        if (!$email) {
            return response()->json(['error' => 'No temporary email found'], 404);
        }
        
        $message = EmailMessage::where('id', $id)
            ->where('temp_email_id', $email->id)
            ->first();
            
        if (!$message) {
            return response()->json(['error' => 'Message not found'], 404);
        }
        
        $message->toggleStar();
        
        return response()->json([
            'success' => true,
            'is_starred' => $message->is_starred,
        ]);
    }
}
