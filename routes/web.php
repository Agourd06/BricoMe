<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
});



Route::get('/artisan', function () {
    return view('artisan.artisan');
});
// ---------------------------------------Artisan----------------------------------
Route::post('/registerArtisan',[UserController::class,'register']);

Route::get('/client', function () {
    return view('client.client');
});
Route::get('/adminUsers', function () {
    return view('Admin.Users');
});




// --------------------------------------------Admin----------------------------

Route::post('/NewJob' , [adminController::class , 'NewJob']);
Route::post('/updateJob' , [adminController::class , 'updateJob']);
Route::post('/NewComeptences' , [adminController::class , 'NewComeptences']);
Route::post('/updateComeptences' , [adminController::class , 'updateCompetence']);
Route::post('/archive' , [adminController::class , 'archive']);
Route::post('/editData' , [adminController::class , 'adminPage']);
Route::post('/editcom' , [adminController::class , 'adminPage']);
Route::get('/admin' , [adminController::class , 'adminPage']);
