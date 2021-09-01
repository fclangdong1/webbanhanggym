<?php
// namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Route;

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
//FRONTEND
Route::get('/', [
	'as' => '/',
	'uses' => 'App\Http\Controllers\HomeController@index'
]);
Route::get('trang-chu', [
	'as' => 'trang-chu',
	'uses' => 'App\Http\Controllers\HomeController@index'
]);
// Tìm Kiếm sản phẩm
Route::post('/tim-kiem', [
	'as' => '/tim-kiem',
	'uses' => 'App\Http\Controllers\HomeController@search'
]);
// tìm kiếm product admin
Route::post('/search-product', [
	'as' => '/search-product',
	'uses' => 'App\Http\Controllers\HomeController@search_product'
]);

Route::post('/search-brand', [
	'as' => '/search-brand',
	'uses' => 'App\Http\Controllers\HomeController@search_brand'
]);
// DANH MỤC SẢN PHẨM TRANG-CHU
Route::get('danh-muc-san-pham/{category_type_id}', [
	'as' => 'danh-muc-san-pham/{category_type_id}',
	'uses' => 'App\Http\Controllers\CheckoutController@show_category_home'
]);
//Danh mục thương hiệu
Route::get('thuong-hieu/{brand_id}', [
	'as' => 'thuong-hieu/{brand_id}',
	'uses' => 'App\Http\Controllers\BrandProduct@show_brand_home'
]);
// chi tiết sản phẩm
Route::get('chi-tiet-san-pham/{product_id}', [
	'as' => 'chi-tiet-san-pham/{product_id}',
	'uses' => 'App\Http\Controllers\ProductController@details_product'
]);
//BACKEND
Route::get('admin', [
	'as' => 'admin',
	'uses' => 'App\Http\Controllers\AdminController@index'
]);
Route::get('dashboard', [
	'as' => 'dashboard',
	'uses' => 'App\Http\Controllers\AdminController@show_dashboard'
]);
Route::post('admin-dashboard', [
	'as' => 'admin-dashboard',
	'uses' => 'App\Http\Controllers\AdminController@dashboard'
]);
Route::get('logout', [
	'as' => 'logout',
	'uses' => 'App\Http\Controllers\AdminController@logout'
]);
// show users
Route::get('all-users', [
	'as' => 'all-users',
	'uses' => 'App\Http\Controllers\AdminController@all_users'
]);
// chuyển quyền khách hàng thành nhân viên

Route::get('impersonate/{id_users}', [
	'as' => 'impersonate/{id_users}',
	'uses' => 'App\Http\Controllers\AdminController@impersonate'
]);
// Thống kê doanh thu admin
Route::post('filter-by-date', [
	'as' => 'filter-by-date',
	'uses' => 'App\Http\Controllers\AdminController@filter_by_date'
]);
// Thống kê doanh thu admin 30  ngày
Route::post('days-order', [
	'as' => 'days-order',
	'uses' => 'App\Http\Controllers\AdminController@days_order'
]);
Route::post('dashboard-filter', [
	'as' => 'dashboard-filter',
	'uses' => 'App\Http\Controllers\AdminController@dashboard_filter'
]);

// danh mục sản phẩm Category Products 
Route::get('add-category-product', [
	'as' => 'add-category-product',
	'uses' => 'App\Http\Controllers\AdminController@add_category_product'
]);
Route::get('all-category-product', [
	'as' => 'all-category-product',
	'uses' => 'App\Http\Controllers\AdminController@all_category_product'
]);

Route::post('save-category-product', [
	'as' => 'save-category-product',
	'uses' => 'App\Http\Controllers\AdminController@save_category_product'
]);
// active danh muc san pham
Route::get('unactive-category-product/{category_type_id}', [
	'as' => 'unactive-category-product/{category_type_id}',
	'uses' => 'App\Http\Controllers\AdminController@unactive_category_product'
]);
Route::get('active-category-product/{category_type_id}', [
	'as' => 'active-category-product/{category_type_id}',
	'uses' => 'App\Http\Controllers\AdminController@active_category_product'
]);
// xóa sửa update danh mục sản phẩm
Route::get('edit-category-product/{category_type_id}', [
	'as' => 'edit-category-product/{category_type_id}',
	'uses' => 'App\Http\Controllers\AdminController@edit_category_product'
]);
Route::get('delete-category-product/{category_type_id}', [
	'as' => 'delete-category-product/{category_type_id}',
	'uses' => 'App\Http\Controllers\AdminController@delete_category_product'
]);
Route::post('update-category-product/{category_type_id}', [
	'as' => 'update-category-product/{category_type_id}',
	'uses' => 'App\Http\Controllers\AdminController@update_category_product'
]);

