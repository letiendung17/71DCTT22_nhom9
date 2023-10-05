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
/*frontend */
Route::get(
    '/',
    'App\Http\Controllers\User\HomeController@index'
)->name("pages.trangchu");
Route::get('/search', 'App\Http\Controllers\User\HomeController@search')->name('pages.search');
Route::post(
    '/thanhtoan',
    'App\Http\Controllers\User\CartController@thanhcong'
);
Route::get(
    '/trang-chu',
 'App\Http\Controllers\User\HomeController@index'
)->name("pages.trangchu");
Route::get(
    '/trang-chu/dang-nhap-thanh-cong',
 'App\Http\Controllers\User\HomeController@index'
);
Route::get(
    '/trang-chu/danhmuc/{MA_NH}',
 'App\Http\Controllers\User\HomeController@danhmuc'
);
Route::get(
    '/trang-chu/danhmuc/chitiet/{MA_SP}',
 'App\Http\Controllers\User\HomeController@chitietsp'
);

Route::get(
    '/trang-chu/danh-muc/product/{MA_NH}',
 'App\Http\Controllers\User\HomeController@product_nhcon'
);
Route::post(
    '/product/gio-hang',
 'App\Http\Controllers\User\CartController@giohang'
);
Route::get(
    '/trang-chu/xem-gio-hang',
 'App\Http\Controllers\User\CartController@xemgiohang'
)->name('giohang.danhsach');
Route::get(
    '/trang-chu/thanh-toan',
 'App\Http\Controllers\User\CartController@thanhtoan'
);
Route::post(
    '/trang-chu/delete-cart/{id}',
 'App\Http\Controllers\User\CartController@deletecart'
);

Route::get(
    '/trang-chu/login',
 'App\Http\Controllers\User\HomeController@login'
)->name("pages.login");
Route::get(
    '/trang-chu/dang-ki-tai-khoan',
 'App\Http\Controllers\User\HomeController@signup'
)->name("pages.sigup");


Route::post(
    '/trang-chu/dang-ki-tai-khoan-thanh-cong',
 'App\Http\Controllers\User\HomeController@insert'
)->name("pages.login");
Route::post(
    '/trang-chu/kiem-tra-dang-nhap',
 'App\Http\Controllers\User\HomeController@kiemtra'
);

/*backend */
Route::middleware(['auth'])->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        // Routes cần phân quyền admin ở đây
        Route::post('/admin/xoa-nhan-vien/{id}/{MA_NV}','App\Http\Controllers\Admin\NhanvienController@delete');
        Route::post('/admin/create-nhanvien','App\Http\Controllers\Admin\NhanvienController@create')->name('admin.table.ds_nhanvien');
        Route::get('/admin/edit/{id}/{MA_NV}','App\Http\Controllers\Admin\NhanvienController@edit_nv');
        Route::post('/admin/updata/{id}/{MA_NV}','App\Http\Controllers\Admin\NhanvienController@updata_nv');
        Route::get('/admin/them-nhan-vien','App\Http\Controllers\Admin\NhanvienController@index')->name('admin.table.add_nhanvien');
        Route::post('/donhang/delete/{ID_GH}/{MA_KH}','App\Http\Controllers\Admin\AdminController@xoadonhang');
       
      
   
    });
    // Route::get('/admin','App\Http\Controllers\Admin\AdminController@index')->name('layouts.login');
    Route::get('/admin/dashboard','App\Http\Controllers\Admin\AdminController@dashboard');
Route::get('/admin/them-nganh-hang','App\Http\Controllers\Admin\NganhhangController@index');

    // ...
Route::get('/admin/them-thuong-hieu','App\Http\Controllers\Products\ProductController@add_thuonghieu')->name('admin.table.add_thuonghieu');
Route::post('/admin/them-san-pham','App\Http\Controllers\Products\ProductController@add_sanpham')->name('admin.table.add_sanpham');
Route::post('/admin/capnhatsp/{MA_SP}','App\Http\Controllers\Products\ProductController@uppdata_sanpham');
Route::get('/admin/product/edit/{MA_SP}','App\Http\Controllers\Products\ProductController@edit_sanpham')->name('admin.table.edit_sanpham');
Route::get('/admin/add-product','App\Http\Controllers\Products\ProductController@index_sp')->name('admin.table.add_sanpham');
Route::get('/admin/danh-sach-san-pham','App\Http\Controllers\Products\ProductController@dssanpham')->name('admin.table.ds_sanpham');
Route::get('/admin/them-danh-muc-con','App\Http\Controllers\Products\ProductController@add_danhmuc')->name('admin.table.add_con_danhmuc');
Route::post('/admin/xoa-san-pham/{MA_SP}','App\Http\Controllers\Products\ProductController@delete_sanpham')->name('admin.table.ds_sanpham');



Route::get('/admin/danh-sach-nhan-vien','App\Http\Controllers\Admin\NhanvienController@show')->name('admin.table.ds_nhanvien');
Route::get('/admin/danh-sach-don-hang','App\Http\Controllers\Admin\AdminController@donhang')->name('admin.table.ds_donhang');
Route::post('/admin/them-moi-nganh-hang','App\Http\Controllers\Admin\NganhhangController@add_nganhhang')->name('admin.table.add_nganhhang');
Route::post('/admin/delete/nganh-hang/{MA_NH}','App\Http\Controllers\Admin\NganhhangController@delete_nganhhang')->name('admin.table.add_nganhhang');
Route::get('/admin/danh-sach-nganh-hang','App\Http\Controllers\Admin\NganhhangController@show')->name('admin.table.ds_nganhhang');



Route::post('/admin/them-moi-danh-muc-con','App\Http\Controllers\Products\ProductController@add_danhmuccon')->name('admin.table.add_nganhhang');

Route::get('/admin/them-quang-cao','App\Http\Controllers\Admin\NganhhangController@quangcao');
Route::get('/admin/danh-sach-quang-cao','App\Http\Controllers\Admin\NganhhangController@dsquangcao');
Route::post('/admin/add-quangcao','App\Http\Controllers\Admin\NganhhangController@quangcaoadd');
Route::post('/admin/delete-qc/{ID_QC}','App\Http\Controllers\Admin\NganhhangController@deleteqc');
Route::get('/admin/edit-qc/{ID_QC}','App\Http\Controllers\Admin\NganhhangController@editqc');
Route::post('/admin/updata-qc/{ID_QC}','App\Http\Controllers\Admin\NganhhangController@updataqc');
Route::get('/admin/loi404','App\Http\Controllers\Admin\AdminController@loi404');



});

Route::get('/admin','App\Http\Controllers\Admin\AdminController@showLoginForm')->name('admin');
Route::post('/admin','App\Http\Controllers\Admin\AdminController@login')->name('admin.submit');
Route::get('/admin/dang-xuat','App\Http\Controllers\Admin\AdminController@dangxuat');

// Route::get('/logout','App\Http\Controllers\Admin\AdminController@dangxuat')->name('layouts.login');









Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');