<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
Route::get('/', function () {
    return view('pages.index');
});

Route::post('/contact-submit', [ContactController::class, 'store'])->name('contact.submit');

// 💡 If your form is on another page (e.g., homepage), remove the GET route:
// Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');