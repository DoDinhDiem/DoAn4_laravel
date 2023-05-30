<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDonHangModels;
use App\Models\ChiTietHoaDonXuatModels;
use App\Models\HoaDonXuatModels;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DonHangModels;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DonHangController extends Controller
{
    public function index(Request $request){
        $pageSize = $request->input('pageSize', 5); // Lấy giá trị pageSize từ request, mặc định là 10
        $minDate = $request->input('min_date');
        $maxDate = $request->input('max_date');
        $name = $request->input('name');
        $query = DonHangModels::query();
        if (($minDate && $maxDate) || $minDate || $maxDate) {
            $query->filterByDate($name, $minDate, $maxDate);
        }
        $order = $query->paginate($pageSize); // Phân trang với kích thước trang là $pageSize
        $pageIndex = $order->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $order->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $order->total(); // Lấy tổng số sản phẩm
        $staff = User::pluck('name', 'id');
    
        return view('quanTri.DonHang.index', compact('order', 'staff','pageIndex', 'pageSize', 'total'));
    }
    public function show(string $id)
    {
        $order = DonHangModels::with('khachhang' , 'sanpham', 'chitietdonhang')->findOrFail($id);
        return view('quanTri.DonHang.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = DonHangModels::findOrFail($id);
        return view('quanTri.DonHang.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = DonHangModels::findOrFail($id);
        $input = $request->all();
        $order->update($input);

        return redirect()->route('DonHang')->with('success', 'Cập nhật thành công.');
    }
    public function print(){
        return view('quanTri.DonHang.index');
    }
    public function postprint(Request $request, string $id){
        $order = DonHangModels::findOrFail($id);
        $orderdetail = ChiTietDonHangModels::where('MaDonHang', $id)->get();
        $invoice = new HoaDonXuatModels;
        $invoice->NgayXuat = Carbon::now();
        $invoice->MaKhachHang = $order->MaKhachHang;
        $invoice->MaNhanVien = Auth::user()->id;
        $invoice->TongTien = $order->TongTien;
        $invoice->save();
        
        foreach($orderdetail as $item){
            $invoicedetail = new ChiTietHoaDonXuatModels;
            $invoicedetail->MaHoaDonXuat = $invoice->id;
            $invoicedetail->MaSanPham = $item['MaSanPham'];
            $invoicedetail->SoLuong = $item['SoLuong'];
            $invoicedetail->GiaBan = $item['GiaMua'];
            $invoicedetail->save();
        }

        return redirect()->route('DonHang')->with('success', 'Xuất hóa đơn thành công.');
    }

}
