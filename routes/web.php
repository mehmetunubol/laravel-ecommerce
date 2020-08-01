<?php

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

Route::view('/', 'site.pages.homepage');
Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');
Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');

Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');
Route::get('/cart', 'Site\CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'Site\CartController@clearCart')->name('checkout.cart.clear');

/* from now on our all routes will be for only authenticated users 
    It means only registered users can order products !!
    Probably we will improve it for unregistered users..    
*/
Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');

    Route::get('checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');

    Route::get('account/orders', 'Site\AccountController@getOrders')->name('account.orders');
    Route::get('account/wishlist', 'Site\WishlistController@getWishlist')->name('account.wishlist');
    Route::post('wishlist/add', 'Site\WishlistController@addToWishlist')->name('wishlist.add');
    Route::post('wishlist/remove', 'Site\WishlistController@removeFromWishlist')->name('wishlist.remove');
    Route::get('account/profile', 'Site\AccountController@getProfile')->name('account.profile');
    Route::post('account/profile', 'Site\AccountController@updateProfile')->name('account.profile');
    Route::get('account/delete', 'Site\AccountController@deleteProfile')->name('account.delete');
});

Auth::routes();
require 'admin.php';