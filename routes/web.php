<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('layout');
// });

//frontend
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', 'HomeController@index');

// all-product-home
Route::get('/all-productss', 'App\Http\Controllers\HomeController@all_productss');

//about_us
Route::get('/contact-us', 'App\Http\Controllers\AboutController@contact_us');

//search
Route::post('/search-items', 'App\Http\Controllers\HomeController@search_items');

//Danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{category_id}', 'App\Http\Controllers\CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}', 'App\Http\Controllers\BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}', 'App\Http\Controllers\ProductController@details_product');
//backend
Route::get('/admin-login', 'App\Http\Controllers\Admincontroller@index');
Route::get('/dashboard', 'App\Http\Controllers\Admincontroller@show_dashboard');
Route::get('/logout', 'App\Http\Controllers\Admincontroller@logout');
Route::post('/admin-dashboard', 'App\Http\Controllers\Admincontroller@dashboard');

//Category Product
Route::get('/add-category-product', 'App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@delete_category_product');
Route::get('/all-category-product', 'App\Http\Controllers\CategoryProduct@all_category_product');

Route::post('/import-csv', 'App\Http\Controllers\CategoryProduct@import_csv');
Route::post('/export-csv', 'App\Http\Controllers\CategoryProduct@export_csv');

Route::get('/unactive-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@active_category_product');

Route::post('/save-category-product', 'App\Http\Controllers\CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@update_category_product');

//Brand Product
Route::get('/add-brand-product', 'App\Http\Controllers\BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@delete_brand_product');
Route::get('/all-brand-product', 'App\Http\Controllers\BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@active_brand_product');

Route::post('/save-brand-product', 'App\Http\Controllers\BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@update_brand_product');

//Product
Route::get('/add-product', 'App\Http\Controllers\ProductController@add_product');
Route::get('/edit-product/{product_id}', 'App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'App\Http\Controllers\ProductController@delete_product');
Route::get('/all-product', 'App\Http\Controllers\ProductController@all_product');

Route::get('/unactive-product/{product_id}', 'App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'App\Http\Controllers\ProductController@active_product');

Route::post('/save-product', 'App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{product_id}', 'App\Http\Controllers\ProductController@update_product');

//cart
Route::post('/save-cart', 'App\Http\Controllers\CartController@save_cart');
Route::post('/add-cart-ajax', 'App\Http\Controllers\CartController@add_cart_ajax');
Route::get('/your-cart', 'App\Http\Controllers\CartController@your_cart');
Route::get('/delete-product-cart/{session_id}', 'App\Http\Controllers\CartController@delete_product_cart');
Route::get('/delete-all-product-cart', 'App\Http\Controllers\CartController@delete_all_product_cart');
Route::post('/update-cart', 'App\Http\Controllers\CartController@update_cart');

//coupon
Route::post('/check-coupon', 'App\Http\Controllers\CheckoutController@check_coupon');
Route::get('/remove-coupon', 'App\Http\Controllers\CheckoutController@remove_coupon');

//coupon-admin
Route::get('/list-coupon', 'App\Http\Controllers\CouponController@list_coupon');
Route::get('/insert-coupon', 'App\Http\Controllers\CouponController@insert_coupon');
Route::post('/insert-coupon-code', 'App\Http\Controllers\CouponController@insert_coupon_code');
Route::get('/edit-coupon/{coupon_id}', 'App\Http\Controllers\CouponController@edit_coupon');
Route::post('/update-coupon/{coupon_id}', 'App\Http\Controllers\CouponController@update_coupon');
Route::get('/delete-coupon/{coupon_id}', 'App\Http\Controllers\CouponController@delete_coupon');


//checkout
Route::get('/login-checkout', 'App\Http\Controllers\CheckoutController@login_checkout');
Route::post('/login-customer', 'App\Http\Controllers\CheckoutController@login_customer');
Route::get('/logout-checkout', 'App\Http\Controllers\CheckoutController@logout_checkout');
Route::get('/register-checkout', 'App\Http\Controllers\CheckoutController@register_checkout');
Route::post('/add-customer', 'App\Http\Controllers\CheckoutController@add_customer');
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@checkout');
Route::get('/payment', 'App\Http\Controllers\CheckoutController@payment');
Route::post('/save-checkout-customer', 'App\Http\Controllers\CheckoutController@save_checkout_customer');
Route::post('/select-delivery-home', 'App\Http\Controllers\CheckoutController@select_delivery_home');
Route::post('/calculate-fee', 'App\Http\Controllers\CheckoutController@calculate_fee');
Route::get('/del-fee', 'App\Http\Controllers\CheckoutController@del_fee');
Route::post('/confirm-order', 'App\Http\Controllers\CheckoutController@confirm_order');


//order
Route::get('/manage-order', 'App\Http\Controllers\OrderController@manage_order');
Route::get('/view-order/{order_code}', 'App\Http\Controllers\OrderController@view_order');
// Route::get('/delete-order/{orderId}', 'App\Http\Controllers\OrderController@delete_order');
Route::post('/update-order-quantity', 'App\Http\Controllers\OrderController@update_order_quantity');
Route::post('/update-qty', 'App\Http\Controllers\OrderController@update_qty');

//delivery
Route::get('/delivery', 'App\Http\Controllers\DeliveryController@delivery');
Route::get('/show-delivery', 'App\Http\Controllers\DeliveryController@show_delivery');
Route::post('/select-delivery', 'App\Http\Controllers\DeliveryController@select_delivery');
Route::post('/insert-delivery', 'App\Http\Controllers\DeliveryController@insert_delivery');
Route::post('/select-feeship', 'App\Http\Controllers\DeliveryController@select_feeship');
Route::post('/update-delivery', 'App\Http\Controllers\DeliveryController@update_delivery');

//Banner
Route::get('/manage-slider', 'App\Http\Controllers\SliderController@manage_slider');
Route::get('/add-slider', 'App\Http\Controllers\SliderController@add_slider');
Route::post('/insert-slider', 'App\Http\Controllers\SliderController@insert_slider');
Route::get('/edit-slide/{slider_id}', 'App\Http\Controllers\SliderController@edit_slide');
Route::post('/update-slide/{slider_id}', 'App\Http\Controllers\SliderController@update_slide');
Route::get('/delete-slide/{slider_id}', 'App\Http\Controllers\SliderController@delete_slide');
Route::get('/unactive-slide/{slider_id}', 'App\Http\Controllers\SliderController@unactive_slide');
Route::get('/active-slide/{slider_id}', 'App\Http\Controllers\SliderController@active_slide');