// sản phẩm PRODUCT 
Route::get('add-product', [
	'as' => 'add-product',
	'uses' => 'App\Http\Controllers\ProductController@add_product'
]);
Route::get('edit-product/{product_id}', [
	'as' => 'edit-product/{product_id}',
	'uses' => 'App\Http\Controllers\ProductController@edit_product'
]);
Route::get('delete-product/{product_id}', [
	'as' => 'delete-product/{product_id}',
	'uses' => 'App\Http\Controllers\ProductController@delete_product'
]);
Route::get('all-product', [
	'as' => 'all-product',
	'uses' => 'App\Http\Controllers\ProductController@all_product'
]);
// active products
Route::get('unactive-product/{product_id}', [
	'as' => 'unactive-product/{product_id}',
	'uses' => 'App\Http\Controllers\ProductController@unactive_product'
]);
Route::get('active-product/{product_id}', [
	'as' => 'active-product/{product_id}',
	'uses' => 'App\Http\Controllers\ProductController@active_product'
]);
// sửa update products
Route::post('save-product', [
	'as' => 'save-product',
	'uses' => 'App\Http\Controllers\ProductController@save_product'
]);
Route::post('update-product/{product_id}', [
	'as' => 'update-product/{product_id}',
	'uses' => 'App\Http\Controllers\ProductController@update_product'
]);


// Thương HIệu BRAND
Route::get('add-brand-product', [
	'as' => 'add-brand-product',
	'uses' => 'App\Http\Controllers\BrandProduct@add_brand_product'
]);
Route::get('edit-brand-product/{brand_product_id}', [
	'as' => 'edit-brand-product/{brand_product_id}',
	'uses' => 'App\Http\Controllers\BrandProduct@edit_brand_product'
]);
Route::get('delete-brand-product/{brand_product_id}', [
	'as' => 'delete-brand-product/{brand_product_id}',
	'uses' => 'App\Http\Controllers\BrandProduct@delete_brand_product'
]);
Route::get('all-brand-product', [
	'as' => 'all-brand-product',
	'uses' => 'App\Http\Controllers\BrandProduct@all_brand_product'
]);
// active brand products
Route::get('unactive-brand-product/{brand_product_id}', [
	'as' => 'unactive-brand-product/{brand_product_id}',
	'uses' => 'App\Http\Controllers\BrandProduct@unactive_brand_product'
]);
Route::get('active-brand-product/{brand_product_id}', [
	'as' => 'active-brand-product/{brand_product_id}',
	'uses' => 'App\Http\Controllers\BrandProduct@active_brand_product'
]);
// save thương hiệu
Route::post('save-brand-product', [
	'as' => 'save-brand-product',
	'uses' => 'App\Http\Controllers\BrandProduct@save_brand_product'
]);
// update thương hiệu brand
Route::post('update-brand-product/{brand_product_id}', [
	'as' => 'update-brand-product/{brand_product_id}',
	'uses' => 'App\Http\Controllers\BrandProduct@update_brand_product'
]);

// Cart giỏ hàng
Route::post('save-cart', [
	'as' => 'save-cart',
	'uses' => 'App\Http\Controllers\CartController@save_cart'
]);
Route::post('add-cart-ajax', [
	'as' => 'add-cart-ajax',
	'uses' => 'App\Http\Controllers\CartController@add_cart_ajax'
]);
Route::get('gio-hang', [
	'as' => 'gio-hang',
	'uses' => 'App\Http\Controllers\CartController@gio_hang'
]);
Route::post('update-cart-quantity', [
	'as' => 'update-cart-quantity',
	'uses' => 'App\Http\Controllers\CartController@update_cart_quantity'
]);
Route::post('update-cart', [
	'as' => 'update-cart',
	'uses' => 'App\Http\Controllers\CartController@update_cart'
]);
Route::get('show-cart', [
	'as' => 'show-cart',
	'uses' => 'App\Http\Controllers\CartController@show_cart'
]);
// xóa sapr phẩm trong giỏ hàng
Route::get('delete-to-cart/{rowId}', [
	'as' => 'delete-to-cart/{rowId}',
	'uses' => 'App\Http\Controllers\CartController@delete_to_cart'
]);
// end xóa sanr phẩm trong giỏ hàng
// xóa sanr phẩm trong giỏ hàng
Route::get('del-product/{session_id}', [
	'as' => 'del-product/{session_id}',
	'uses' => 'App\Http\Controllers\CartController@del_product'
]);
// end xóa sanr phẩm trong giỏ hàng


