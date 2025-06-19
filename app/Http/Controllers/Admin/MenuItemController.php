<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Page;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::orderBy('order')->get();
        $pages = Page::where('is_active', true)->get();
        
        return view('admin.menu-items.index', compact('menuItems', 'pages'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:page,custom,route',
            'url' => 'required_if:type,custom|nullable|string|max:255',
            'page_id' => 'required_if:type,page|nullable|exists:pages,id',
            'route_name' => 'required_if:type,route|nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);
        
        // Set url to null for page and route types
        if ($validated['type'] === 'page' || $validated['type'] === 'route') {
            $validated['url'] = null;
        }
        
        $validated['is_active'] = $request->has('is_active');
        
        MenuItem::create($validated);
        
        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item created successfully');
    }
    
    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|in:page,custom,route',
            'url' => 'sometimes|required_if:type,custom|nullable|string|max:255',
            'page_id' => 'sometimes|required_if:type,page|nullable|exists:pages,id',
            'route_name' => 'sometimes|required_if:type,route|nullable|string|max:255',
            'order' => 'sometimes|nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);
        
        // Set url to null for page and route types
        if (isset($validated['type']) && ($validated['type'] === 'page' || $validated['type'] === 'route')) {
            $validated['url'] = null;
        }
        
        // Handle checkbox
        if ($request->has('is_active')) {
            $validated['is_active'] = true;
        } else {
            $validated['is_active'] = false;
        }
        
        $menuItem->update($validated);
        
        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item updated successfully');
    }
    
    public function toggleActive(MenuItem $menuItem)
    {
        $menuItem->update([
            'is_active' => !$menuItem->is_active
        ]);
        
        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item status updated');
    }
    
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        
        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item deleted successfully');
    }
    
    public function updateOrder(Request $request)
    {
        $items = $request->get('items', []);
        
        foreach ($items as $id => $order) {
            MenuItem::where('id', $id)->update(['order' => $order]);
        }
        
        return response()->json(['success' => true]);
    }
}
