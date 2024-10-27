<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('events', [EventController::class, 'index'])->name('events.index');

    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events/{id?}', [EventController::class, 'store'])->name('events.store');

    Route::get('events/{event}', [EventController::class, 'show'])->name('events.show');

    Route::get('events/{event}/registrations', [RegistrationController::class, 'userRegistrations'])->name('registrations.index');
});

// Frontend Routes
// Display Upcoming Events
Route::get('/', [RegistrationController::class, 'index'])->name('events.list');

// Display Specific Event Details
Route::get('events/{event}', [RegistrationController::class, 'show'])->name('events.show');

// Handle User Registration for an Event
Route::post('events/{event}/register', [RegistrationController::class, 'register'])->name('events.register');
