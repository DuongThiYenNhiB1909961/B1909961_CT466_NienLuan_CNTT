<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MailController;
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
Route::get('/', [IndexController::class, 'index']);
Route::post('/load-more', [IndexController::class, 'load_more']);
Route::get('/index', [IndexController::class, 'index']);
Route::get('/introduce', [IndexController::class, 'introduce']);
Route::get('/contact', [IndexController::class, 'contact']);
Route::post('/search', [IndexController::class, 'search']);
Route::get('/register', [IndexController::class, 'register']);
Route::get('/product', [IndexController::class, 'product']);
Route::post('/auto-ajax', [IndexController::class, 'autocomplete']);
// Route::get('/filter', [IndexController::class, 'filter']);

// Send mail
Route::get('/send-email', [IndexController::class, 'send_mail']);

// admin
Route::get('/admin',[AdminController::class, 'index']);
Route::get('/manage',[AdminController::class, 'manage']);
Route::post('/dashboard',[AdminController::class, 'dashboard']);
Route::get('/logoutad',[AdminController::class, 'logoutad']);

// user
Route::get('/manage-user',[AdminController::class, 'manage_user']);
Route::get('/delete-user/{customer_id}',[AdminController::class, 'delete_user']);
Route::get('/edit-user/{customer_id}',[IndexController::class, 'edit_user']);
Route::post('/update-user/{customer_id}',[IndexController::class, 'update_user']);
Route::get('/sua-userad/{user_id}',[AdminController::class, 'sua_userad']);
Route::post('/update-userad/{user_id}',[AdminController::class, 'update_userad']);

// filter
Route::post('/filterbydate',[AdminController::class, 'filterbydate']);
Route::post('/days30Order',[AdminController::class, 'days30Order']);
Route::post('/dashboard-option',[AdminController::class, 'dashboard_filter_option']);

//CategoryProduct
Route::get('/category/{slug_category_product}', [CategoryProduct::class, 'show_category']);

