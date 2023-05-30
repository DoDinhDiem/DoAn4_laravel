<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use App\Models\HoaDonNhapModels;
use Illuminate\Http\Request;
use App\Models\ChiTietHoaDonNhapModels;
use App\Models\User;
use App\Models\NhaCungCapModels;
use App\Models\SanPhamModels;
use App\Models\ChiTietKhoModels;
use Illuminate\Support\Facades\DB;

class HoaDonNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 5); // Lấy giá trị pageSize từ request, mặc định là 10
        $minDate = $request->input('min_date');
        $maxDate = $request->input('max_date');
        $query = HoaDonNhapModels::query();
        if (($minDate && $maxDate) || $minDate || $maxDate) {
            $query->filterByDate( $minDate, $maxDate);
        }
        $invoice = $query->paginate($pageSize); // Phân trang với kích thước trang là $pageSize
        $pageIndex = $invoice->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $invoice->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $invoice->total(); // Lấy tổng số sản phẩm
        return view('quanTri.HoaDonNhap.index', compact('invoice', 'pageIndex', 'pageSize', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = SanPhamModels::pluck('TenSanPham', 'id');
        $staff = User::pluck('name', 'id');
        $supplier = NhaCungCapModels::pluck('TenNhaCungCap', 'id');
        return view('quanTri.HoaDonNhap.create', compact('product', 'staff', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $invoice = HoaDonNhapModels::create($request->all());
        $invoice->save();

        $specifications = [];
        if ($request->has('MaSanPham')) {
            foreach ($request->input('MaSanPham') as $key => $value) {
                $thongSo = [
                    'MaSanPham' => $request->input('MaSanPham')[$key],
                    'MaHoaDonNhap' => $invoice->id,
                    'SoLuong' => $request->input('SoLuong')[$key],
                    'DonGiaNhap' => $request->input('DonGiaNhap')[$key],
                ];
                $specifications[] = $thongSo;
            }
        }
        ChiTietHoaDonNhapModels::insert($specifications);
        $warehouse = [];
        if ($request->has('MaSanPham')) {
            foreach ($request->input('MaSanPham') as $key => $value) {
                $existingProduct = ChiTietKhoModels::where('MaSanPham', $request->input('MaSanPham')[$key])->first();
                if ($existingProduct) {
                    $existingProduct->SoLuong += $request->input('SoLuong')[$key];
                    $existingProduct->save();
                } else {
                    $thongSo = [
                        'MaKho' => 1,
                        'MaSanPham' => $request->input('MaSanPham')[$key],
                        'SoLuong' => $request->input('SoLuong')[$key],
                    ];
                    $warehouse[] = $thongSo;
                }
            }
        }
        ChiTietKhoModels::insert($warehouse);
        return redirect()->route('HoaDonNhap')->with('success', 'Thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = HoaDonNhapModels::with('sanpham', 'chitiethoadonnhap', 'nhanvien', 'nhacungcap')->findOrFail($id);
        return view('quanTri.HoaDonNhap.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = HoaDonNhapModels::with('chitiethoadonnhap')->findOrFail($id);
        $product = SanPhamModels::pluck('TenSanPham', 'id');
        $staff = User::pluck('name', 'id');
        $supplier = NhaCungCapModels::pluck('TenNhaCungCap', 'id');
        return view('quanTri.HoaDonNhap.edit', compact('invoice', 'product', 'staff', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invoice = HoaDonNhapModels::findOrFail($id);
        $invoice->update($request->all());
        $invoice->save();
        $specifications = [];
        if ($request->has('MaSanPham')) {
            foreach ($request->input('MaSanPham') as $key => $value) {
                $thongSo = [
                    'MaSanPham' => $request->input('MaSanPham')[$key],
                    'MaHoaDonNhap' => $invoice->id,
                    'SoLuong' => $request->input('SoLuong')[$key],
                    'DonGiaNhap' => $request->input('DonGiaNhap')[$key],
                ];
                $specifications[] = $thongSo;
            }
        }
        ChiTietHoaDonNhapModels::where('MaHoaDonNhap', $invoice->id)->delete();
        ChiTietHoaDonNhapModels::insert($specifications);
        return redirect()->route('HoaDonNhap')->with('success', 'Sửa thành công.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoicedetails = ChiTietHoaDonNhapModels::where('MaHoaDonNhap', $id)->get();
        foreach ($invoicedetails as $item) {
            $item->delete();
        }
        $invoice = HoaDonNhapModels::findOrFail($id);
        $invoice->delete();

        return redirect()->route('HoaDonNhap')->with('success', 'Xóa thành công!');

    }
}