<?php

use App\Http\Controllers\Api\TempMailApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// TempMail API Routes
Route::prefix('v1')->middleware('throttle:tempmail-api')->group(function () {
    // Get emails
    Route::get('/emails', [TempMailApiController::class, 'getEmails']);
    
    // Get a single message
    Route::get('/messages/{id}', [TempMailApiController::class, 'getMessage']);
    
    // Delete a message
    Route::get('/messages/{id}/delete', [TempMailApiController::class, 'deleteMessage']);
    
    // Get message source
    Route::get('/messages/{id}/source', [TempMailApiController::class, 'getSourceMessage']);
    
    // Get message attachments
    Route::get('/messages/{id}/attachments', [TempMailApiController::class, 'getMessageAttachments']);
    
    // Legacy route for attachments
    Route::get('/messages/{id}/attachments/legacy', [TempMailApiController::class, 'getMessageAttachmentsLegacy']);
    
    // Get a specific attachment
    Route::get('/attachments/{id}', [TempMailApiController::class, 'getAttachment']);
    
    // Get domains list
    Route::get('/domains', [TempMailApiController::class, 'getDomains']);
}); 