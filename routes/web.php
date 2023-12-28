<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\RatingController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/','Frontend\FrontendController@index');
Route::get('/home','Frontend\FrontendController@index');
Route::get('category','Frontend\FrontendController@category');
Route::get('view-category/{slug}','Frontend\FrontendController@viewcategory');
Route::get('category/{cate_slug}/{prod_slug}','Frontend\FrontendController@productview');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart', 'Frontend\CartController@addProduct');
Route::post('delete-cart-item', 'Frontend\CartController@deleteProduct');
Route::post('update-cart', 'Frontend\CartController@updatecart');


Route::middleware(['auth'])->group(function () {
Route::get('cart', 'Frontend\CartController@viewcart');
Route::get('checkout', 'Frontend\CheckoutController@index');
Route::post('place-order', 'Frontend\CheckoutController@placeorder');
Route::get('my-orders', 'Frontend\UserController@index');
Route::get('view-order/{id}','Frontend\UserController@view');
Route::post('add-rating','Frontend\RatingController@add');

Route::get('wishlist', 'Frontend\WishlistController@index');

});

 Route::middleware(['auth', 'isAdmin'])->group(function () {
     //category Routes
    Route::get('/dashboard','Admin\FrontendController@index');
    Route::get('categories', 'Admin\CategoryController@index'); 
    Route::get('add-categories', 'Admin\CategoryController@add'); 
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-category/{id}','Admin\CategoryController@edit');
   // Route::get('edit-product/{id}',CategoryController::class,'edit');
    Route::put('update-category/{id}','Admin\CategoryController@update');
    Route::get('delete-category/{id}','Admin\CategoryController@delete');
    //end of category routes

    //products Routes
    Route::get('products','Admin\ProductController@index');
    Route::get('add-products','Admin\ProductController@add');
    Route::post('insert-product','Admin\ProductController@insert');
    Route::get('edit-product/{id}','Admin\ProductController@edit');
    Route::put('update-product/{id}','Admin\ProductController@update');
    Route::get('delete-product/{id}','Admin\ProductController@delete');

    
   
    Route::get('orders', 'Admin\OrderController@index');
    Route::get('admin/view-order/{id}', 'Admin\OrderController@view');
    Route::put('update-order/{id}', 'Admin\OrderController@updateorder');

    Route::get('users', 'Admin\DashboardController@users');
    Route::get('view-user/{id}','Admin\DashboardController@viewUser');
});

