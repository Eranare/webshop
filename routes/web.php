<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
//use App\Http\Controllers\ProductController;

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

Route::get('/empty', function () {
    return view('welcome');
});
Route::get('/photos', function () {
    return 'app/public/photos';
});


Route::get('/', [CategoryController::class, 'index']); 
Route::resource('/categories', CategoryController::class);

use APP\Http\Controllers\ProductController;

Route::resource('/products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('shop.show');
//Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

