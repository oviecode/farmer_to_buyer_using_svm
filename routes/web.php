<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FarmerDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and assigned to
| the "web" middleware group.
|--------------------------------------------------------------------------
*/

// 🏠 Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// 📦 Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// 🛒 Cart Routes
// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
// Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');

// Route::get('/buy/{id}', [ProductController::class, 'buy'])->name('buy');
// Route::get('/checkout/{product}', [ProductController::class, 'checkout'])->name('checkout');


// 📘 Static Pages
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// 👤 Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.show');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [App\Http\Controllers\UserDashboardController::class, 'index'])
        ->name('user.dashboard');
});


Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    $user = Auth::user();
    $cart = session('cart', []);
    $orders = []; // We'll replace this later with real order data

    return view('dashboard', compact('user', 'cart', 'orders'));
})->name('dashboard');

Route::get('/buy', [CheckoutController::class, 'buy'])->name('buy');
// 🔐 Voyager Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('/dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Farmer
Route::get('/farmer/dashboard', [FarmerDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('farmer.dashboard');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

// 🧩 Auth (Laravel Breeze)
require __DIR__.'/auth.php';
