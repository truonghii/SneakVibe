<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\CategoryBlogController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\orderDetailController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\voucherController;
use App\Http\Controllers\HistoryController;

use App\Http\Controllers\myController;

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

// --------------SITE------------------

Route::get('/',[myController::class,'index']);

Route::get('/thuong-hieu-giay/{slug}',[myController::class, 'giayTheoThuongHieu']);
Route::get('/danh-muc-giay/{slug}',[myController::class,'giayTheoDanhMuc']);


Route::get('/chi-tiet-giay/{slug}',[myController::class,'giayChiTiet']);


Route::get('/blog',[myController::class,'blog']);
Route::get('/chi-tiet-blog/{slug}',[myController::class,'blogChiTiet']);



Route::get('/de', [cartController::class, 'removeCart']);
Route::get('/vc', [cartController::class, 'removeVC']);

Route::get('/deleteProduct/{id}', [cartController::class, 'delete_cart_detail'])->name('delete.product');
Route::get('/giamgia', [cartController::class, 'check_voucher']);
Route::get('/delete-voucher', [cartController::class, 'delete_vch'])->name('delete.voucher');


Route::get('/pay', [cartController::class, 'pay']);
Route::get('/confirm', [cartController::class, 'confirm'])->name('confirm');
Route::get('/success', [cartController::class, 'success'])->name('success');
Route::get('/aaa', [cartController::class, 'aaa']);
Route::get('/verify/{token}', [cartController::class, 'verify'])->name('order.verify');

Route::post('/update-cart', [cartController::class, 'update'])->name('update_cart');
Route::post('/thanh-toan', [cartController::class, 'check_out'])->name('check_out');

Route::get('/lich-su-mua-hang', [paymentController::class, 'history'])->name('history');
Route::get('/lich-su-mua-hang/don-hang-chi-tiet/{order}', [paymentController::class, 'order_history'])->name('order_history');
// Route::get('/lich-su-mua-hang/don-hang-chi-tiet/{order}', [HistoryController::class, 'order_history'])->name('order_history');


//vnpay
Route::post('/pay/send', [paymentController::class, 'pay_send']);
Route::post('/vn-pay', [paymentController::class, 'vn_pay']);
Route::post('/thanh-toan', [paymentController::class, 'check_out']);
Route::get('/vnpay-cart', [paymentController::class, 'vn_pay_cart']);
Route::get('/vnpay-return', [paymentController::class, 'vn_pay_return']);
Route::post('/tt-vnpay-return', [paymentController::class, 'tt_return_vnpay']);
Route::post('/vnpay_create_payment', [paymentController::class, 'payment']);


Route::group(['prefix'=>'account'], function(){
    Route::get('/login',[AccountController::class,'login'])->name('account.login');
    Route::get('/verify_account/{email}',[AccountController::class,'verify'])->name('account.verify');
    Route::post('/login',[AccountController::class,'check_login']);

    Route::get('/register',[AccountController::class,'register'])->name('account.register');
    Route::post('/register',[AccountController::class,'check_register']);

    Route::get('/logout',[AccountController::class,'logout'])->name('account.logout');
    Route::get('/my-cart',[AccountController::class,'my_cart'])->name('account.my_cart');

    Route::middleware(['customer'])->group(function (){
        Route::get('/profile',[AccountController::class,'profile'])->name('account.profile');
        Route::post('/profile',[AccountController::class,'check_profile']);
    
        Route::get('/change-password',[AccountController::class,'change_password'])->name('account.change_password');
        Route::post('/change-password',[AccountController::class,'check_change_password']);
        //Cart
        Route::post('/add_cart', [cartController::class,'add_cart'])->name('add.cart');
        Route::get('/cart', [cartController::class,'cart'])->name('cart');
        
    });

  

    Route::get('/forgot-password',[AccountController::class,'forgot_password'])->name('account.forgot_password');
    Route::post('/forgot-password',[AccountController::class,'check_forgot_password']);

    Route::get('/reset-password/{token}',[AccountController::class,'reset_password'])->name('account.reset_password');
    Route::post('/reset-password/{token}',[AccountController::class,'check_reset_password']);
});

// --------------Admin-----------------
Route::get('/admin',[adminController::class,'index']);


// Quản lý thương hiệu
Route::get('/admin/quan-ly-thuong-hieu',[BrandController::class,'quanLyThuongHieu']);
Route::get('/admin/quan-ly-thuong-hieu/them',[BrandController::class,'themThuongHieu']);
Route::post('/admin/quan-ly-thuong-hieu/them',[BrandController::class,'themThuongHieu_']);
Route::get('/admin/quan-ly-thuong-hieu/cap-nhat/{id}',[BrandController::class,'capNhatThuongHieu']);
Route::post('/admin/quan-ly-thuong-hieu/cap-nhat/{id}',[BrandController::class,'capNhatThuongHieu_']);
Route::get('/admin/quan-ly-thuong-hieu/xoa/{id}',[BrandController::class,'xoaThuongHieu']);

// Quản lý danh mục sản phẩm
Route::get('/admin/quan-ly-danh-muc-giay',[CategoryController::class,'index']);
Route::get('/admin/quan-ly-danh-muc-giay/them',[CategoryController::class,'themDanhMuc']);
Route::post('/admin/quan-ly-danh-muc-giay/them',[CategoryController::class,'themDanhMuc_']);
Route::get('/admin/quan-ly-danh-muc-giay/cap-nhat/{id}',[CategoryController::class,'capNhatDanhMuc']);
Route::post('/admin/quan-ly-danh-muc-giay/cap-nhat/{id}',[CategoryController::class,'capNhatDanhMuc_']);
Route::get('/admin/quan-ly-danh-muc-giay/xoa/{id}',[CategoryController::class,'xoaDanhMuc']);
// Quản lý sản phẩm

