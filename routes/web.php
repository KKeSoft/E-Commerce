<?php

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

// Frontend...........................
Route::get('/', 'HomeController@index')->name('/');
Route::get('/view_product/{product_id}', 'HomeController@product_details_by_id');
Route::get('/product_by_category/{category_id}', 'HomeController@product_by_category');
Route::get('/product_by_manufacture/{manufacture_id}', 'HomeController@product_by_manufacture');

//Cart................................
Route::post('/add_to_cart', 'CartController@add_to_cart');
Route::get('/show_cart', 'CartController@show_cart')->name('show_cart');
Route::get('/delete_to_cart/{rowId}', 'CartController@delete_to_cart');
Route::post('/update_cart/{rowId}', 'CartController@update_cart');
//Checkout Route ......................
Route::get('/login_check','CheckoutController@login_check')->name('login_check');
Route::post('/customer_login','CheckoutController@customer_login')->name('customer_login');
Route::get('/customer_logout','CheckoutController@customer_logout')->name('customer_logout');
Route::post('/customer_registration','CheckoutController@customer_registration')->name('customer_registration');
Route::post('/save_shipping_details','CheckoutController@save_shipping_details')->name('save_shipping_details');
Route::get('/checkout','CheckoutController@checkout')->name('checkout');
Route::get('/handcash','CheckoutController@handcash')->name('handcash');
Route::get('/payment','CheckoutController@payment')->name('payment');
Route::post('/order_place','CheckoutController@order_place')->name('order_place');
//Backend..............................
Route::get('/admin', 'AdminController@index')->name('login');
Route::get('/logout', 'SuperAdminController@logout')->name('logout');
Route::get('/dashboard', 'SuperAdminController@index')->name('dashboard');

Route::post('/admin_dashboard', 'AdminController@admin_dashboard')->name('admin_dashboard');
Route::get('/admin_dashboard', 'AdminController@dashboard')->name('admin_dashboard');

// Category Route...................................................
Route::get('/add_category', 'CategoryController@add_category')->name('add_category');
Route::get('/all_category', 'CategoryController@all_category')->name('all_category');
Route::get('/unactive_category/{category_id}', 'CategoryController@unactive_category')->name('unactive_category');
Route::get('/active_category/{category_id}', 'CategoryController@active_category')->name('active_category');
Route::get('/edit_category/{category_id}', 'CategoryController@edit_category')->name('edit_category');
Route::get('/delete_category/{category_id}', 'CategoryController@delete_category')->name('delete_category');

Route::post('/update_category/{category_id}', 'CategoryController@update_category')->name('update_category');
Route::post('/save_category', 'CategoryController@save_category')->name('save_category');

//Manufacture ........................................................
Route::get('/add_manufacture', 'ManufactureController@add_manufacture')->name('add_manufacture');
Route::get('/all_manufacture', 'ManufactureController@all_manufacture')->name('all_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}', 'ManufactureController@unactive_manufacture')->name('unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}', 'ManufactureController@active_manufacture')->name('active_manufacture');
Route::get('/edit_manufacture/{manufacture_id}', 'ManufactureController@edit_manufacture')->name('edit_manufacture');
Route::get('/delete_manufacture/{manufacture_id}', 'ManufactureController@delete_manufacture')->name('delete_manufacture');

Route::post('/update_manufacture/{manufacture_id}', 'ManufactureController@update_manufacture')->name('update_manufacture');
Route::post('/save_manufacture', 'ManufactureController@save_manufacture')->name('save_manufacture');

//Products........................................................
Route::get('/add_product','ProductController@add_product')->name('add_product');
Route::get('/all_product', 'ProductController@all_product')->name('all_product');
Route::get('/unactive_product/{product_id}', 'ProductController@unative_product');
Route::get('/active_product/{product_id}', 'ProductController@ative_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');

Route::post('/save_product','ProductController@save_product')->name('save_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');

//manage_order.....................................................
Route::get('/manage_order', 'ManageorderController@manage_order')->name('manage_order');
Route::get('/view_order/{order_id}', 'ManageorderController@view_order')->name('view_order');