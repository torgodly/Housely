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

    //get estates with available is 0
    $sold = \App\Models\Estate::withoutGlobalScopes()->where('available', 0)->count();
    $all = \App\Models\Estate::withoutGlobalScopes()->count();
    $customers = \App\Models\User::where('role', 'user')->count();
    $orders = \App\Models\Order::count();
    return view('dashboard',
        [
            'sold' => $sold,
            'all' => $all,
            'customers' => $customers,
            'orders' => $orders,
        ]
    );

})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

// Routes that require authentication
Route::middleware('auth', 'admin')->group(function () {

    // Route for creating an estate
    Route::get('/estate/create', [\App\Http\Controllers\EstateController::class, 'create'])->name('estate.create');

    //orders routes
    Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    //estate table
    Route::get('/estates', [\App\Http\Controllers\EstateController::class, 'index'])->name('estates.index');

    //destroy estate
    Route::delete('/estate/{estate}', [\App\Http\Controllers\EstateController::class, 'destroy'])->name('estate.destroy');


});

Route::middleware('auth')->group(function () {

    // Routes related to user profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //favorites  routes
    Route::get('/favorites', [\App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites.index');


});

// Route for showing a specific estate
Route::get('/estate/{estate}', [\App\Http\Controllers\EstateController::class, 'show'])->name('estate.show');

// Include authentication routes
require __DIR__ . '/auth.php';
