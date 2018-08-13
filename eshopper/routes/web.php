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
//Front-end
Route::get('/', 'EcommerceController@index');
Route::get('/category-by-product/{category_id}', 'EcommerceController@category_by_product');
Route::get('/manufacture-by-product/{manufacture_id}', 'EcommerceController@manufacture_by_product');
Route::get('/product-detail/{product_id}', 'EcommerceController@product_detail');



Route::get('/admin', 'AdminController@index');
Route::get('/show-dashboard', 'SuperAdminController@index');
Route::post('/dashboard', 'AdminController@admin_dashboard');
Route::get('/logout', 'SuperAdminController@logout');


//Category
Route::get('/add-category', 'CategoryController@add_category');
Route::post('/save-category', 'CategoryController@save_category');
Route::get('/all-category', 'CategoryController@all_category');
Route::get('/unpublish-category/{category_id}', 'CategoryController@unpublish_category');
Route::get('/publish-category/{category_id}', 'CategoryController@publish_category');
Route::get('/edit-category/{category_id}', 'CategoryController@edit_category');
Route::post('/update-category/{category_id}', 'CategoryController@update_category');
Route::get('/delete-category/{category_id}', 'CategoryController@delete_category');

//Manufacture
Route::get('/add-manufacture', 'ManufactureController@add_manufacture');
Route::post('/save-manufacture', 'ManufactureController@save_manufacture');
Route::get('/all-manufacture', 'ManufactureController@all_manufacture');
Route::get('/unpublish-manufacture/{manufacture_id}', 'ManufactureController@unpublish_manufacture');
Route::get('/publish-manufacture/{manufacture_id}', 'ManufactureController@publish_manufacture');
Route::get('/edit-manufacture/{manufacture_id}', 'ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}', 'ManufactureController@update_manufacture');
Route::get('/delete-manufacture/{manufacture_id}', 'ManufactureController@delete_manufacture');


 //Products
Route::get('/add-product', 'ProductController@add_product');
Route::post('/save-product', 'ProductController@save_product');
Route::get('/all-product', 'ProductController@all_product');
Route::get('/unpublish-product/{product_id}', 'ProductController@unpublish_product');
Route::get('/publish-product/{product_id}', 'ProductController@publish_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');


//Slider


Auth::routes();

Route::get('/add-slider', 'SliderController@index');
Route::post('/save-slider', 'SliderController@save_slider');
Route::get('/all-slider', 'SliderController@all_slider');
Route::get('/unpublish-slider/{product_id}', 'SliderController@unpublish_slider');
Route::get('/publish-slider/{product_id}', 'SliderController@publish_slider');


//Cart
Route::post('/add-cart', 'CartController@add_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');
Route::post('/update-cart', 'CartController@update_cart');

//Checkout
Route::get('/login-check', 'CheckoutController@login_check');
Route::post('/customer-registration', 'CheckoutController@customer_registration');
Route::post('/customer-login', 'CheckoutController@customer_login');
Route::get('/customer-logout', 'CheckoutController@customer_logout');
Route::get('/checkout', 'CheckoutController@checkout');
Route::post('/shipping-detail', 'CheckoutController@shipping_detail');
Route::get('/payment', 'CheckoutController@payment');
Route::post('/order-place', 'CheckoutController@order_place');

//Order
Route::get('/manage-order', 'OrderController@manage_order');
Route::get('/publish-order/{order_id}', 'OrderController@publish_order');
Route::get('/unpublish-order/{order_id}', 'OrderController@unpublish_order');
Route::get('/view-order/{order_id}', 'OrderController@view_order');



//Route::get('/home', 'HomeController@index')->name('home');
