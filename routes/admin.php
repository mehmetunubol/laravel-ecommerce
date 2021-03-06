<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');
        
        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

        Route::group(['prefix'  =>   'categories'], function() {
            Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
            Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
            Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
            Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
            Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');        
        });

        /*
            *** Implementation note for badges ***
                * 'badges' has not independent database table.
                * It will use the categories table and will be root category.
                * Tags should have base 'Tag' category as parent_id and it will not be allowed to have nested badges.
            ***
        */
        Route::group(['prefix'  =>   'badges'], function() {
            Route::get('/', 'Admin\BadgeController@index')->name('admin.badges.index');
            Route::get('/create', 'Admin\BadgeController@create')->name('admin.badges.create');
            Route::post('/store', 'Admin\BadgeController@store')->name('admin.badges.store');
            Route::get('/{id}/edit', 'Admin\BadgeController@edit')->name('admin.badges.edit');
            Route::post('/update', 'Admin\BadgeController@update')->name('admin.badges.update');
            Route::get('/{id}/delete', 'Admin\BadgeController@delete')->name('admin.badges.delete');        
        });

        Route::group(['prefix'  =>   'brands'], function() {
            Route::get('/', 'Admin\BrandController@index')->name('admin.brands.index');
            Route::get('/create', 'Admin\BrandController@create')->name('admin.brands.create');
            Route::post('/store', 'Admin\BrandController@store')->name('admin.brands.store');
            Route::get('/{id}/edit', 'Admin\BrandController@edit')->name('admin.brands.edit');
            Route::post('/update', 'Admin\BrandController@update')->name('admin.brands.update');
            Route::get('/{id}/delete', 'Admin\BrandController@delete')->name('admin.brands.delete');
        });

        Route::group(['prefix'  =>   'attributes'], function() {
            Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
            Route::get('/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
            Route::post('/store', 'Admin\AttributeController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
            Route::post('/update', 'Admin\AttributeController@update')->name('admin.attributes.update');
            Route::get('/{id}/delete', 'Admin\AttributeController@delete')->name('admin.attributes.delete');

            Route::post('/get-values', 'Admin\AttributeValueController@getValues');
            Route::post('/add-values', 'Admin\AttributeValueController@addValues');
            Route::post('/update-values', 'Admin\AttributeValueController@updateValues');
            Route::post('/delete-values', 'Admin\AttributeValueController@deleteValues');
        });

        Route::group(['prefix' => 'products'], function () {
            Route::get('/', 'Admin\ProductController@index')->name('admin.products.index');
            Route::get('/create', 'Admin\ProductController@create')->name('admin.products.create');
            Route::post('/store', 'Admin\ProductController@store')->name('admin.products.store');
            Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.products.edit');
            Route::post('/update', 'Admin\ProductController@update')->name('admin.products.update');
            Route::post('/delete', 'Admin\ProductController@delete')->name('admin.products.delete');
            Route::post('images/upload', 'Admin\ProductImageController@upload')->name('admin.products.images.upload');
            Route::get('images/{id}/delete', 'Admin\ProductImageController@delete')->name('admin.products.images.delete');
            // Load attributes on the page load
            Route::get('attributes/load', 'Admin\ProductAttributeController@loadAttributes');
            // Load product attributes on the page load
            Route::post('attributes', 'Admin\ProductAttributeController@productAttributes');
            // Load option values for a attribute
            Route::post('attributes/values', 'Admin\ProductAttributeController@loadValues');
            // Add product attribute to the current product
            Route::post('attributes/add', 'Admin\ProductAttributeController@addAttribute');
            // Delete product attribute from the current product
            Route::post('attributes/delete', 'Admin\ProductAttributeController@deleteAttribute');            

            // Special Admin Order
            Route::get('/order', 'Admin\ProductController@order_index')->name('admin.products.order');
            Route::post('/order-set', 'Admin\ProductController@set_order')->name('admin.products.setOrder');
         });

         Route::group(['prefix' => 'orders'], function () {
            Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
            Route::get('/{order}/show', 'Admin\OrderController@show')->name('admin.orders.show');
            Route::get('/{order}/edit', 'Admin\OrderController@edit')->name('admin.orders.edit');
            Route::post('/update', 'Admin\OrderController@update')->name('admin.orders.update');
            Route::get('/order/transfers', 'Admin\OrderController@transfers')->name('admin.orders.transfers');
         });
        
         Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'Admin\UserController@index')->name('admin.users.index');
            Route::get('/create', 'Admin\UserController@create')->name('admin.users.create');
            Route::post('/store', 'Admin\UserController@store')->name('admin.users.store');
            Route::get('/edit/{id}', 'Admin\UserController@edit')->name('admin.users.edit');
            Route::get('/delete/{id}', 'Admin\UserController@delete')->name('admin.users.delete');
            Route::get('/loginToUser/{id}', 'Admin\UserController@loginToUser')->name('admin.users.loginToUser');
            Route::get('/getMailToUsersForm', 'Admin\UserController@getMailToUsersForm')->name('admin.users.getMailToUsersForm');
            Route::post('/sendMailToUsers', 'Admin\UserController@sendMailToUsers')->name('admin.users.sendMailToUsers');
         });

         Route::group(['prefix'  =>   'sitepages'], function() {
            Route::get('/', 'Admin\SitePageController@index')->name('admin.sitepages.index');
            Route::get('/create', 'Admin\SitePageController@create')->name('admin.sitepages.create');
            Route::post('/store', 'Admin\SitePageController@store')->name('admin.sitepages.store');
            Route::get('/{id}/edit', 'Admin\SitePageController@edit')->name('admin.sitepages.edit');
            Route::post('/update', 'Admin\SitePageController@update')->name('admin.sitepages.update');
            Route::get('/{id}/delete', 'Admin\SitePageController@delete')->name('admin.sitepages.delete');
        });

        Route::group(['prefix' => 'statistics/product'], function () {
            Route::get('/view', 'Admin\ProductStatsController@view_index')->name('admin.statistics.product.view');
            Route::get('/cart', 'Admin\ProductStatsController@cart_index')->name('admin.statistics.product.cart');
            Route::get('/order', 'Admin\ProductStatsController@order_index')->name('admin.statistics.product.order');
         });

         Route::group(['prefix' => 'sitesearches'], function () {
            Route::get('/index', 'Admin\SiteSearchController@index')->name('admin.sitesearches.index');
            Route::get('/show/{id}', 'Admin\SiteSearchController@show')->name('admin.sitesearches.show');
         });
    });

});