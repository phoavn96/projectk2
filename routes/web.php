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
Route::GET('/print-order/{id}','OrderController@print_order');
Route::GET('/admin/ads','ProductController@ads');
Route::POST('/admin/sendads','ProductController@send_ads');

Route::DELETE('/delete-whish/{id}','ProductController@delete_whish');
Route::GET('/whishlist-add','ProductController@whish_list_add');
Route::get('/whishlist','ProductController@whish_list');
Route::get('/delete-compare','ProductController@compare_del');
Route::get('/compareaddFree','ProductController@compare_add_free');
Route::get('/comparelistFree','ProductController@compare_list_free');
Route::get('/delete-compare-free','ProductController@compare_del_free');
Route::get('/compareadd','ProductController@compare_add');
Route::get('/comparelist','ProductController@compare_list');
Route::get('/chi-tiet-san-pham/{id}','ProductController@customer_detail_product');
Route::get('/san-pham','ProductController@customer_list_product');
Route::get('/', 'HomeController@index');

//product
Route::resource('admin/product', 'ProductController')->middleware('checkadm');
Route::get('/unactive-product/{id}', 'ProductController@Unactive_product')->middleware('checkadm');
Route::get('/active-product/{id}', 'ProductController@Active_product')->middleware('checkadm');
Route::post('/product/delete-all', 'ProductController@destroyAll')->middleware('checkadm');
Route::get('/delete-product/{id}', 'ProductController@delete_product')->middleware('checkadm');

//brand
Route::resource('/admin/brand', 'BrandController')->middleware('checkadm');
Route::post('/brand/delete-all', 'BrandController@destroyAll')->middleware('checkadm');
Route::get('/delete-brand/{id}', 'BrandController@delete_brand')->middleware('checkadm');
//banner
Route::resource('/admin/banner', 'BannerController')->middleware('checkadm');
Route::post('/banner/delete-all', 'BannerController@destroyAll')->middleware('checkadm');
Route::get('/delete-banner/{id}', 'BannerController@delete_banner')->middleware('checkadm');

//categories
Route::resource('/admin/categories','CategoryController')->middleware('checkadm');
Route::get('unactive-categories/{id}','CategoryController@Unactive_categories')->middleware('checkadm');
Route::get('active-categories/{id}','CategoryController@Active_categories')->middleware('checkadm');
Route::post('/categories/delete-all', 'CategoryController@destroyAll')->middleware('checkadm');
Route::get('/delete-categories/{id}', 'CategoryController@delete_categories')->middleware('checkadm');

//discount
Route::resource('/admin/discount','DiscountController')->middleware('checkadm');
Route::post('/discount/delete-all', 'DiscountController@destroyAll')->middleware('checkadm');
Route::get('unactive-discount/{id}','DiscountController@Unactive_discount')->middleware('checkadm');
Route::get('active-discount/{id}','DiscountController@Active_discount')->middleware('checkadm');
Route::get('/delete-discount/{id}', 'DiscountController@delete_discount')->middleware('checkadm');


Route::post('/admin/accounts/{id}/edit','AccountController@update')->middleware('checkadm');
Route::get('/admin/accounts/{id}/edit-password','AccountController@edit_password')->middleware('checkadm');
Route::post('/admin/accounts/{id}/save-edit-password','AccountController@save_edit_password')->middleware('checkadm');
Route::resource('/admin/accounts', 'AccountController')->middleware('checkadm');
Route::get('/unactive-accounts/{id}', 'AccountController@Unactive_account')->middleware('checkadm');
Route::get('active-accounts/{id}', 'AccountController@Active_account')->middleware('checkadm');
Route::get('/delete-account/{id}', 'AccountController@delete_account')->middleware('checkadm');
Route::post('/account/delete-all', 'AccountController@destroyAll')->middleware('checkadm');

// bảng điều khiển admin
Route::get('/login', 'AdminController@Index');
Route::get('/admin-signup', 'AdminController@SignUp');
Route::post('/do-signup', 'AdminController@DoSignUp');
Route::post('/do-login', 'AdminController@DoLogin');
Route::get('/dashboard', 'AdminController@ShowDashbord')->middleware('checkadm');

