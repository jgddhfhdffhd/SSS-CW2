<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CelebrityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware(['auth', 'admin'])->group(function () {
    // Admin-specific routes for creating, editing, updating, and deleting celebrities
    Route::get('/celebrity/create', [CelebrityController::class, 'create'])->name('celebrity.create');
    Route::post('/celebrity', [CelebrityController::class, 'store'])->name('celebrity.store');
    Route::get('/celebrity/{id}/edit', [CelebrityController::class, 'edit'])->name('celebrity.edit');
    Route::put('/celebrity/{id}', [CelebrityController::class, 'update'])->name('celebrity.update');
    Route::delete('/celebrity/{id}', [CelebrityController::class, 'destroy'])->name('celebrity.destroy');
//});


// Display a list of all celebrities (available for all authenticated users)
Route::get('/celebrity', [CelebrityController::class, 'index'])->name('celebrity.index');

// Display the specified celebrity (available for all users)
Route::get('/celebrity/{id}', [CelebrityController::class, 'show'])->name('celebrity.show');

Route::get('/', function () {
    return redirect()->route('celebrity.index'); // Redirect to celebrity index
});

Route::controller(AuthenticatedSessionController::class)->group(function () {
    // Login routes
    Route::get('login', 'create')->name('login');
    Route::post('login', 'store');
    Route::post('logout', 'destroy')->name('logout');

    // Register routes
    Route::get('register', 'showRegisterForm')->name('register');
    Route::post('register', 'register');
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
