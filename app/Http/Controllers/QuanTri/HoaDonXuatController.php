<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoaDonXuatModels;
use App\Models\ChiTietHoaDonXuatModels;
use App\Models\User;
use App\Models\KhachHangModels;
use App\Models\SanPhamModels;
use Illuminate\Support\Facades\DB;

class HoaDonXuatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 5); // Lấy giá trị pageSize từ request, mặc định là 10
        $minDate = $request->input('min_date');
        $maxDate = $request->input('max_date');
        $query = HoaDonXuatModels::query();
        if (($minDate && $maxDate) || $minDate || $maxDate) {
            $query->filterByDate($minDate, $maxDate);
        }
        $invoice = $query->paginate($pageSize); // Phân trang với kích thước trang là $pageSize
        $pageIndex = $invoice->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $invoice->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $invoice->total(); // Lấy tổng số sản phẩm
        return view('quanTri.HoaDonXuat.index', compact('invoice', 'pageIndex', 'pageSize', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = SanPhamModels::pluck('TenSanPham', 'id');
        $staff = User::pluck('name', 'id');
        $custumer = KhachHangModels::pluck('TenKhachHang', 'id');
        return view('quanTri.HoaDonXuat.create', compact('product', 'staff', 'custumer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $invoice = HoaDonXuatModels::create($request->all());
            $invoice->save();

            $specifications = [];
            if ($request->has('MaSanPham')) {
                foreach ($request->input('MaSanPham') as $key => $value) {
                    $thongSo = [
                        'MaSanPham' => $request->input('MaSanPham')[$key],
                        'MaHoaDonXuat' => $invoice->id,
                        'SoLuong' => $request->input('SoLuong')[$key],
                        'GiaBan' => $request->input('GiaBan')[$key],
                    ];
                    $specifications[] = $thongSo;
                }
            }
            ChiTietHoaDonXuatModels::insert($specifications);

            DB::commit();
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, hoàn tác các thay đổi trước đó
            DB::rollback();
            throw $e;
        }

        return redirect()->route('HoaDonXuat')->with('success', 'Thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = HoaDonXuatModels::with('sanpham', 'chitiethoadonXuat', 'nhanvien', 'khachhang')->findOrFail($id);
        return view('quanTri.HoaDonXuat.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = HoaDonXuatModels::with('chitiethoadonXuat')->findOrFail($id);
        $product = SanPhamModels::pluck('TenSanPham', 'id');
        $staff = User::pluck('name', 'id');
        $custumer = KhachHangModels::pluck('TenKhachHang', 'id');
        return view('quanTri.HoaDonXuat.edit', compact('invoice', 'product', 'staff', 'custumer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invoice = HoaDonXuatModels::findOrFail($id);
        DB::beginTransaction();
        try {
            $invoice->update($request->all());
            $invoice->save();

            $specifications = [];
            if ($request->has('MaSanPham')) {
                foreach ($request->input('MaSanPham') as $key => $value) {
                    $thongSo = [
                        'MaHoaDonXuat' => $invoice->id,
                        'MaSanPham' => $request->input('MaSanPham')[$key],
                        'SoLuong' => $request->input('SoLuong')[$key],
                        'GiaBan' => $request->input('GiaBan')[$key],
                    ];
                    $specifications[] = $thongSo;
                }
            }
            ChiTietHoaDonXuatModels::where('MaHoaDonXuat', $invoice->id)->delete();
            ChiTietHoaDonXuatModels::insert($specifications);
            DB::commit();
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, hoàn tác các thay đổi trước đó
            DB::rollback();
            throw $e;
        }
        return redirect()->route('HoaDonXuat')->with('success', 'Sửa thành công.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoicedetails = ChiTietHoaDonXuatModels::where('MaHoaDonXuat', $id)->get();
        foreach ($invoicedetails as $item) {
            $item->delete();
        }
        $invoice = HoaDonXuatModels::findOrFail($id);
        $invoice->delete();

        return redirect()->route('HoaDonXuat')->with('success', 'Xóa thành công!');

    }
}
