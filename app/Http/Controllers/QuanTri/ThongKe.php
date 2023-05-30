<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoaDonXuatModels;

class ThongKe extends Controller
{
    public function index(Request $request){
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Truy vấn database để tính tổng doanh số trong khoảng thời gian đã cho
        $totalSales = HoaDonXuatModels::whereBetween('NgayXuat', [$startDate, $endDate])->sum('TongTien');
        return view('quanTri.ThongKe.index', compact('totalSales'));
    }
}
