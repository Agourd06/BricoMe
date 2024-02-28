<?php

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


    Route::get('/Client', [ClientController::class, 'clientArtisans']);
    Route::match(['get', 'post'], '/Reserve', [ClientController::class, 'Reserve']);
    Route::match(['get', 'post'], '/confirm', [ClientController::class, 'confirmReservation'])->name('confirmReservation');
    Route::post('/repport', [RapportController::class, 'store']);
    Route::get('/reporting', [RapportController::class, 'reporterData']);
    Route::get('/Reservation',[ClientController::class, 'showResesvaitons'])->name('Reservation');
});






//----------------------------------------------- Artisan---------------------------------


Route::middleware(['auth', 'role:Artisan'])->group(function () {
    Route::get('/Artisan', function () {
        return view('artisan.Artisan');
    });
});
// ---------------------------------------Authentication----------------------------------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [loginController::class, 'login']);
Route::get('/logout', [loginController::class, 'logout']);
Route::get('/ArtisanRegister', [AuthController::class, 'ArtisanRegisterData'])->middleware(RedirectIfAuthenticated::class);
Route::get('/RegisterClient', function () {
    return view('client.RegisterClient');
})->middleware(RedirectIfAuthenticated::class);

Route::view('/error-page', 'errorPage')->name('errorPage');








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
