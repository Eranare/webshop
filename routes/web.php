<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use App\Models\Category;
use App\Models\Product;
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

Route::get('/photos', function () {
    return 'app/public/photos';
});


Route::get('/', [CategoryController::class, 'index']); 
Route::resource('/categories', CategoryController::class);


//Route::get('/products', [ProductController::class, 'show']);
//Route::post('/products', [ProductController::class, 'index']);
//Route::resource('/categories/products', CategoryController::class);
Route::resource('categories/products', ProductController::class);
//Route::get('categories/products', [CategoryController::class, 'index']);
//Route::resource('/categories/products', CategoryController::class);
//Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
//->name('shop.product')

Route::get('/admin', [AdminProductController::class, 'index']);

Route::resource('admin', AdminProductController::class);