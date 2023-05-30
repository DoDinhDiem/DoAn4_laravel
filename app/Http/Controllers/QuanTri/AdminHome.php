<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPhamModels;
use App\Models\DonHangModels;
use App\Models\KhachHangModels;
use App\Models\TinTucModels;

class AdminHome extends Controller
{
    public function index(){
        $product = SanPhamModels::count();
        $order = DonHangModels::count();
        $custumer = KhachHangModels::count();
        $news = TinTucModels::count();
        $order_list = DonHangModels::where('TrangThaiDonHang', 0)->get();
        return view('quanTri.index', compact('product', 'order', 'custumer', 'news', 'order_list'));
    }
}
