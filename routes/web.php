<?php

use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ProviderController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RapportController;
use App\Http\Middleware\RedirectIfAuthenticated;

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
    return view('Login');
})->middleware(RedirectIfAuthenticated::class);




Route::get('/admin', function () {
    return view('admin.dashboard');
});
//----------------------------------------------- Client---------------------------------



Route::middleware(['auth', 'role:Client'])->group(function () {

    Route::get('/Client', [ClientController::class , 'clientArtisans']);
    Route::match(['get', 'post'], '/Reserve', [ClientController::class, 'Reserve']);
    Route::match(['get', 'post'], '/confirm', [ClientController::class, 'confirmReservation'])->name('confirmReservation');

    Route::get('/Reservation', function (){
        return view('client.Reservation');
    })->name('Reservation');
});



Route::post('/repport',[RapportController::class,'store']);
Route::get('/reporting', function () {
    return view('client.repport');
});

//----------------------------------------------- Artisan---------------------------------

Route::match(['get', 'post'], '/artisanRegistration', [ArtisanController::class, 'registration'])->name('login');

// Application Providers
Route::get('/auth/github/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/github/callback', [ProviderController::class, 'callback']);

// Artisan Account
Route::middleware(['auth', 'access:artisan'])->group(function () {
    Route::get('/verify', [ArtisanController::class, 'verify'])->name('verification.notice')->middleware('not_verified');
    Route::middleware(['verified'])->group(function () {
        Route::match(['get', 'post'], '/artisan/dashboard', [ArtisanController::class, 'dashboard']);
        Route::match(['GET', 'PATCH'], '/artisan/profile/public', [ArtisanController::class, 'public_profile']);
        Route::match(['GET', 'PATCH'], '/artisan/profile/professional', [ArtisanController::class, 'professional_profile']);
        Route::match(['GET', 'PUT', 'DELETE'], '/artisan/settings', [ArtisanController::class, 'settings']);

        Route::match('POST', '/artisan/add/job/', [ArtisanController::class, 'job']);
        Route::match('DELETE', '/artisan/delete/job/', [ArtisanController::class, 'job']);

        Route::match('POST', '/artisan/add/cmp', [ArtisanController::class, 'cmp']);
        Route::match('DELETE', '/artisan/delete/cmp', [ArtisanController::class, 'cmp']);
    });
});

// Artisan Email Verification
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/artisan/profile/public')->with('success', 'Your Email Address Is Now Verified !');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend Email Verification
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



// ---------------------------------------Authentication----------------------------------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [loginController::class, 'login']);
Route::get('/logout', [loginController::class, 'logout']);
Route::get('/ArtisanRegister', [AuthController::class, 'ArtisanRegisterData'])->middleware(RedirectIfAuthenticated::class);
Route::get('/RegisterClient', function () {
    return view('client.RegisterClient');
})->middleware(RedirectIfAuthenticated::class);







// --------------------------------------------Admin----------------------------
Route::middleware(['auth', 'role:Admin'])->group(function () {

    Route::post('/NewJob', [adminController::class, 'NewJob']);
    Route::post('/updateJob', [adminController::class, 'updateJob']);
    Route::post('/NewComeptences', [adminController::class, 'NewComeptences']);
    Route::post('/updateComeptences', [adminController::class, 'updateCompetence']);
    Route::post('/archive', [adminController::class, 'archive']);
    Route::post('/editData', [adminController::class, 'adminPage']);
    Route::post('/editcom', [adminController::class, 'adminPage']);
    Route::get('/admin', [adminController::class, 'adminPage']);
    Route::get('/adminUsers', [adminController::class, 'UsersAdmin']);
});


// --------------------- Reservation ---------------------


