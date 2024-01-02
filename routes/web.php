<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;

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

Route::get('/',[LandingController::class, 'index'])->name('landing');
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'authenticate'])->name('login.authenticate');
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store'])->name('register.store');

Route::middleware('auth')->group(function (){

    Route::post('/logout', [LoginController::class,'logout'])->name('logout');

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('/product',[ProductController::class, 'index'])->name('product');

    Route::get('/product/create',[ProductController::class, 'create'])->name('product.create');
    Route::post('/product',[ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}',[ProductController::class, 'update'])->name('product.update');
    Route::post('/product/delete/{id}',[ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/delete/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
});
