<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use App\Models\Wishlist;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* Route Frontend */
Route::get('/', [FrontendController::class, 'index'])->name('landing');
Route::get('products', [FrontendController::class, 'products'])->name('products');
Route::get('popular-products', [FrontendController::class, 'popularProducts'])->name('popular-products');
Route::get('products/{id}/detail', [FrontendController::class, 'show'])->name('detail-product');
Route::get('categories/{id}/detail', [FrontendController::class, 'showCategory'])->name('detail-category');
/* Count Cart & Wishlist */
Route::get('cart-count', [CartController::class, 'cartCount']);
Route::get('wishlist-count', [WishlistController::class, 'wishlistCount']);

Route::get('search', [FrontendController::class, 'search'])->name('search');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    /* Route Cart */
    Route::post('add-to-cart', [CartController::class, 'addToCart']);
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::post('delete-cart-item', [CartController::class, 'delete'])->name('delete-cart-item');
    Route::post('update-cart', [CartController::class, 'update'])->name('update-cart');
    /* Route Wishlist */
    Route::resource('wishlist', WishlistController::class);
    /* Route Checkout & Order */
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('order', [CheckoutController::class, 'order'])->name('order');
    Route::get('my-orders', [CheckoutController::class, 'userOrder'])->name('my-orders');
    Route::get('detail-order/{id}', [CheckoutController::class, 'view'])->name('view-order');
    Route::post('razorpay', [CheckoutController::class, 'razorpayOrder']);
    Route::post('midtrans', [CheckoutController::class, 'midtrans']);
    Route::put('accept-order/{order}', [CheckoutController::class, 'orderAccepted'])->name('accept-order');
    
    Route::post('add-rating', [RatingController::class, 'store'])->name('add-rating');
});
/* Route Dashboard */
Route::middleware(['auth', 'admin'])->prefix('dashboards')->group(function () {
    Route::get('notif-count', [DashboardController::class, 'notifCount']);
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/ajax-categories', [CategoryController::class, 'ajaxSearch']);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class)->except(['create', 'store', 'destroy']);
    Route::resource('users', UserController::class)->except(['create', 'store', 'destroy']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');