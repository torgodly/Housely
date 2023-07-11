<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Register web routes for the application

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

// Route for the homepage
Route::get('/', function () {
    // Retrieve all estates with their images
    $estates = \App\Models\Estate::with('images')->get();
    // Pass the estates data to the 'estate.index' view
    return view('estate.index', compact('estates'));
})->name('estate.index');

// Route for the dashboard (requires authentication and email verification)
Route::get('/dashboard', function () {
    // Display the dashboard view
    return view('dashboard');
})->middleware(['auth', 'verified','admin'])->name('dashboard');

// Routes that require authentication
Route::middleware('auth','admin')->group(function () {

    // Route for creating an estate
    Route::get('/estate/create', [\App\Http\Controllers\EstateController::class, 'create'])->name('estate.create');


});

Route::middleware('auth')->group(function () {

    // Routes related to user profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

// Route for showing a specific estate
Route::get('/estate/{estate}', [\App\Http\Controllers\EstateController::class, 'show'])->name('estate.show');

// Include authentication routes
require __DIR__ . '/auth.php';
