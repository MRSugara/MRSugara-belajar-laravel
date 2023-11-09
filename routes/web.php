<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[DashboardController::class, 'index']);
Route::get('/product',[ProductController::class, 'index'])->name('product');
Route::get('/product/create',[ProductController::class, 'create'])->name('product.create');
Route::post('/product',[ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}',[ProductController::class, 'update'])->name('product.update');
Route::get('/product/delete/{id}',[ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/delete/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