Route::get('/add-category-product',[CategoryProduct::class, 'add_category_product']);
Route::get('/edit-category-product/{category_id}',[CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_id}',[CategoryProduct::class, 'delete_category_product']);
Route::get('/all-category-product',[CategoryProduct::class, 'all_category_product']);

Route::get('/unactive-category-product/{category_id}',[CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_id}',[CategoryProduct::class, 'active_category_product']);

Route::post('/save-category-product',[CategoryProduct::class, 'save_category_product']);
Route::post('/update-category-product/{category_id}',[CategoryProduct::class, 'update_category_product']);

//BrandProduct
Route::get('/brand/{slug_brand_product}', [BrandProduct::class, 'show_brand']);
Route::get('/add-brand-product',[BrandProduct::class, 'add_brand_product']);
Route::get('/edit-brand-product/{brand_id}',[BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_id}',[BrandProduct::class, 'delete_brand_product']);
Route::get('/all-brand-product',[BrandProduct::class, 'all_brand_product']);

Route::get('/unactive-brand-product/{brand_id}',[BrandProduct::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{brand_id}',[BrandProduct::class, 'active_brand_product']);

Route::post('/save-brand-product',[BrandProduct::class, 'save_brand_product']);
Route::post('/update-brand-product/{brand_id}',[BrandProduct::class, 'update_brand_product']);

//Product
Route::get('/add-product',[ProductController::class, 'add_product']);
Route::get('/edit-product/{product_id}',[ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}',[ProductController::class, 'delete_product']);
Route::get('/all-product',[ProductController::class, 'all_product']);

Route::get('/unactive-product/{product_id}',[ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}',[ProductController::class, 'active_product']);

Route::post('/save-product',[ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}',[ProductController::class, 'update_product']);

Route::post('/load-more', [IndexController::class, 'load_more']);
Route::post('/home-product',[IndexController::class, 'home_product']);
Route::post('/lquan-product',[IndexController::class, 'lquan_product']);
Route::post('/quantam-product',[IndexController::class, 'quantam_product']);
// Product_detail
Route::get('/product-detail/{product_id}', [ProductController::class, 'product_detail']);
Route::get('/hover-pro', [CartController::class, 'hover_sp']);
// cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/show-cart-ajax', [CartController::class, 'show_cart_ajax']);
Route::get('/delete-cart/{rowId}', [CartController::class, 'delete_cart']);
Route::get('/del-product/{session_id}',[CartController::class, 'delete_product']);
Route::get('/del-all-product',[CartController::class, 'delete_all_product']); 
Route::get('/show-cart-number', [CartController::class, 'show_cart_number']);
Route::get('/hover-cart', [CartController::class, 'hover_cart']);

// CHeckout
Route::get('/login-checkout', [CheckOutController::class, 'login_checkout']);
Route::get('/register', [CheckOutController::class, 'register']);
Route::post('/add-customer', [CheckOutController::class, 'add_customer']);
Route::get('/checkout', [CheckOutController::class, 'checkout']);
Route::post('/save-checkout', [CheckOutController::class, 'save_checkout']);
Route::get('/login',[CheckOutController::class, 'login']);
Route::get('/logout', [CheckOutController::class, 'logout']);
Route::get('/change',[CheckOutController::class, 'change']);
Route::get('/pill',[CheckOutController::class, 'pill']);
Route::post('/checkout-by', [CheckOutController::class, 'checkout_by']);
Route::post('/select-delivery-checkout',[CheckOutController::class, 'select_delivery_checkout']);
Route::post('/fee-feeship', [CheckOutController::class, 'fee_feeship']);
Route::get('/del-fee', [CheckOutController::class, 'del_fee']);
Route::post('/confirm-order', [CheckOutController::class, 'confirm_order']);

//Order
Route::get('/manage-order',[OrderController::class, 'manage_order']);
Route::get('/view-order/{order_id}',[OrderController::class, 'view_order']);
Route::post('/update-inventory-qty',[OrderController::class, 'update_inventory_qty']);
Route::get('/delete-order/{order_code}',[OrderController::class, 'delete_order']);
Route::get('/history',[OrderController::class, 'History']);
Route::get('/history-view-order/{order_code}',[OrderController::class, 'history_view_order']);
Route::post('/huydon',[OrderController::class, 'huydon']);

//login facebook
Route::get('/login-facebook',[AdminController::class, 'login_facebook']);
Route::get('/admin/callback', [AdminController::class, 'callback_facebook']);

//login ad gg
Route::get('/login-google',[CheckOutController::class, 'login_google']);
Route::get('/google/callback', [CheckOutController::class, 'callback_google']);

//login customer gg
Route::get('/login-customer-google',[CheckOutController::class, 'login_customer_google']);
Route::get('/customer/google/callback', [CheckOutController::class, 'callback_customer_google']);

//coupon
Route::post('/checkCoupon',[CouponController::class, 'check_coupon']);

Route::get('/add-coupon',[CouponController::class, 'add_coupon']);
Route::post('/add-coupon-code',[CouponController::class, 'add_coupon_code']);
Route::get('/all-coupon',[CouponController::class, 'all_coupon']);
Route::get('/delete-coupon/{coupon_id}',[CouponController::class, 'delete_coupon']);
Route::get('/del-coupon',[CouponController::class, 'del_coupon']);

// delivery
Route::get('/delivery',[DeliveryController::class, 'delivery']);
Route::post('/select-delivery',[DeliveryController::class, 'select_delivery']);
Route::post('/add-delivery',[DeliveryController::class, 'add_delivery']);
Route::post('/update-delivery',[DeliveryController::class, 'update_delivery']);
Route::post('/select-feeship',[DeliveryController::class, 'select_feeship']);

//Slider
Route::get('/list-slider',[SliderController::class, 'list_slider']);
Route::get('/add-slider',[SliderController::class, 'add_slider']);
Route::post('/insert-slider',[SliderController::class, 'insert_slider']);
Route::get('/edit-slider/{slider_id}',[SliderController::class, 'edit_slider']);
Route::post('/update-slider/{slider_id}',[SliderController::class, 'update_silder']);
Route::get('/unactive-slide/{slide_id}',[SliderController::class, 'unactive_slide']);
Route::get('/active-slide/{slide_id}',[SliderController::class, 'active_slide']);

// gallery
Route::get('/add-gallery/{product_id}',[GalleryController::class, 'add_gallery']);
Route::post('/select-gallery',[GalleryController::class, 'select_gallery']);
Route::post('/insert-gallery/{product_id}',[GalleryController::class, 'insert_gallery']);
Route::post('/edit-name-gal',[GalleryController::class, 'edit_name_gal']);
Route::post('/del-gal',[GalleryController::class, 'delete_gallery']);
Route::post('/update-gal',[GalleryController::class, 'update_gallery']);

// comment
Route::post('/load-cmt',[ProductController::class, 'load_cmt']);
Route::post('/send-cmt',[ProductController::class, 'send_cmt']);
Route::get('/list-cmt',[ProductController::class, 'list_cmt']);
Route::get('/unactive-comment/{comment_id}',[ProductController::class, 'unactive_comment']);
Route::get('/active-comment/{comment_id}',[ProductController::class, 'active_comment']);
Route::get('/delete-comment/{comment_id}',[ProductController::class, 'delete_comment']);
Route::post('/reply-cmt',[ProductController::class, 'reply_cmt']);
Route::post('/add-rating',[ProductController::class, 'add_rating']);

//Checkout online
Route::post('/vnpay-checkout',[CheckoutController::class, 'vnpay_checkout']);
Route::post('/confirm-paypal',[CheckoutController::class, 'confirm_paypal']);

// email
Route::get('/send-coupon',[MailController::class, 'send_coupon']);
Route::get('/send-email',[MailController::class, 'send_email']);
Route::get('/mail-example',[MailController::class, 'mail_example']);
Route::get('/quen-mk',[MailController::class, 'quen_mk']);
Route::post('/get-pass',[MailController::class, 'get_pass']);
Route::get('/update-new-pass',[MailController::class, 'update_new_pass']);
Route::post('/reset-new-pass',[MailController::class, 'reset_new_pass']);