<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;
//use App\Models\Category;
//use App\Models\Product;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;

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
    return 'app/public/storage/photos';
});


Route::get('/', [CategoryController::class, 'index']); 


Route::resource('/categories', CategoryController::class);
/*
Route::get('/categories/{category}/products/{product}', function ($category, $product) {
    return 'categories/{category->id}/products/{product->id}';
});
*/

//Route::resource('categories/products', CategoryController::class);
Route::resource('categories/products', ProductController::class);


//-----------Cart

Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

//--------------------Admin

Route::get('/admin', [AdminProductController::class, 'index']);
Route::get('/admin/category', [AdminCategoryController::class, 'index']);
Route::resource('admin', AdminProductController::class);
Route::resource('admincategory', AdminCategoryController::class);
