<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ClientController;
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
    Route::get('/Client', function () {
        return view('client.Client');
    });
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
