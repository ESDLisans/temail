<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\EmailAttachment;
use App\Models\EmailMessage;
use App\Models\TemporaryEmail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TempMailApiController extends Controller
{
    /**
     * Get all emails for a temporary email address.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getEmails(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'limit' => 'nullable|integer|min:1|max:100',
            'page' => 'nullable|integer|min:1',
        ]);

        $email = $validated['email'];
        $limit = $validated['limit'] ?? 20;
        $page = $validated['page'] ?? 1;

        $tempEmail = TemporaryEmail::where('email', $email)
            ->where('expires_at', '>', now())
            ->first();

        if (!$tempEmail) {
            return response()->json([
                'success' => false,
                'message' => 'Email address not found or expired'
            ], 404);
        }

        $messages = EmailMessage::where('temp_email_id', $tempEmail->id)
            ->orderBy('received_at', 'desc')
            ->paginate($limit, ['*'], 'page', $page);

        return response()->json([
            'success' => true,
            'data' => [
                'emails' => $messages->items(),
                'pagination' => [
                    'total' => $messages->total(),
                    'per_page' => $messages->perPage(),
                    'current_page' => $messages->currentPage(),
                    'last_page' => $messages->lastPage(),
                ]
            ]
        ]);
    }

    /**
     * Get a specific email message.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function getMessage(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $email = $validated['email'];

        $tempEmail = TemporaryEmail::where('email', $email)
            ->where('expires_at', '>', now())
            ->first();

        if (!$tempEmail) {
            return response()->json([
                'success' => false,
                'message' => 'Email address not found or expired'
            ], 404);
        }

        $message = EmailMessage::where('id', $id)
            ->where('temp_email_id', $tempEmail->id)
            ->with('attachments')
            ->first();

        if (!$message) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found'
            ], 404);
        }

        // Mark as read if not already
        if (!$message->is_read) {
            $message->markAsRead();
        }

        return response()->json([
            'success' => true,
            'data' => $message
        ]);
    }

    /**
     * Delete a specific email message.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function deleteMessage(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $email = $validated['email'];

        $tempEmail = TemporaryEmail::where('email', $email)
            ->where('expires_at', '>', now())
            ->first();

        if (!$tempEmail) {
            return response()->json([
                'success' => false,
                'message' => 'Email address not found or expired'
            ], 404);
        }

        $message = EmailMessage::where('id', $id)
            ->where('temp_email_id', $tempEmail->id)
            ->first();

        if (!$message) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found'
            ], 404);
        }

        // Delete the message
        $message->delete();

        return response()->json([
            'success' => true,
            'message' => 'Email message deleted successfully'
        ]);
    }

    /**
     * Get source of an email message.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function getSourceMessage(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $email = $validated['email'];

        $tempEmail = TemporaryEmail::where('email', $email)
            ->where('expires_at', '>', now())
            ->first();

        if (!$tempEmail) {
            return response()->json([
                'success' => false,
                'message' => 'Email address not found or expired'
            ], 404);
        }

        $message = EmailMessage::where('id', $id)
            ->where('temp_email_id', $tempEmail->id)
            ->first();

        if (!$message) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found'
            ], 404);
        }

        // Return headers and raw content
        return response()->json([
            'success' => true,
            'data' => [
                'headers' => $message->headers,
                'body_html' => $message->body_html,
                'body_text' => $message->body_text,
            ]
        ]);
    }

    /**
     * Get all attachments for an email message.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function getMessageAttachments(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $email = $validated['email'];

        $tempEmail = TemporaryEmail::where('email', $email)
            ->where('expires_at', '>', now())
            ->first();

        if (!$tempEmail) {
            return response()->json([
                'success' => false,
                'message' => 'Email address not found or expired'
            ], 404);
        }

        $message = EmailMessage::where('id', $id)
            ->where('temp_email_id', $tempEmail->id)
            ->first();

        if (!$message) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found'
            ], 404);
        }

        $attachments = EmailAttachment::where('email_message_id', $message->id)->get();

        return response()->json([
            'success' => true,
            'data' => $attachments->map(function ($attachment) {
                return [
                    'id' => $attachment->id,
                    'filename' => $attachment->filename,
                    'mime_type' => $attachment->mime_type,
                    'file_size' => $attachment->file_size,
                    'download_url' => url("/api/attachments/{$attachment->id}"),
                ];
            })
        ]);
    }

    /**
     * Legacy endpoint for getting message attachments.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function getMessageAttachmentsLegacy(Request $request, int $id): JsonResponse
    {
        return $this->getMessageAttachments($request, $id);
    }

    /**
     * Get a specific attachment.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|\Illuminate\Http\Response
     */
    public function getAttachment(Request $request, int $id)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'download' => 'nullable|boolean',
        ]);

        $email = $validated['email'];
        $download = $validated['download'] ?? false;

        $tempEmail = TemporaryEmail::where('email', $email)
            ->where('expires_at', '>', now())
            ->first();

        if (!$tempEmail) {
            return response()->json([
                'success' => false,
                'message' => 'Email address not found or expired'
            ], 404);
        }

        $attachment = EmailAttachment::find($id);

        if (!$attachment) {
            return response()->json([
                'success' => false,
                'message' => 'Attachment not found'
            ], 404);
        }

        // Check if the attachment belongs to the requested email
        $message = EmailMessage::find($attachment->email_message_id);
        if (!$message || $message->temp_email_id !== $tempEmail->id) {
            return response()->json([
                'success' => false,
                'message' => 'Attachment not found for this email'
            ], 404);
        }

        // Return file as download or serve directly based on request
        $content = $attachment->getFileContents();
        $response = response($content, 200, [
            'Content-Type' => $attachment->mime_type,
            'Content-Length' => $attachment->file_size,
        ]);

        if ($download) {
            $response->header('Content-Disposition', 'attachment; filename="' . $attachment->filename . '"');
        }

        return $response;
    }

    /**
     * Get list of available domains.
     *
     * @return JsonResponse
     */
    public function getDomains(): JsonResponse
    {
        $domains = Domain::where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json([
            'success' => true,
            'data' => $domains
        ]);
    }
} 