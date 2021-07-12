<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class,'index']);
Route::get('/products/create', [ProductController::class,'create'])->middleware('auth');
Route::post('/products', [ProductController::class,'store']);
Route::get('/products/{id}', [ProductController::class,'show']);
Route::get('/dashboard',[ProductController::class,'myproducts'])->middleware('auth');
Route::delete('/products/{id}',[ProductController::class,'destroy'])->middleware('auth');
Route::get('/products/edit/{id}',[ProductController::class,'edit'])->middleware('auth');
Route::put('/products/update/{id}',[ProductController::class,'update'])->middleware('auth');
Route::put('/products/baixar/{id}',[ProductController::class,'baixar'])->middleware('auth');
Route::get('/relatorios',[ProductController::class,'relatorios'])->middleware('auth');


