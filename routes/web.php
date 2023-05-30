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


Route::controller(App\Http\Controllers\LoginAuthController::class)->group(function () {
    Route::get('/Login', 'login')->name('login');
    Route::post('/Login', 'loginstore')->name('login.store');
    Route::get('/Register', 'register')->name('Register');
    Route::post('/Register', 'registerstore')->name('register.store');
    Route::get('/Logout', 'logout')->name('logout');
});

//Trang chủ người dùng
Route::controller(App\Http\Controllers\TrangChu\HomeController::class)->group(function () 
{
    Route::get('/', 'index')->name('home');
    Route::get('/categoryproduct/{id}', 'CategoryProduct')->name('categoryproduct');
    Route::get('/productdetail/{id}', 'ProductDetail')->name('productdetail');
    Route::get('/News', 'News')->name('News');
    Route::get('/NewDetail/{id}', 'NewDetail')->name('NewDetail');
    Route::get('/AboutUs', 'AboutUs')->name('AboutUs');
    Route::get('/Contact', 'Contact')->name('Contact');
    Route::get('/shopping-cart', 'ViewCart')->name('ViewCart');
    Route::get('/CheckOut1', 'CheckOut')->name('CheckOut');
    Route::post('/CheckOut', 'store')->name('CheckOut.store');
    Route::group(['prefix' => 'cart'], function () {
        Route::controller(App\Http\Controllers\TrangChu\CartController::class)->group(function () {
            Route::get('/view', 'view')->name('viewCart');
            Route::get('/addCart{id}', 'add')->name('addCart');
            Route::get('/removeCart/{id}', 'remove')->name('removeCart');
            Route::post('/updateCart/{id}', 'update')->name('updateCart');
            Route::get('/clearCart', 'clear')->name('clearCart');
           
        });
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'checkrole'], function () {
    Route::controller(App\Http\Controllers\QuanTri\AdminHome::class)->group(function () {
        Route::get('/Home', 'index')->name('AdminHome');
    });
    Route::controller(App\Http\Controllers\QuanTri\LoaiSPController::class)->group(function () {
        Route::get('/LoaiSP', 'index')->name('LoaiSP');
        Route::get('/LoaiSP/create', 'create')->name('LoaiSP.create');
        Route::post('/LoaiSP', 'store')->name('LoaiSP.store');
        Route::get('LoaiSP/{id}/edit', 'edit')->name('LoaiSP.edit');
        Route::put('LoaiSP/{id}', 'update')->name('LoaiSP.update');
        Route::delete('LoaiSP/{id}', 'destroy')->name('LoaiSP.destroy');
    });
    Route::controller(App\Http\Controllers\QuanTri\DonViTinhController::class)->group(function () {
        Route::get('/DonViTinh', 'index')->name('DonViTinh');
        Route::get('/DonViTinh/create', 'create')->name('DonViTinh.create');
        Route::post('/DonViTinh', 'store')->name('DonViTinh.store');
        Route::get('/DonViTinh/{id}/edit', 'edit')->name('DonViTinh.edit');
        Route::put('/DonViTinh/{id}', 'update')->name('DonViTinh.update');
        Route::delete('/DonViTinh/{id}', 'destroy')->name('DonViTinh.destroy');
    });
    Route::controller(App\Http\Controllers\QuanTri\NhaSanXuatController::class)->group(function () {
        Route::get('/NhaSanXuat', 'index')->name('NhaSanXuat');
        Route::get('/NhaSanXuat/create', 'create')->name('NhaSanXuat.create');
        Route::post('/NhaSanXuat', 'store')->name('NhaSanXuat.store');
        Route::get('/NhaSanXuat/{id}/edit', 'edit')->name('NhaSanXuat.edit');
        Route::put('/NhaSanXuat/{id}', 'update')->name('NhaSanXuat.update');
        Route::delete('/NhaSanXuat/{id}', 'destroy')->name('NhaSanXuat.destroy');
    });
    Route::controller(App\Http\Controllers\QuanTri\SanPhamController::class)->group(function () {
        Route::get('/SanPham', 'index')->name('SanPham');
        Route::get('/SanPham/create', 'create')->name('SanPham.create');
        Route::post('/SanPham', 'store')->name('SanPham.store');
        Route::get('/SanPham/{id}/show', 'show')->name('SanPham.show');
        Route::get('/SanPham/{id}/edit', 'edit')->name('SanPham.edit');
        Route::put('/SanPham/{id}', 'update')->name('SanPham.update');
        Route::delete('/SanPham/{id}', 'destroy')->name('SanPham.destroy');
    });
    
    Route::controller(App\Http\Controllers\QuanTri\GiamGiaController::class)->group(function () {
        Route::get('/GiamGia', 'index')->name('GiamGia');
        Route::get('/GiamGia/create', 'create')->name('GiamGia.create');
        Route::post('/GiamGia', 'store')->name('GiamGia.store');
        Route::get('/GiamGia/{id}/edit', 'edit')->name('GiamGia.edit');
        Route::put('/GiamGia/{id}', 'update')->name('GiamGia.update');
        Route::delete('/GiamGia/{id}', 'destroy')->name('GiamGia.destroy');
    });
    Route::controller(App\Http\Controllers\QuanTri\KhuyenMaiController::class)->group(function () {
        Route::get('/KhuyenMai', 'index')->name('KhuyenMai');
        Route::get('/KhuyenMai/create', 'create')->name('KhuyenMai.create');
        Route::post('/KhuyenMai', 'store')->name('KhuyenMai.store');
        Route::get('/KhuyenMai/{id}/show', 'show')->name('KhuyenMai.show');
        Route::get('/KhuyenMai/{id}/edit', 'edit')->name('KhuyenMai.edit');
        Route::put('/KhuyenMai/{id}', 'update')->name('KhuyenMai.update');
        Route::delete('/KhuyenMai/{id}', 'destroy')->name('KhuyenMai.destroy');
    });
    Route::controller(App\Http\Controllers\QuanTri\KhachHangController::class)->group(function () {
        Route::get('/KhachHang', 'index')->name('KhachHang');
        Route::get('/KhachHang/create', 'create')->name('KhachHang.create');
        Route::post('/KhachHang', 'store')->name('KhachHang.store');
        Route::get('/KhachHang/{id}/edit', 'edit')->name('KhachHang.edit');
        Route::put('/KhachHang/{id}', 'update')->name('KhachHang.update');
        Route::delete('/KhachHang/{id}', 'destroy')->name('KhachHang.destroy');
    });
    Route::controller(App\Http\Controllers\QuanTri\UserController::class)->group(function () {
        Route::get('/User', 'index')->name('User');
        Route::get('/User/create', 'create')->name('User.create');
        Route::post('/User', 'store')->name('User.store');
        Route::get('/User/{id}/edit', 'edit')->name('User.edit');
        Route::put('/User/{id}', 'update')->name('User.update');
        Route::delete('/User/{id}', 'destroy')->name('User.destroy');
    });
    Route::controller(App\Http\Controllers\QuanTri\NhaCungCapController::class)->group(function () {
        Route::get('/NhaCungCap', 'index')->name('NhaCungCap');
        Route::get('/NhaCungCap/create', 'create')->name('NhaCungCap.create');
        Route::post('/NhaCungCap', 'store')->name('NhaCungCap.store');
        Route::get('/NhaCungCap/{id}/edit', 'edit')->name('NhaCungCap.edit');
        Route::put('/NhaCungCap/{id}', 'update')->name('NhaCungCap.update');
        Route::delete('/NhaCungCap/{id}', 'destroy')->name('NhaCungCap.destroy');
    });
    
    Route::controller(App\Http\Controllers\QuanTri\HoaDonNhapController::class)->group(function () {
        Route::get('/HoaDonNhap', 'index')->name('HoaDonNhap');
        Route::get('/HoaDonNhap/create', 'create')->name('HoaDonNhap.create');
        Route::post('/HoaDonNhap', 'store')->name('HoaDonNhap.store');
        Route::get('/HoaDonNhap/{id}/show', 'show')->name('HoaDonNhap.show');
        Route::get('/HoaDonNhap/{id}/edit', 'edit')->name('HoaDonNhap.edit');
        Route::put('/HoaDonNhap/{id}', 'update')->name('HoaDonNhap.update');
        Route::delete('/HoaDonNhap/{id}', 'destroy')->name('HoaDonNhap.destroy');
    });
    
    Route::controller(App\Http\Controllers\QuanTri\HoaDonXuatController::class)->group(function () {
        Route::get('/HoaDonXuat', 'index')->name('HoaDonXuat');
        Route::get('/HoaDonXuat/create', 'create')->name('HoaDonXuat.create');
        Route::post('/HoaDonXuat', 'store')->name('HoaDonXuat.store');
        Route::get('/HoaDonXuat/{id}/show', 'show')->name('HoaDonXuat.show');
        Route::get('/HoaDonXuat/{id}/edit', 'edit')->name('HoaDonXuat.edit');
        Route::put('/HoaDonXuat/{id}', 'update')->name('HoaDonXuat.update');
        Route::delete('/HoaDonXuat/{id}', 'destroy')->name('HoaDonXuat.destroy');
    });
    
    Route::controller(App\Http\Controllers\QuanTri\KhoController::class)->group(function () {
        Route::get('/Kho', 'index')->name('Kho');
        Route::get('/Kho/create', 'create')->name('Kho.create');
        Route::post('/Kho', 'store')->name('Kho.store');
        Route::get('/Kho/{id}/show', 'show')->name('Kho.show');
        Route::get('/Kho/{id}/edit', 'edit')->name('Kho.edit');
        Route::put('/Kho/{id}', 'update')->name('Kho.update');
        Route::delete('/Kho/{id}', 'destroy')->name('Kho.destroy');
    });
    
    Route::controller(App\Http\Controllers\QuanTri\SlideController::class)->group(function () {
        Route::get('/Slide', 'index')->name('Slide');
        Route::get('/Slide/create', 'create')->name('Slide.create');
        Route::post('/Slide', 'store')->name('Slide.store');
        Route::get('/Slide/{id}/edit', 'edit')->name('Slide.edit');
        Route::put('/Slide/{id}', 'update')->name('Slide.update');
        Route::delete('/Slide/{id}', 'destroy')->name('Slide.destroy');
    });
    Route::controller(App\Http\Controllers\QuanTri\TinTucController::class)->group(function () {
        Route::get('/TinTuc', 'index')->name('TinTuc');
        Route::get('/TinTuc/create', 'create')->name('TinTuc.create');
        Route::post('/TinTuc', 'store')->name('TinTuc.store');
        Route::get('/TinTuc/{id}/show', 'show')->name('TinTuc.show');
        Route::get('/TinTuc/{id}/edit', 'edit')->name('TinTuc.edit');
        Route::put('/TinTuc/{id}', 'update')->name('TinTuc.update');
        Route::delete('/TinTuc/{id}', 'destroy')->name('TinTuc.destroy');
    });

    Route::controller(App\Http\Controllers\QuanTri\DonHangController::class)->group(function () {
        Route::get('/DonHang', 'index')->name('DonHang');
        Route::get('/DonHang/{id}/show', 'show')->name('DonHang.show');
        Route::get('/DonHang/{id}/edit', 'edit')->name('DonHang.edit');
        Route::put('/DonHang/{id}', 'update')->name('DonHang.update');
        Route::post('/DonHang/print/{id}/', 'postprint')->name('DonHang.postprint');
    });
    Route::controller(App\Http\Controllers\QuanTri\ThongKe::class)->group(function () {
        Route::get('/ThongKe', 'index')->name('ThongKe');
    });
});

