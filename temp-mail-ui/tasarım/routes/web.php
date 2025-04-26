<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TempMailController;

Route::get('/', [TempMailController::class, 'index'])->name('home');
Route::post('/generate-email', [TempMailController::class, 'generateEmail'])->name('generate.email');
Route::post('/delete-email', [TempMailController::class, 'deleteEmail'])->name('delete.email');
Route::post('/delete-mail', [TempMailController::class, 'deleteMail'])->name('delete.mail');
