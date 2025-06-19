<?php

use App\Http\Controllers\Admin\AdSlotController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SmtpSettingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController as FrontendPageController;
use App\Http\Controllers\TempMailController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Default login redirect
Route::redirect('/login', '/admin/login')->name('login');

// Frontend Routes
Route::get('/', [TempMailController::class, 'index'])->name('home');
Route::get('/temp-mail', [TempMailController::class, 'index'])->name('temp-mail');
Route::get('/message/{messageId}', [TempMailController::class, 'viewMessage'])->name('message.view');
Route::post('/regenerate', [TempMailController::class, 'regenerate'])->name('regenerate');
Route::get('/refresh-inbox', [TempMailController::class, 'refreshInbox'])->name('refresh.inbox');
Route::post('/search', [TempMailController::class, 'searchInbox'])->name('search.inbox');
Route::post('/forward/{id}', [TempMailController::class, 'forwardEmail'])->name('forward.email');

// SEO Routes (must be before generic routes)
Route::get('robots.txt', [SeoController::class, 'robots'])->name('robots');
Route::get('sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');

// Static Pages
Route::get('/features', [FrontendPageController::class, 'features'])->name('features');
Route::get('/faq', [FrontendPageController::class, 'faq'])->name('faq');
Route::get('/contact', [FrontendPageController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendPageController::class, 'submitContact'])->name('contact.submit');

// Generic page route for custom pages
Route::get('/{page:slug}', [FrontendPageController::class, 'show'])->name('page.show')->where('page', '^(?!api-docs|blog|admin|message|generate-email|delete-email|regenerate|refresh-inbox|copy-email|mark-as-read|favorite).*$');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// Email Generation and Deletion Routes
Route::post('/generate-email', [TempMailController::class, 'regenerate'])->name('generate.email');
Route::post('/delete-email', [TempMailController::class, 'deleteEmail'])->name('delete.email');

// Additional Frontend Routes (to prevent future errors)
Route::post('/copy-email', function() { return response()->json(['success' => true]); })->name('copy.email');
Route::post('/mark-as-read/{id}', function($id) { return response()->json(['success' => true]); })->name('mark.read');
Route::post('/favorite/{id}', [TempMailController::class, 'toggleFavorite'])->name('favorite.toggle');

// Add register route reference to prevent errors
Route::redirect('/register', '/admin/login')->name('register');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });
    
    Route::middleware('auth')->group(function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        
        // Profile Management
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
        
        // Domain Management
        Route::resource('domains', DomainController::class);
        
        // SMTP Settings
        Route::resource('smtp-settings', SmtpSettingController::class);
        Route::post('/smtp-settings/{smtpSetting}/test', [SmtpSettingController::class, 'testConnection'])
            ->name('smtp-settings.test');
        
        // Ad Slots
        Route::resource('ad-slots', AdSlotController::class);
        
        // Pages Management
        Route::resource('pages', PageController::class);

        // Blog Posts Management
        Route::resource('posts', PostController::class);
        
        // Menu Management
        Route::get('/menu-items', [MenuItemController::class, 'index'])->name('menu-items.index');
        Route::post('/menu-items', [MenuItemController::class, 'store'])->name('menu-items.store');
        Route::put('/menu-items/{menuItem}', [MenuItemController::class, 'update'])->name('menu-items.update');
        Route::delete('/menu-items/{menuItem}', [MenuItemController::class, 'destroy'])->name('menu-items.destroy');
        Route::post('/menu-items/{menuItem}/toggle', [MenuItemController::class, 'toggleActive'])->name('menu-items.toggle');
        Route::post('/menu-items/order', [MenuItemController::class, 'updateOrder'])->name('menu-items.order');
        
        // Site Settings
        Route::get('/site-settings', [SiteSettingController::class, 'index'])->name('site-settings.index');
        Route::get('/site-settings/{group}/edit', [SiteSettingController::class, 'edit'])->name('site-settings.edit');
        Route::put('/site-settings/{group}', [SiteSettingController::class, 'update'])->name('site-settings.update');
        Route::delete('/site-settings/delete-image/{settingKey}', [SiteSettingController::class, 'deleteImage'])->name('site-settings.delete-image');
        Route::get('/site-settings/create-defaults', [SiteSettingController::class, 'createDefaults'])->name('site-settings.create-defaults');
    });
});

Route::get('/api-docs', function () {
    return view('api-documentation');
})->name('api.docs');