Route::get('/admin/quan-ly-san-pham',[ProductController::class,'index']);
Route::get('/admin/quan-ly-san-pham/them',[ProductController::class,'themSanPham']);
Route::post('/admin/quan-ly-san-pham/them',[ProductController::class,'themSanPham_']);
Route::get('/admin/quan-ly-san-pham/cap-nhat/{id}',[ProductController::class,'capNhatSanPham']);
Route::post('/admin/quan-ly-san-pham/cap-nhat/{id}',[ProductController::class,'capNhatSanPham_']);
Route::get('/admin/quan-ly-san-pham/xoa-mem/{id}',[ProductController::class,'xoaMemSanPham']);
Route::get('/admin/quan-ly-san-pham/thung-rac',[ProductController::class,'thungRac']);
Route::get('/admin/quan-ly-san-pham/xoa/{id}',[ProductController::class,'xoaSanPham']);
Route::get('/admin/quan-ly-san-pham/khoi-phuc/{id}',[ProductController::class,'khoiPhuc']);
Route::get('/admin/quan-ly-san-pham/active-product-hot/{id}',[ProductController::class,'activeProductHot']);
Route::get('/admin/quan-ly-san-pham/unactive-product-hot/{id}',[ProductController::class,'unactiveProductHot']);

// Quản lý thư viện ảnh
Route::get('/admin/quan-ly-san-pham/them-thu-vien-anh',[DetailProductController::class,'themThuVienAnh']);
Route::post('/admin/quan-ly-san-pham/them-thu-vien-anh',[DetailProductController::class,'themThuVienAnh_']);
Route::get('/admin/quan-ly-san-pham/cap-nhat-thu-vien-anh/{id}',[DetailProductController::class,'capNhatThuVienAnh']);
Route::get('/admin/quan-ly-san-pham/xoa-thu-vien-anh/{id}',[DetailProductController::class,'xoaThuVienAnh']);
//Quản lý thuộc tính
Route::get('/admin/quan-ly-thuoc-tinh/them',[AttributeController::class,'themThuocTinh']);
Route::post('/admin/quan-ly-thuoc-tinh/them',[AttributeController::class,'themThuocTinh_']);

//Quản lý khách hàng
Route::get('/admin/quan-ly-khach-hang',[CustomerController::class,'index']);
Route::get('/admin/quan-ly-khach-hang/xoa/{id}',[CustomerController::class,'delete']);
// Quản lý bình luận
// Quản lý đơn hàng
Route::get('/admin/quan-ly-don-hang',[OrderController::class,'index_order']);
Route::get('/admin/quan-ly-don-hang/{id}',[OrderController::class,'delete']);
// Quản lý chi tiết đơn hàng
Route::get('/admin/quan-ly-chi-tiet-don-hang',[OrderDetailController::class,'index_order_detail']);
Route::get('/admin/quan-ly-chi-tiet-don-hang/{id}',[OrderDetailController::class,'delete']);
// Quản lý users
// Quản lý danh mục blog
Route::get('/admin/quan-ly-danh-muc-blog',[CategoryBlogController::class,'index']);
Route::get('/admin/quan-ly-danh-muc-blog/them',[CategoryBlogController::class,'create']);
Route::post('/admin/quan-ly-danh-muc-blog/them',[CategoryBlogController::class,'create_']);
Route::get('/admin/quan-ly-danh-muc-blog/cap-nhat/{id}',[CategoryBlogController::class,'edit']);
Route::post('admin/quan-ly-danh-muc-blog/cap-nhat/{id}',[CategoryBlogController::class,'edit_']);
Route::get('/admin/quan-ly-danh-muc-blog/xoa/{id}',[CategoryBlogController::class,'delete']);
// Quản blog
Route::get('/admin/quan-ly-blog',[BlogController::class,'index']);
Route::get('/admin/quan-ly-blog/them',[BlogController::class,'create']);
Route::post('/admin/quan-ly-blog/them',[BlogController::class,'create_']);
Route::get('/admin/quan-ly-blog/cap-nhat/{id}',[BlogController::class,'edit']);
Route::post('/admin/quan-ly-blog/cap-nhat/{id}',[BlogController::class,'edit_']);
Route::get('/admin/quan-ly-blog/xoa-mem/{id}',[BlogController::class,'soft_delete']);
Route::get('/admin/quan-ly-blog/thung-rac',[BlogController::class,'trash_bin']);
Route::get('/admin/quan-ly-blog/xoa/{id}',[BlogController::class,'delete']);
Route::get('admin/quan-ly-blog/khoi-phuc/{id}',[BlogController::class,'restore']);
// Quản lý voucher
Route::get('/admin/quan-ly-voucher',[voucherController::class,'index']);
Route::get('/admin/quan-ly-voucher/them',[voucherController::class,'create']);
Route::post('/admin/quan-ly-voucher/them',[voucherController::class,'create_']);
Route::get('/admin/quan-ly-voucher/cap-nhat/{id}',[voucherController::class,'edit']);
Route::post('admin/quan-ly-voucher/cap-nhat/{id}',[voucherController::class,'edit_']);
Route::get('/admin/quan-ly-voucher/xoa-mem/{id}',[voucherController::class,'soft_delete']);
Route::get('/admin/quan-ly-voucher/thung-rac',[voucherController::class,'trash_bin']);
Route::get('/admin/quan-ly-voucher/xoa/{id}',[voucherController::class,'delete']);
Route::get('admin/quan-ly-voucher/khoi-phuc/{id}',[BlogController::class,'restore']);


// --------------Users-----------------

Route::post('/vnpay_payment',[paymentController::class,'vnpay_payment']);
Route::get('/paymenttt',[paymentController::class,'paymenttt']);
