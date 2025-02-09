<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Wishlist\WishlistController;
use App\Services\Cart\CartService;
use App\Http\Controllers\Payment\StripePaymentController;

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
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');




Route::middleware(['auth'])->group(function () {
    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/inventory-management', [AdminController::class, 'inventoryManagement'])->name('inventory-management');
        Route::get('/category-management', [AdminController::class, 'categoryManagement'])->name('category-management');
        Route::get('/orders-management', [AdminController::class, 'ordersManagement'])->name('orders-management');

        // Category routes
        Route::get('/categories/add', [CategoryController::class, 'showAddCategoryForm'])->name('categories.add');
        Route::post('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

        //Products
        Route::get('/products/add', [ProductsController::class, 'showAddProductForm'])->name('products.add');
        Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
        Route::post('/products/create', [ProductsController::class, 'create'])->name('product.create');
        // Route to show product details
        Route::get('/products/show/{id}', [ProductsController::class, 'show'])->name('products.show');
    });

    Route::post('/wishlist/add', [WishlistController::class])->name('wishlist.add');
    Route::post('/cart/add', [CartController::class, 'create'])->name('cart.add');
    Route::get('/cart/{id}', [CartController::class, 'index'])->name('cart.index');
    Route::delete('cart/delete', [CartController::class, 'delete'])->name('cart.delete');

    Route::post('/checkout', [StripePaymentController::class, 'checkout'])->name('checkout.index');
    Route::get('/checkout/success', [StripePaymentController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/cancel', [StripePaymentController::class, 'cancel'])->name('checkout.cancel');
});


Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/show/{id}', [ProductsController::class, 'show'])->name('products.show');
