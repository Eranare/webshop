<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;
//use App\Models\Category;
//use App\Models\Product;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderPendingController;
use App\Http\Controllers\OrderCompletedController;
use App\Http\Controllers\OrderCancelledController;



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
Route::get('/home', [CategoryController::class, 'index']);

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
Route::get('checkout', [CartController::class, 'checkOutCart'])->name('cart.checkout');
Route::post('Pay', [Cartcontroller::class, 'payCart'])->name('cart.pay');
Route::get('postCheckout', [CartController::class, 'postCheckout'])->name('cart.postCheckout');


//--------------------Admin

Route::get('/Adminpanel', [AdminController::class, 'index']);
Route::get('/admin/product', [AdminProductController::class, 'index']);
Route::get('/admin/category', [AdminCategoryController::class, 'index']);

Route::get('/admin/pending', [OrderController::class, 'index']);
// Route::get('/admin/statistics', [stats::class, 'index']);
Route::get('/admincompleted', [OrderCompletedController::class, 'index']);


Route::get('/admin/statistics', [AdminController::class, 'showStatistics'])->name('admin.showStatistics');
Route::get('/admin/work', [AdminController::class, 'work'])->name('admin.work');
Route::resource('admin', AdminController::class);
Route::resource('adminproduct', AdminProductController::class);
Route::resource('admincategory', AdminCategoryController::class);
Route::resource('adminpending', OrderController::class);
// Route::resource('adminstatistics', stats::class);
Route::resource('admincompleted', OrderCompletedController::class);

Route::post('/adminpending/{id}',[OrderPendingController::class, 'setCompleted' ])->name('order.complete');
Route::post('/adminpending/{id}/cancelled',[OrderController::class, 'setCancelled'])->name('order.cancel');

Auth::routes();

