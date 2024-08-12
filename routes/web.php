<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\HomeAuthController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\CartController;
use App\Http\Controllers\Auth\OrderController as AuthOrderController;

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
// Auth
Route::get('/', [HomeAuthController::class, 'index'])->name('auth.home');
Route::get('/auth/shop', [HomeAuthController::class, 'shop'])->name('auth.shop');
Route::get('/auth/contact', [HomeAuthController::class, 'contact'])->name('auth.contact');
Route::get('/auth/about', [HomeAuthController::class, 'about'])->name('auth.about');
// Route::get('/auth/cart', [HomeAuthController::class, 'cart'])->name('auth.cart');
Route::get('/auth/product/detail/{id}', [HomeAuthController::class, 'detailProduct'])->name('auth.detailProduct');
Route::get('/auth/category/{id}', [HomeAuthController::class, 'category'])->name('auth.category');
// Auth cart
Route::middleware('auth')->group(function () {
    Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('cart/list', [CartController::class, 'list'])->name('cart.list');
    Route::post('order/add', [AuthOrderController::class, 'add'])->name('order.add');
    Route::get('cart/delete/{id}', [CartController::class, 'deleteOneCartDetail'])->name('cart.delete.one');
    Route::get('cart/delete/', [CartController::class, 'deleteAllCartDetail'])->name('cart.delete.all');
});

// login and resgister

// login
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'checkLogin'])->name('login');

// logout
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
//register
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'checkRegister'])->name('register');

//forgot
Route::get('/forgotPassword', [UserController::class, 'forgotPassword'])->name('forgotPassword');

//logout

// home page
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/home', [HomeAdminController::class, 'index'])->name('admin.home');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('user', AdminUserController::class);
    Route::resource('order', OrderController::class);
    Route::resource('banner', BannerController::class);
});