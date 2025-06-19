<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    /**
     * Display the features page
     */
    public function features()
    {
        // Get the page content from database if it exists
        $page = Page::where('slug', 'features')->first();
        
        return view('pages.features', compact('page'));
    }
    
    /**
     * Display the FAQ page
     */
    public function faq()
    {
        // Get the page content from database if it exists
        $page = Page::where('slug', 'faq')->first();
        
        return view('pages.faq', compact('page'));
    }
    
    /**
     * Display the contact page
     */
    public function contact()
    {
        // Get the page content from database if it exists
        $page = Page::where('slug', 'contact')->first();
        
        return view('pages.contact', compact('page'));
    }

    /**
     * Handle contact form submission
     */
    public function submitContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Store the contact submission or send email
        try {
            // You can implement email sending here
            $contactData = $validator->validated();
            
            // For now, we'll just redirect with success message
            // In production, you might want to send an email to admin
            
            return back()->with('success', 'Thank you for your message! We will get back to you soon.');
        } catch (\Exception $e) {
            return back()->with('error', 'Sorry, there was an error sending your message. Please try again.');
        }
    }

    /**
     * Display a specific page by its slug
     */
    public function show(Page $page)
    {
        if (!$page->is_active) {
            abort(404);
        }
        
        // First try to find a dedicated view for this page
        if (view()->exists('pages.' . $page->slug)) {
            return view('pages.' . $page->slug, compact('page'));
        }
        
        // Fall back to generic page template
        return view('pages.show', compact('page'));
    }
}
