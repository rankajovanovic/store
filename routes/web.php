<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
Route::get('/', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');

Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/update/{product}', [ProductController::class, 'update'])->name('products.update');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products', [ProductController::class, 'store'])->middleware('auth');

Route::get('/categories/create', [CategoryController::class, 'create'])->middleware('auth');
Route::post('/categories', [CategoryController::class, 'store'])->middleware('auth');




Route::get('/register', [AuthController::class, 'getRegistationForm'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

Route::get('/login', [AuthController::class, 'getLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
