@extends('layouts.admin')

@section('title', 'Manage Menu')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    
    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-8">
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl font-bold">Menu Management</h1>
            <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">
                Manage navigation menu items that appear in the site header
            </p>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Menu items list -->
        <div class="md:col-span-2">
            <div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mb-8">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4">Current Menu Items</h2>
                    
                    @if($menuItems->isEmpty())
                        <div class="text-center py-8 text-slate-500 dark:text-slate-400">
                            No menu items found. Add your first menu item with the form.
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead class="text-xs font-semibold uppercase text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50">
                                    <tr>
                                        <th class="px-2 py-3 whitespace-nowrap w-16">
                                            <div class="font-semibold text-center">#</div>
                                        </th>
                                        <th class="px-2 py-3 whitespace-nowrap">
                                            <div class="font-semibold text-left">Title</div>
                                        </th>
                                        <th class="px-2 py-3 whitespace-nowrap">
                                            <div class="font-semibold text-left">Type</div>
                                        </th>
                                        <th class="px-2 py-3 whitespace-nowrap">
                                            <div class="font-semibold text-left">URL/Page</div>
                                        </th>
                                        <th class="px-2 py-3 whitespace-nowrap">
                                            <div class="font-semibold text-center">Active</div>
                                        </th>
                                        <th class="px-2 py-3 whitespace-nowrap">
                                            <div class="font-semibold text-right">Actions</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-slate-200 dark:divide-slate-700" id="menu-items-list">
                                    @foreach($menuItems as $item)
                                    <tr data-id="{{ $item->id }}" class="menu-item">
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            <div class="text-center font-medium cursor-move handle">
                                                <svg class="w-5 h-5 inline-block text-slate-400" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path d="M9,3H11V5H9V3M13,3H15V5H13V3M9,7H11V9H9V7M13,7H15V9H13V7M9,11H11V13H9V11M13,11H15V13H13V11M9,15H11V17H9V15M13,15H15V17H13V15M9,19H11V21H9V19M13,19H15V21H13V19Z" />
                                                </svg>
                                            </div>
                                            <input type="hidden" name="items[{{ $item->id }}]" value="{{ $item->order }}" class="item-order">
                                        </td>
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            <div class="font-medium text-slate-800 dark:text-slate-100">{{ $item->title }}</div>
                                        </td>
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            <div class="text-slate-500 dark:text-slate-400 capitalize">{{ $item->type }}</div>
                                        </td>
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            <div class="text-slate-500 dark:text-slate-400">
                                                @if($item->type === 'page')
                                                    {{ $item->page->title ?? 'Unknown page' }}
                                                @elseif($item->type === 'route')
                                                    {{ $item->route_name }}
                                                @else
                                                    {{ $item->url }}
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            <div class="text-center">
                                                <form action="{{ route('admin.menu-items.toggle', $item) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    <button type="submit" class="inline-flex h-8 w-8 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                        <span class="sr-only">Toggle active state</span>
                                                        @if($item->is_active)
                                                            <svg class="h-5 w-5 text-emerald-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                            </svg>
                                                        @else
                                                            <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                            </svg>
                                                        @endif
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="px-2 py-3 whitespace-nowrap">
                                            <div class="flex justify-end space-x-1">
                                                <form action="{{ route('admin.menu-items.destroy', $item) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-sm bg-rose-500 hover:bg-rose-600 text-white" onclick="return confirm('Are you sure you want to delete this menu item?')">
                                                        <span class="sr-only">Delete</span>
                                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Form to add new menu item -->
        <div>
            <div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mb-8">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4">Add Menu Item</h2>
                    
                    <form action="{{ route('admin.menu-items.store') }}" method="POST">
                        @csrf
                        
                        <div class="space-y-4">
                            <!-- Title field -->
                            <div>
                                <label for="title" class="block text-sm font-medium mb-1">Title <span class="text-rose-500">*</span></label>
                                <input id="title" name="title" class="form-input w-full" type="text" value="{{ old('title') }}" required />
                                @error('title')
                                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Type selector -->
                            <div>
                                <label for="type" class="block text-sm font-medium mb-1">Type <span class="text-rose-500">*</span></label>
                                <select id="type" name="type" class="form-select w-full" required>
                                    <option value="page" {{ old('type') == 'page' ? 'selected' : '' }}>Page</option>
                                    <option value="route" {{ old('type') == 'route' ? 'selected' : '' }}>Route</option>
                                    <option value="custom" {{ old('type') == 'custom' ? 'selected' : '' }}>Custom URL</option>
                                </select>
                                @error('type')
                                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Page selector (conditionally shown) -->
                            <div id="page-field" class="conditional-field {{ old('type', 'page') === 'page' ? '' : 'hidden' }}" data-type="page" {{ old('type', 'page') !== 'page' ? 'style="display: none;"' : '' }}>
                                <label for="page_id" class="block text-sm font-medium mb-1">Page <span class="text-rose-500">*</span></label>
                                <select id="page_id" name="page_id" class="form-select w-full" {{ old('type', 'page') === 'page' ? 'required' : '' }}>
                                    <option value="">Select a page</option>
                                    @foreach($pages as $page)
                                        <option value="{{ $page->id }}" {{ old('page_id') == $page->id ? 'selected' : '' }}>{{ $page->title }}</option>
                                    @endforeach
                                </select>
                                @error('page_id')
                                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Route name (conditionally shown) -->
                            <div id="route-field" class="conditional-field {{ old('type') === 'route' ? '' : 'hidden' }}" data-type="route" {{ old('type') !== 'route' ? 'style="display: none;"' : '' }}>
                                <label for="route_name" class="block text-sm font-medium mb-1">Route name <span class="text-rose-500">*</span></label>
                                <select id="route_name" name="route_name" class="form-select w-full" {{ old('type') === 'route' ? 'required' : '' }}>
                                    <option value="">Select a route</option>
                                    <option value="home" {{ old('route_name') == 'home' ? 'selected' : '' }}>Home</option>
                                    <option value="blog.index" {{ old('route_name') == 'blog.index' ? 'selected' : '' }}>Blog</option>
                                    <option value="features" {{ old('route_name') == 'features' ? 'selected' : '' }}>Features</option>
                                    <option value="faq" {{ old('route_name') == 'faq' ? 'selected' : '' }}>FAQ</option>
                                    <option value="api.docs" {{ old('route_name') == 'api.docs' ? 'selected' : '' }}>API</option>
                                    <option value="contact" {{ old('route_name') == 'contact' ? 'selected' : '' }}>Contact</option>
                                </select>
                                @error('route_name')
                                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Custom URL field (conditionally shown) -->
                            <div id="url-field" class="conditional-field {{ old('type') === 'custom' ? '' : 'hidden' }}" data-type="custom" {{ old('type') !== 'custom' ? 'style="display: none;"' : '' }}>
                                <label for="url" class="block text-sm font-medium mb-1">URL <span class="text-rose-500">*</span></label>
                                <input id="url" name="url" class="form-input w-full" type="text" value="{{ old('url') }}" placeholder="https://example.com" {{ old('type') === 'custom' ? 'required' : '' }} />
                                @error('url')
                                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Order field -->
                            <div>
                                <label for="order" class="block text-sm font-medium mb-1">Order</label>
                                <input id="order" name="order" class="form-input w-full" type="number" min="0" value="{{ old('order', $menuItems->count()) }}" />
                                <p class="text-xs text-slate-500 mt-1">Menu items are displayed in ascending order</p>
                                @error('order')
                                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Active checkbox -->
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="is_active" class="form-checkbox" value="1" {{ old('is_active', true) ? 'checked' : '' }} />
                                    <span class="text-sm ml-2">Active (show in menu)</span>
                                </label>
                                @error('is_active')
                                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Submit button -->
                            <div class="flex items-center justify-end">
                                <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                                    Add Menu Item
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Type selector logic
    const typeSelector = document.getElementById('type');
    const pageField = document.getElementById('page-field');
    const routeField = document.getElementById('route-field');
    const urlField = document.getElementById('url-field');
    const pageIdInput = document.getElementById('page_id');
    const routeNameInput = document.getElementById('route_name');
    const urlInput = document.getElementById('url');
    
    console.log('Debug info - Initial state:');
    console.log('Type selector:', typeSelector);
    console.log('Page field:', pageField);
    console.log('Route field:', routeField);
    console.log('URL field:', urlField);
    
    // Function to toggle fields visibility and required attributes
    function toggleFields() {
        const selectedType = typeSelector.value;
        console.log('Selected type:', selectedType);
        
        // First hide all fields and remove required attribute
        pageField.classList.add('hidden');
        routeField.classList.add('hidden');
        urlField.classList.add('hidden');
        pageIdInput.removeAttribute('required');
        routeNameInput.removeAttribute('required');
        urlInput.removeAttribute('required');
        
        // Add debug class to all fields
        pageField.classList.add('debug-hidden');
        routeField.classList.add('debug-hidden');
        urlField.classList.add('debug-hidden');
        
        // Then show and make required only the relevant field
        if (selectedType === 'page') {
            pageField.classList.remove('hidden');
            pageField.classList.remove('debug-hidden');
            pageIdInput.setAttribute('required', 'required');
            console.log('Showing page field');
        } else if (selectedType === 'route') {
            routeField.classList.remove('hidden');
            routeField.classList.remove('debug-hidden');
            routeNameInput.setAttribute('required', 'required');
            console.log('Showing route field');
        } else if (selectedType === 'custom') {
            urlField.classList.remove('hidden');
            urlField.classList.remove('debug-hidden');
            urlInput.setAttribute('required', 'required');
            console.log('Showing URL field');
        }
        
        // Check the actual DOM state after changes
        console.log('After toggle - Page field hidden?', pageField.classList.contains('hidden'));
        console.log('After toggle - Route field hidden?', routeField.classList.contains('hidden'));
        console.log('After toggle - URL field hidden?', urlField.classList.contains('hidden'));
    }
    
    // Run on page load
    toggleFields();
    
    // Add change event listener
    typeSelector.addEventListener('change', function(event) {
        console.log('Type changed to:', event.target.value);
        toggleFields();
    });
    
    // Sortable list
    const menuList = document.getElementById('menu-items-list');
    if (menuList) {
        let orderChanged = false;
        
        new Sortable(menuList, {
            handle: '.handle',
            animation: 150,
            ghostClass: 'bg-slate-100 dark:bg-slate-700',
            onEnd: function() {
                // Update order inputs
                const items = menuList.querySelectorAll('.menu-item');
                items.forEach((item, index) => {
                    const orderInput = item.querySelector('.item-order');
                    orderInput.value = index;
                });
                
                orderChanged = true;
                
                // Save order via AJAX
                saveOrder();
            }
        });
        
        function saveOrder() {
            if (!orderChanged) return;
            
            const orderInputs = menuList.querySelectorAll('.item-order');
            const formData = new FormData();
            
            orderInputs.forEach(input => {
                const id = input.parentElement.parentElement.dataset.id;
                const order = input.value;
                formData.append(`items[${id}]`, order);
            });
            
            fetch('{{ route('admin.menu-items.order') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    orderChanged = false;
                }
            })
            .catch(error => console.error('Error saving order:', error));
        }
    }
});