// tinh phi khuyen mai
Route::get('check-coupon', [
	'as' => 'check-coupon',
	'uses' => 'App\Http\Controllers\CartController@check_coupon'
]);
// xóa mã khuyến mãi khách hàng
Route::get('unset-coupon', [
	'as' => 'unset-coupon',
	'uses' => 'App\Http\Controllers\CartController@unset_coupon'
]);
// trong trang admin
// thêm mã giảm giá
Route::get('insert-coupon', [
	'as' => 'insert-coupon',
	'uses' => 'App\Http\Controllers\CouponController@insert_coupon'
]);
// show danh sách mã giảm giá
Route::get('list-coupon', [
	'as' => 'list-coupon',
	'uses' => 'App\Http\Controllers\CouponController@list_coupon'
]);
// xóa mã giảm giá
Route::get('delete-coupon/{id_coupon}', [
	'as' => 'delete-coupon/{id_coupon}',
	'uses' => 'App\Http\Controllers\CouponController@delete_coupon'
]);

Route::get('insert-coupon-code', [
	'as' => 'insert-coupon-code',
	'uses' => 'App\Http\Controllers\CouponController@insert_coupon_code'
]);
// Hồ sơ khách hàng
Route::get('show-user', [
	'as' => 'show-user',
	'uses' => 'App\Http\Controllers\UserController@show_user'
]);
Route::post('update-user', [
	'as' => 'update-user',
	'uses' => 'App\Http\Controllers\UserController@update_user'
]);
Route::post('changPassword', [
	'as' => 'changPassword',
	'uses' => 'App\Http\Controllers\UserController@changPassword'

]);
// chi tiết đơn hàng cho khách hàng
Route::get('view-order-user/{orderId}', [
	'as' => 'view-order-user/{orderId}',
	'uses' => 'App\Http\Controllers\UserController@view_order_user'
]);
// Check out thanh toan
// Route::get('login-checkout', [
// 	'as' => 'login-checkout',
// 	'uses' => 'App\Http\Controllers\CheckoutController@login_checkout'
// ]);
Route::get('signup-checkout', [
	'as' => 'signup-checkout',
	'uses' => 'App\Http\Controllers\CheckoutController@signup_checkout'
]);
// đăng ký tài khoản khach hang
Route::post('add-customer', [
	'as' => 'add-customer',
	'uses' => 'App\Http\Controllers\CheckoutController@add_customer'
]);
Route::get('checkout', [
	'as' => 'checkout',
	'uses' => 'App\Http\Controllers\CheckoutController@checkout'
]);
Route::post('save-checkout-customer', [
	'as' => 'save-checkout-customer',
	'uses' => 'App\Http\Controllers\CheckoutController@save_checkout_customer'
]);
// thanh toán
Route::get('payment', [
	'as' => 'payment',
	'uses' => 'App\Http\Controllers\CheckoutController@payment'
]);
Route::post('order-place', [
	'as' => 'order-place',
	'uses' => 'App\Http\Controllers\CheckoutController@order_place'
]);
// quan ly don hang
Route::get('manage-order', [
	'as' => 'manage-order',
	'uses' => 'App\Http\Controllers\CheckoutController@manage_order'
]);
Route::get('view-order/{orderId}', [
	'as' => 'view-order/{orderId}',
	'uses' => 'App\Http\Controllers\CheckoutController@view_order'
]);
Route::post('update-order-qty', [
	'as' => 'update-order-qty',
	'uses' => 'App\Http\Controllers\OrderController@update_order_qty'
]);
// khách hủy đơn hàng
Route::post('huy-don-hang', [
	'as' => 'huy-don-hang',
	'uses' => 'App\Http\Controllers\OrderController@huy_don_hang'
]);
// đăng nhập khách hàng
Route::post('login-customer', [
	'as' => 'login-customer',
	'uses' => 'App\Http\Controllers\CheckoutController@login_customer'
]);
// đăng xuất khách hàng
Route::get('login-checkout', [
	'as' => 'login-checkout',
	'uses' => 'App\Http\Controllers\CheckoutController@login_checkout'
]);
Route::get('logout-checkout', [
	'as' => 'logout-checkout',
	'uses' => 'App\Http\Controllers\CheckoutController@logout_checkout'
]);
// tính năng bình luận

Route::post('load-comment', [
	'as' => 'load-comment',
	'uses' => 'App\Http\Controllers\ProductController@load_comment'
]);
Route::post('send-comment', [
	'as' => 'send-comment',
	'uses' => 'App\Http\Controllers\ProductController@send_comment'
]);



// send mail

Route::get('send-mail', [
	'as' => 'send-mail',
	'uses' => 'App\Http\Controllers\MailController@send_mail'
]);
