<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdSlot;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdSlotController extends Controller
{
    /**
     * Display a listing of the ad slots.
     */
    public function index(): View
    {
        $adSlots = AdSlot::all();
        
        return view('admin.ad-slots.index', [
            'adSlots' => $adSlots,
        ]);
    }
    
    /**
     * Show the form for creating a new ad slot.
     */
    public function create(): View
    {
        // Define common ad positions
        $positions = [
            'header' => 'Header',
            'sidebar' => 'Sidebar',
            'footer' => 'Footer',
            'below_inbox' => 'Below Inbox',
            'above_inbox' => 'Above Inbox',
            'email_view' => 'Email View Page',
        ];
        
        return view('admin.ad-slots.create', [
            'positions' => $positions,
        ]);
    }
    
    /**
     * Store a newly created ad slot in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'ad_code' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);
        
        // Set default values
        $validated['is_active'] = $request->has('is_active');
        
        AdSlot::create($validated);
        
        return redirect()->route('admin.ad-slots.index')
            ->with('success', 'Ad slot created successfully.');
    }
    
    /**
     * Show the form for editing the specified ad slot.
     */
    public function edit(AdSlot $adSlot): View
    {
        // Define common ad positions
        $positions = [
            'header' => 'Header',
            'sidebar' => 'Sidebar',
            'footer' => 'Footer',
            'below_inbox' => 'Below Inbox',
            'above_inbox' => 'Above Inbox',
            'email_view' => 'Email View Page',
        ];
        
        return view('admin.ad-slots.edit', [
            'adSlot' => $adSlot,
            'positions' => $positions,
        ]);
    }
    
    /**
     * Update the specified ad slot in storage.
     */
    public function update(Request $request, AdSlot $adSlot)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'ad_code' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);
        
        // Set default values
        $validated['is_active'] = $request->has('is_active');
        
        $adSlot->update($validated);
        
        return redirect()->route('admin.ad-slots.index')
            ->with('success', 'Ad slot updated successfully.');
    }
    
    /**
     * Remove the specified ad slot from storage.
     */
    public function destroy(AdSlot $adSlot)
    {
        $adSlot->delete();
        
        return redirect()->route('admin.ad-slots.index')
            ->with('success', 'Ad slot deleted successfully.');
    }
}
