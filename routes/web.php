<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'registration.completed'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('listings/{listingId}/photos/{photoId}/delete', [
        ListingController::class,
        'deletePhoto'
    ])->name('listings.deletePhoto');
    Route::resource('listings', ListingController::class);

    Route::resource('messages', MessageController::class)
        ->only(['create', 'store']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
