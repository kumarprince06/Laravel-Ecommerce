<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;

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
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/admin/inventory-management', [AdminController::class, 'inventoryManagement'])->name('inventory-management');
Route::get('/admin/category-management', [AdminController::class, 'categoryManagement'])->name('category-management');
Route::get('/admin/orders-management', [AdminController::class, 'ordersManagement'])->name('orders-management');
