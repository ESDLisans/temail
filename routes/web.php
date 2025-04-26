<?php

use App\Http\Controllers\Admin\AdSlotController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\SmtpSettingController;
use App\Http\Controllers\TempMailController;
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
Route::get('/message/{messageId}', [TempMailController::class, 'viewMessage'])->name('message.view');
Route::post('/regenerate', [TempMailController::class, 'regenerate'])->name('regenerate');
Route::get('/refresh-inbox', [TempMailController::class, 'refreshInbox'])->name('refresh.inbox');

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
        
        // Domain Management
        Route::resource('domains', DomainController::class);
        
        // SMTP Settings
        Route::resource('smtp-settings', SmtpSettingController::class);
        Route::post('/smtp-settings/{smtpSetting}/test', [SmtpSettingController::class, 'testConnection'])
            ->name('smtp-settings.test');
        
        // Ad Slots
        Route::resource('ad-slots', AdSlotController::class);
    });
});