Route::get('/logout-adm', 'AdminController@DoLogout');

//order admin
Route::resource('order-admin','OrderController')->middleware('checkadm');
Route::post('order-admin/delete-all','OrderController@destroyAll')->middleware('checkadm');
Route::get('/change-status/{id}','OrderController@change_status')->middleware('checkadm');
Route::post('/export-excel','OrderController@export_excel')->middleware('checkadm');

//Route::post('/order-admin/delete-all', 'OrderController@destroyAll');

//question
//Route::post('/admin/qa/{id}/edit','QuestionController@update');
Route::get('/admin/qa/list','QuestionController@index_admin');
Route::resource('/qa','QuestionController');
Route::resource('admin/qa','QuestionController');
Route::get('/delete-qa/{id}', 'QuestionController@delete_question')->middleware('checkadm');
Route::get('/unactive-qa/{id}','QuestionController@Unactive_question')->middleware('checkadm');
Route::get('/active-qa/{id}','QuestionController@Active_question')->middleware('checkadm');
Route::post('/qa/delete-all', 'QuestionController@destroyAll')->middleware('checkadm');

//blog
Route::resource('/blog','BlogController');
Route::get('blog-details/{id}','BlogController@detail_blog');

//cart
Route::get('/shopping-cart/add', 'ShoppingCartController@add'); // thêm sản phẩm
Route::get('/shopping-cart/remove', 'ShoppingCartController@remove'); // xóa sản phẩm
Route::get('/shopping-cart/remove-list', 'ShoppingCartController@remove_list'); // xóa sản phẩm
Route::get('/shopping-cart/show', 'ShoppingCartController@show'); // view giỏ hàng
Route::get('/shopping-cart/add-list', 'ShoppingCartController@add_list'); // thêm sản phẩm

//contact-us
Route::get('/contactus', 'ContactUsController@show');
//checkout
Route::get('/login-user', 'CheckoutController@login_user'); // view đăng nhập ́ người dùng
Route::post('/login-customer', 'CheckoutController@login_customer');// login user

Route::get('/register-user', 'CheckoutController@register_user'); // view  đăng kí người dùng
Route::post('/add-customer', 'CheckoutController@add_customer'); // xử lý tạo mới tài khoản người dùng

Route::get('/logout-checkout', 'CheckoutController@logout_checkout'); // logout người dùng
Route::post('/change-shipping', 'CheckoutController@change_shipping');
Route::get('/checkout', 'CheckoutController@checkout')->middleware('checkuser'); // hiện thị form nhập thông tin gưi hàng và chọn đạt mua
Route::get('/checkout-paypal', 'CheckoutController@checkout_paypal')->middleware('checkuser'); //
Route::post('/save-checkout-customer', 'CheckoutController@save_checkout_customer')->middleware('checkuser'); // xử lý lưu thông tin gửi hàng của người dùng
Route::post('/save-checkout-customer-paypal', 'CheckoutController@save_checkout_custcomer_paypal')->middleware('checkuser'); // xử lý lưu thông tin gửi hàng của người dùng
Route::get('/end-cart', 'CheckoutController@end_cart')->middleware('checkuser'); // hiện thị đơn hàng sau khi khách đặt mua thành công
Route::get('/end-paypal-cart','CheckoutController@end_paypal_cart')->middleware('checkuser');


//abput-us
Route::get('aboutus',function ()
{
    return view('pages.about-us.aboutus');
});
Route::get('/sms',function (){
    return view('pages.sms.sms');
});
//Route::post('/sms','SmsController@sendSms');

//email
Route::get('send-mail', 'MailController@send_mail');

// quản lý đơn hàng cua user
Route::get('/order-management', 'CheckoutController@order_management')->middleware('checkuser');
Route::get('/order-management/{id}', 'CheckoutController@order_detail')->middleware('checkuser');

//ma giam gia
Route::post('/get-discount', 'ShoppingCartController@get_discount');

