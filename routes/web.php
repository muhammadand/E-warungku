<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;

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
// home user
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// home admin
Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');


use App\Http\Controllers\RegistrationController;

Route::resource('registrations', RegistrationController::class);








Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');


// product
Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// order
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create/{product}', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

