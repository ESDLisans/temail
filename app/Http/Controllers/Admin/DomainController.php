<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class DomainController extends Controller
{
    /**
     * Display a listing of the domains.
     */
    public function index(): View
    {
        $domains = Domain::orderBy('name')->get();
        
        return view('admin.domains.index', [
            'domains' => $domains,
        ]);
    }
    
    /**
     * Show the form for creating a new domain.
     */
    public function create(): View
    {
        return view('admin.domains.create');
    }
    
    /**
     * Store a newly created domain in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:domains',
            'is_active' => 'nullable|boolean',
            'mx_record' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);
        
        // Set default values
        $validated['is_active'] = $request->has('is_active');
        
        Domain::create($validated);
        
        return redirect()->route('admin.domains.index')
            ->with('success', 'Domain created successfully.');
    }
    
    /**
     * Show the form for editing the specified domain.
     */
    public function edit(Domain $domain): View
    {
        return view('admin.domains.edit', [
            'domain' => $domain,
        ]);
    }
    
    /**
     * Update the specified domain in storage.
     */
    public function update(Request $request, Domain $domain)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:domains,name,' . $domain->id,
            'is_active' => 'nullable|boolean',
            'mx_record' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);
        
        // Set default values
        $validated['is_active'] = $request->has('is_active');
        
        $domain->update($validated);
        
        return redirect()->route('admin.domains.index')
            ->with('success', 'Domain updated successfully.');
    }
    
    /**
     * Remove the specified domain from storage.
     */
    public function destroy(Domain $domain)
    {
        // Check if domain is in use
        if ($domain->temporaryEmails()->exists()) {
            return redirect()->route('admin.domains.index')
                ->with('error', 'Domain cannot be deleted as it is in use by temporary emails.');
        }
        
        $domain->delete();
        
        return redirect()->route('admin.domains.index')
            ->with('success', 'Domain deleted successfully.');
    }
}
