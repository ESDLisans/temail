<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SmtpSetting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SmtpSettingController extends Controller
{
    /**
     * Display a listing of the SMTP settings.
     */
    public function index(): View
    {
        $smtpSettings = SmtpSetting::all();
        
        return view('admin.smtp-settings.index', [
            'smtpSettings' => $smtpSettings,
        ]);
    }
    
    /**
     * Show the form for creating a new SMTP setting.
     */
    public function create(): View
    {
        return view('admin.smtp-settings.create');
    }
    
    /**
     * Store a newly created SMTP setting in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'host' => 'required|string|max:255',
            'port' => 'required|integer',
            'username' => 'required|string|max:255',
            'password' => 'required|string',
            'encryption' => 'required|string|in:ssl,tls,none',
            'from_address' => 'nullable|email',
            'from_name' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);
        
        // Set default values
        $validated['is_active'] = $request->has('is_active');
        
        // If this is active, disable all other SMTP settings
        if ($validated['is_active']) {
            SmtpSetting::where('is_active', true)->update(['is_active' => false]);
        }
        
        SmtpSetting::create($validated);
        
        return redirect()->route('admin.smtp-settings.index')
            ->with('success', 'SMTP setting created successfully.');
    }
    
    /**
     * Show the form for editing the specified SMTP setting.
     */
    public function edit(SmtpSetting $smtpSetting): View
    {
        return view('admin.smtp-settings.edit', [
            'smtpSetting' => $smtpSetting,
        ]);
    }
    
    /**
     * Update the specified SMTP setting in storage.
     */
    public function update(Request $request, SmtpSetting $smtpSetting)
    {
        $validated = $request->validate([
            'host' => 'required|string|max:255',
            'port' => 'required|integer',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string',
            'encryption' => 'required|string|in:ssl,tls,none',
            'from_address' => 'nullable|email',
            'from_name' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);
        
        // Set default values
        $validated['is_active'] = $request->has('is_active');
        
        // If password is empty, remove it from the validated data
        if (empty($validated['password'])) {
            unset($validated['password']);
        }
        
        // If this is active, disable all other SMTP settings
        if ($validated['is_active']) {
            SmtpSetting::where('id', '!=', $smtpSetting->id)
                ->where('is_active', true)
                ->update(['is_active' => false]);
        }
        
        $smtpSetting->update($validated);
        
        return redirect()->route('admin.smtp-settings.index')
            ->with('success', 'SMTP setting updated successfully.');
    }
    
    /**
     * Remove the specified SMTP setting from storage.
     */
    public function destroy(SmtpSetting $smtpSetting)
    {
        $smtpSetting->delete();
        
        return redirect()->route('admin.smtp-settings.index')
            ->with('success', 'SMTP setting deleted successfully.');
    }
    
    /**
     * Test the SMTP connection.
     */
    public function testConnection(SmtpSetting $smtpSetting)
    {
        try {
            // First, check if the host is resolvable
            $host = $smtpSetting->host;
            if (!filter_var($host, FILTER_VALIDATE_IP)) {
                // If it's not an IP address, check if the domain is resolvable
                if (!checkdnsrr($host, 'A') && !checkdnsrr($host, 'AAAA')) {
                    return redirect()->route('admin.smtp-settings.index')
                        ->with('error', "DNS resolution failed: Cannot resolve the hostname '{$host}'. Please verify the SMTP host is correct and accessible.");
                }
            }
            
            // Test the connection configuration
            $config = [
                'host' => $smtpSetting->host,
                'port' => $smtpSetting->port,
                'encryption' => $smtpSetting->encryption !== 'none' ? $smtpSetting->encryption : null,
                'username' => $smtpSetting->username,
                'password' => $smtpSetting->decrypted_password,
            ];
            
            // Configure a temporary mailer
            config([
                'mail.mailers.temp' => [
                    'transport' => 'smtp',
                    'host' => $config['host'],
                    'port' => $config['port'],
                    'encryption' => $config['encryption'],
                    'username' => $config['username'],
                    'password' => $config['password'],
                    'timeout' => 30,
                    'local_domain' => env('MAIL_EHLO_DOMAIN'),
                ],
            ]);
            
            // Create a new mailer instance with our temp configuration
            $mailer = app('mail.manager')->mailer('temp');
            
            // Test the connection by getting the transport
            $transport = $mailer->getSymfonyTransport();
            $transport->start();
            
            return redirect()->route('admin.smtp-settings.index')
                ->with('success', 'SMTP connection test was successful.');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            $suggestions = '';
            
            // Check for common SMTP errors and provide suggestions
            if (stripos($errorMessage, 'getaddrinfo') !== false || stripos($errorMessage, 'nodename nor servname provided') !== false) {
                $suggestions = 'Suggestion: Verify that the SMTP hostname is spelled correctly and is accessible from your server.';
            } elseif (stripos($errorMessage, 'authentication failed') !== false || stripos($errorMessage, 'AUTH') !== false) {
                $suggestions = 'Suggestion: Check your username and password credentials.';
            } elseif (stripos($errorMessage, 'connection timed out') !== false) {
                $suggestions = 'Suggestion: Verify that the SMTP server is reachable and that the port is not blocked by a firewall.';
            } elseif (stripos($errorMessage, 'certificate') !== false || stripos($errorMessage, 'ssl') !== false) {
                $suggestions = 'Suggestion: There might be an SSL/TLS issue. Try changing the encryption method or verify the SSL certificate on the server.';
            }
            
            return redirect()->route('admin.smtp-settings.index')
                ->with('error', 'SMTP connection test failed: ' . $errorMessage . ($suggestions ? "\n\n" . $suggestions : ''));
        }
    }
}
