<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/about', function () {
    return view('pages/about');
});

Route::get('/contact', function () {
    return view('pages/contact');
});


// Login Router
Route::get('/auth/login', [LoginController::class, 'showLoginForm']);
Route::post('/auth/login', [LoginController::class, 'login'])->name('login');

// Register Router
Route::get('/auth/register', [RegisterController::class, 'showRegisterationForm']);
Route::post('/auth/register', [RegisterController::class, 'register'])->name('register');

// Logout Router
// In your routes/web.php
Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