// Backup solution - direct manipulation
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        console.log('Applying backup solution');
        const typeSelector = document.getElementById('type');
        const pageField = document.getElementById('page-field');
        const routeField = document.getElementById('route-field');
        const urlField = document.getElementById('url-field');
        
        // Force initial state based on current selection
        const initialType = typeSelector.value;
        console.log('Initial type (backup):', initialType);
        
        // Force hide all
        document.querySelectorAll('.conditional-field').forEach(field => {
            field.style.display = 'none';
        });
        
        // Force show selected
        if (initialType === 'page') {
            pageField.style.display = 'block';
        } else if (initialType === 'route') {
            routeField.style.display = 'block';
        } else if (initialType === 'custom') {
            urlField.style.display = 'block';
        }
        
        // Add direct event listener
        typeSelector.addEventListener('change', function() {
            console.log('Type changed (backup):', this.value);
            
            // Hide all first
            document.querySelectorAll('.conditional-field').forEach(field => {
                field.style.display = 'none';
            });
            
            // Show only the selected one
            if (this.value === 'page') {
                pageField.style.display = 'block';
            } else if (this.value === 'route') {
                routeField.style.display = 'block';
            } else if (this.value === 'custom') {
                urlField.style.display = 'block';
            }
        });
    }, 500); // Small delay to ensure DOM is ready
});
</script>

<style>
/* Add !important to override any other styles */
.conditional-field.hidden, .conditional-field.debug-hidden {
    display: none !important;
}
</style>
@endpush 