<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPhamModels;
use App\Models\KhuyenMaiModels;
use App\Models\ChiTietKhuyenMaiModels;
use Illuminate\Support\Facades\DB;

class KhuyenMaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 5); // Lấy giá trị pageSize từ request, mặc định là 10
        $promotions = KhuyenMaiModels::paginate($pageSize); // Phân trang với kích thước trang là $pageSize
        $pageIndex = $promotions->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $promotions->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $promotions->total(); // Lấy tổng số sản phẩm
        return view('quanTri.KhuyenMai.index', compact('promotions', 'pageIndex', 'pageSize', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = SanPhamModels::pluck('TenSanPham', 'id');
        return view('quanTri.KhuyenMai.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $promotions = KhuyenMaiModels::create($request->all());
            $promotions->save();

            $specifications = [];
            if ($request->has('MaSanPham')) {
                foreach ($request->input('MaSanPham') as $key => $value) {
                    $thongSo = [
                        'MaKhuyenMai' => $promotions->id,
                        'MaSanPham' => $request->input('MaSanPham')[$key],
                        'NgayBatDau' => $request->input('NgayBatDau')[$key],
                        'NgayKetThuc' => $request->input('NgayKetThuc')[$key],
                        'TrangThai' => $request->input('TrangThai')[$key],
                    ];
                    $specifications[] = $thongSo;
                }
            }
            ChiTietKhuyenMaiModels::insert($specifications);

            DB::commit();
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, hoàn tác các thay đổi trước đó
            DB::rollback();
            throw $e;
        }

        return redirect()->route('KhuyenMai')->with('success', 'Thêm thành công.');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promotions = KhuyenMaiModels::with('sanpham', 'chitietkhuyenmai')->findOrFail($id);
        return view('quanTri.KhuyenMai.show', compact('promotions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promotions = KhuyenMaiModels::with('chitietkhuyenmai')->findOrFail($id);
        $product = SanPhamModels::pluck('TenSanPham', 'id');
        return view('quanTri.KhuyenMai.edit', compact('promotions', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $promotions = KhuyenMaiModels::findOrFail($id);
        DB::beginTransaction();
        try {
            $promotions->update($request->all());

            $specifications = [];
            if ($request->has('MaSanPham')) {
                foreach ($request->input('MaSanPham') as $key => $value) {
                    $thongSo = [
                        'MaKhuyenMai' => $promotions->id,
                        'MaSanPham' => $request->input('MaSanPham')[$key],
                        'NgayBatDau' => $request->input('NgayBatDau')[$key],
                        'NgayKetThuc' => $request->input('NgayKetThuc')[$key],
                        'TrangThai' => $request->input('TrangThai')[$key],
                    ];
                    $specifications[] = $thongSo;
                }
            }
            ChiTietKhuyenMaiModels::where('MaKhuyenMai', $promotions->id)->delete();
            ChiTietKhuyenMaiModels::insert($specifications);
            DB::commit();
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, hoàn tác các thay đổi trước đó
            DB::rollback();
            throw $e;
        }
        return redirect()->route('KhuyenMai')->with('success', 'Sửa thành công.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotionsdetails = ChiTietKhuyenMaiModels::where('MaKhuyenMai', $id)->get();
        foreach ($promotionsdetails as $item) {
            $item->delete();
        }
        $promotions = KhuyenMaiModels::findOrFail($id);
        $promotions->delete();

        return redirect()->route('KhuyenMai')->with('success', 'Xóa thành công!');

    }
}
