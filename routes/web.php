<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('welcome');
// })->name('home');
Route::get('/about', function () {
    return Inertia::render('About');
})->name('home');
Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('home');
Route::get('/login', function () {
    return Inertia::render('Contact');
})->name('home');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
