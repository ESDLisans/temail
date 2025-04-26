<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TempMailController extends Controller
{
    public function index()
    {
        // Örnek e-posta verileri - gerçek uygulamada veritabanından gelecek
        $emails = [
            [
                'id' => 1,
                'sender' => 'notifications@example.com',
                'senderName' => 'Example Service',
                'subject' => 'Your account has been verified',
                'preview' => 'Thank you for verifying your account. You can now access all features...',
                'time' => '10:45 AM',
                'read' => false,
                'starred' => false,
            ],
            [
                'id' => 2,
                'sender' => 'newsletter@tech-updates.com',
                'senderName' => 'Tech Updates',
                'subject' => 'Weekly Tech Digest: AI Advancements',
                'preview' => 'This week in tech: New breakthroughs in artificial intelligence are changing...',
                'time' => 'Yesterday',
                'read' => true,
                'starred' => true,
            ],
            [
                'id' => 3,
                'sender' => 'support@service.io',
                'senderName' => 'Service Support',
                'subject' => 'Your subscription is expiring soon',
                'preview' => 'Your premium subscription will expire in 3 days. Renew now to continue...',
                'time' => '2 days ago',
                'read' => true,
                'starred' => false,
            ],
        ];

        $emailContent = [
            'id' => 1,
            'sender' => 'notifications@example.com',
            'senderName' => 'Example Service',
            'subject' => 'Your account has been verified',
            'time' => 'Today at 10:45 AM',
            'content' => '
                <p>Hello,</p>
                <p>Thank you for verifying your account. You can now access all features of our service.</p>
                <p>Here\'s what you can do next:</p>
                <ul>
                    <li>Complete your profile</li>
                    <li>Explore our premium features</li>
                    <li>Connect with other users</li>
                </ul>
                <p>If you have any questions, please don\'t hesitate to contact our support team.</p>
                <p>Best regards,<br>The Example Team</p>
            ',
        ];

        return view('temp-mail', [
            'emails' => $emails,
            'emailContent' => $emailContent,
            'tempEmail' => 'temp.user28491@tempmail.io',
            'timeLeft' => 10 * 60 * 60, // 10 saat (saniye cinsinden)
        ]);
    }

    public function generateEmail(Request $request)
    {
        $newEmail = 'temp.user' . rand(10000, 99999) . '@tempmail.io';
        
        return response()->json([
            'email' => $newEmail,
            'success' => true
        ]);
    }

    public function deleteEmail(Request $request)
    {
        // Gerçek uygulamada veritabanından silme işlemi yapılacak
        return response()->json([
            'success' => true
        ]);
    }

    public function deleteMail(Request $request)
    {
        $mailId = $request->input('id');
        // Gerçek uygulamada veritabanından silme işlemi yapılacak
        
        return response()->json([
            'success' => true
        ]);
    }
}
