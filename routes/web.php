<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\DashboardController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', action: [DashboardController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/touriste_dashboard', [DashboardController::class, 'touristeDashboard'])->name('dashboard_touriste');
    Route::get('/proprietaire_dashboard', [DashboardController::class, 'proprietaireDashboard'])->name('proprietaire_dashboard');
});

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


    Route::get('/AddAnnounce', [AnnounceController::class, 'create'])->name('AddAnnounce');
    Route::post('/AddAnnounce', [AnnounceController::class, 'store']);

    Route::get('/ModifyAnnounce/{id}', [AnnounceController::class, 'update'])->name('ModifyAnnounce');
    Route::post('/ModifyAnnounce', [AnnounceController::class, 'edit']);

    Route::delete('/DeleteAnnounce/{id}', [AnnounceController::class, 'destroy'])->name('DeleteAnnounce');

    Route::get('/announce/favorite/add/{id}', [AnnounceController::class, 'AddFavorite'])->name('AddFavorite');
    Route::get('/announce/favorite/remove/{id}', [AnnounceController::class, 'RemoveFavorite'])->name('RemoveFavorite');
});

// Route::get('/test', function () {

//     Mail::to('rabehlife144@gmail.com')->send(new UpdateProfile('ahmed', 'You have updated your profile'));


// });

require __DIR__ . '/auth.php';
