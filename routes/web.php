<?php

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
Route::redirect('/', '/login');
Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified']], function () {
    Route::group(['middleware' => ['registration.completed']], function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    Route::get('register-step2',
        [\App\Http\Controllers\RegisterStepTwoController::class, 'create'])
        ->name('register-step2.create');;
    Route::post('register-step2',
        [\App\Http\Controllers\RegisterStepTwoController::class, 'store'])
        ->name('register-step2.post');

    Route::get('listings/{listingId}/photos/{photoId}/delete', [
        \App\Http\Controllers\ListingController::class,
        'deletePhoto'
    ])->name('listings.deletePhoto');
    Route::resource('listings', \App\Http\Controllers\ListingController::class);

    Route::resource('messages', \App\Http\Controllers\MessageController::class)
        ->only(['create', 'store']);
});
