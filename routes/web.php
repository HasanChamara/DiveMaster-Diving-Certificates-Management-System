<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DiveLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\MediaController;



// Route::get('/', function () {
//     return Inertia::render('welcome');
// })->name('home');
Route::get('/about', function () {
    return Inertia::render('About');
})->name('home');
Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('home');
// Route::get('/login', function () {
//     return Inertia::render('Contact');
// })->name('home');
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


Route::get('/gesture-recognition', function () {
    return view('gesture-recognition');
});

Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/submit-booking', [BookingController::class, 'store']);
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::post('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
Route::get('/bookings/{id}/details', [BookingController::class, 'showDetailsForm'])->name('bookings.showDetailsForm');
Route::post('/bookings/{id}/details', [BookingController::class, 'saveDetails'])->name('bookings.saveDetails');

Route::post('/bookings/details', [BookingController::class, 'saveBookingDetails'])->name('bookings.details.save');
Route::post('/bookings/details/save', [BookingController::class, 'saveBookingDetails'])->name('bookings.details.save');

// Route to display register and login forms
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin Controller
// Route::get('/admin/users', [AdminController::class, 'index'])->middleware('auth')->name('admin.users');
// Route::post('/admin/users/update-role/{id}', [AdminController::class, 'updateRole'])->middleware('auth')->name('admin.updateRole');
// Route::delete('/admin/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

//Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

//Admin only Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index'])->middleware('auth')->name('admin.users');
    Route::delete('/admin/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::post('/admin/users/update-role/{id}', [AdminController::class, 'updateRole'])->middleware('auth')->name('admin.updateRole');
});

// Dive Logs

// Route to display dive log form for a specific booking
Route::get('/booking/{booking_id}/dive-log/create', [DiveLogController::class, 'create'])->name('diveLog.create');

// Route to handle dive log form submission
Route::post('/dive-log', [DiveLogController::class, 'store'])->name('diveLog.store');

// Manage Dive Logs Route
Route::get('/manage-dive-logs', [DiveLogController::class, 'manage'])->name('manageDiveLogs');

// Edit Dive Log Route
Route::get('/edit-dive-log/{id}/{diver_id}', [DiveLogController::class, 'edit'])->name('editDiveLog');

Route::put('/dive-log/update/{id}/{diver_id}', [DiveLogController::class, 'update'])->name('diveLog.update');


Route::get('/instructor-bookings', [BookingController::class, 'instructor_index']);
// Route to update booking status
Route::post('/update-booking-status/{id}', [BookingController::class, 'updateBookingStatus']);

Route::get('/upload', [FileUploadController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [FileUploadController::class, 'uploadFiles'])->name('upload.files');

Route::get('/media/blog', [MediaController::class, 'index'])->name('media.blog');



Route::resource(name: 'certificates', controller:CertificateController::class)->middleware(['auth']);
Route::resource(name: 'inventories', controller:InventoryController::class)->middleware(['auth']);
Route::resource(name: 'assignments', controller:AssignmentController::class)->middleware(['auth']);

// Route::get('/assignments', [AssignmentController::class, 'index'])->name('assignments.index');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
