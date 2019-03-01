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
//frontend part...........

Route::get('/','HomeController@index');

//show product controller
Route::get('/product_by_category/{category_id}','HomeController@show_product_by_category');
Route::get('/product_by_brand/{brands_id}','HomeController@show_product_by_brand');
Route::get('/view_product/{products_id}','HomeController@product_details_by_id');

//cart routes............
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-to-cart','CartController@update_to_cart');

//checkout routes....

Route::get('/login-checkout','CheckoutController@login_checkout');
Route::post('/customer-registration','CheckoutController@customer_registration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-shipping-details','CheckoutController@save_shipping_details');

//customer login/logout.................
Route::post('/customer-login','CheckoutController@customer_login');
Route::get('/customer-logout','CheckoutController@customer_logout');

Route::get('/payment','CheckoutController@payment');
Route::post('/place-order','CheckoutController@place_order');

//manage-order....

Route::get('/manage-order','CheckoutController@manage_order');







//backend part start.......

Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');

Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');

//category related..........
Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@all_category');

Route::post('/save-category','CategoryController@save_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');

Route::get('/Inactive-category/{category_id}','CategoryController@Inactive_category');
Route::get('/active-category/{category_id}','CategoryController@active_category');

//Brands category......
Route::get('/add-brands','BrandsController@index');
Route::post('/save-brands','BrandsController@save_brands');
Route::get('/all-brands','BrandsController@all_brands');
Route::get('/Inactive-brands/{brands_id}','BrandsController@Inactive_brands');
Route::get('/active-brands/{brands_id}','BrandsController@active_brands');
Route::get('/edit-brands/{brands_id}','BrandsController@edit_brands');
Route::post('/update-brands/{brands_id}','BrandsController@update_brands');
Route::get('/delete-brands/{brands_id}','BrandsController@delete_brands');

//product route....
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/Inactive-product/{products_id}','ProductController@Inactive_product');
Route::get('/active-product/{products_id}','ProductController@active_product');
Route::get('/edit-product/{products_id}','ProductController@edit_product');
Route::post('/update-product/{products_id}','ProductController@update_product');
Route::get('/delete-product/{products_id}','ProductController@delete_product');

//slider route.....
Route::get('/add-slider','SliderController@index');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/all-slider','SliderController@all_slider');
Route::get('/Inactive-slider/{slider_id}','SliderController@Inactive_slider');
Route::get('/active-slider/{slider_id}','SliderController@active_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');


