<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\FollowController;
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

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware('auth', 'verified');

Route::post('/follow/{user}', [FollowController::class, 'store'])->name('follow.store');
Route::delete('/follow/{user}', [FollowController::class, 'destroy'])->name('follow.destroy');

require __DIR__.'/auth.php';
