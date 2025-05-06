<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BookingController;


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
Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/submit-booking', [BookingController::class, 'store']);
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::post('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
Route::get('/bookings/{id}/details', [BookingController::class, 'showDetailsForm'])->name('bookings.showDetailsForm');
Route::post('/bookings/{id}/details', [BookingController::class, 'saveDetails'])->name('bookings.saveDetails');




require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
