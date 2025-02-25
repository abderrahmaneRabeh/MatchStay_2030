<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\TouristeController;
use App\Mail\UpdateProfile;
use Illuminate\Support\Facades\Mail;
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
    return view('auth.login');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/touriste_dashboard', [TouristeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard_touriste');

Route::get('/proprietaire_dashboard', action: [ProprietaireController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('proprietaire_dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');

});
Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/Announces/{pagination?}', [AnnounceController::class, 'index'])->name('Announces');
    Route::get('/Announces/details/{id}', [AnnounceController::class, 'details'])->name('AnnounceDetails');

});

// Route::get('/test', function () {

//     Mail::to('rabehlife144@gmail.com')->send(new UpdateProfile('ahmed', 'You have updated your profile'));


// });

require __DIR__ . '/auth.php';
