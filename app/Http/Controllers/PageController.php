<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

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
}
