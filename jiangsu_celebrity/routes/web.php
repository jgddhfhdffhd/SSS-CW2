<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CelebrityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Celebrity;
use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/celebrity/create', [CelebrityController::class, 'create'])->middleware('admin')->name('celebrity.create');
Route::post('/celebrity/store/{id?}', [CelebrityController::class, 'store'])->middleware('admin')->name('celebrity.store');
Route::delete('/celebrity/{id}', [CelebrityController::class, 'destroy'])->middleware('admin')->name('celebrity.destroy');
Route::get('/celebrity/{id}/edit', function ($id){
    return view('celebrity.edit', [
        'celebrity' => App\Models\Celebrity::find($id)
    ]);
})->name('celebrity.edit');

Route::get('/celebrity/index', function () {
    return view('celebrity.index', [
        'celebrities' => App\Models\Celebrity::latest()->paginate(20)
    ]);
})->name('celebrity.index');

Route::get('/celebrity/{id}', function($id) {
    return view('celebrity.show', [
        'celebrity' => App\Models\Celebrity::find($id)
    ]);
})->name('celebrity.show');;

Route::get('/', function () {
    return view('celebrity.guest', [
        'celebrities' => App\Models\Celebrity::latest()->paginate(6)
    ]);
});


Route::get('/dashboard', function () {
    if (Auth::check()) {
        return Redirect::to('/')->with('success', 'Sign in successfully');
    }
    return Redirect::to('/').with('fail','Sign in failed');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
