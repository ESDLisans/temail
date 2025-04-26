<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\EmailMessage;
use App\Models\TemporaryEmail;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        // Get key statistics for the dashboard
        $stats = [
            'total_domains' => Domain::count(),
            'active_domains' => Domain::where('is_active', true)->count(),
            'active_temp_emails' => TemporaryEmail::where('expires_at', '>', now())->count(),
            'total_messages' => EmailMessage::count(),
            'messages_today' => EmailMessage::whereDate('created_at', today())->count(),
        ];
        
        // Get most recent messages
        $recentMessages = EmailMessage::with('temporaryEmail')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
            
        return view('admin.dashboard', [
            'stats' => $stats,
            'recentMessages' => $recentMessages,
        ]);
    }
}
