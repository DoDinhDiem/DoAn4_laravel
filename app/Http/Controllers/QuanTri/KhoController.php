<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhoModels;
use App\Models\ChiTietKhoModels;
use App\Models\SanPhamModels;
use Illuminate\Support\Facades\DB;

class KhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 5); // Lấy giá trị pageSize từ request, mặc định là 10
        $warehouse = KhoModels::paginate($pageSize); // Phân trang với kích thước trang là $pageSize
        $pageIndex = $warehouse->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $warehouse->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $warehouse->total(); // Lấy tổng số sản phẩm
        return view('quanTri.Kho.index', compact('warehouse', 'pageIndex', 'pageSize', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = SanPhamModels::pluck('TenSanPham', 'id');
        return view('quanTri.Kho.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $warehouse = KhoModels::create($request->all());
            $warehouse->save();

            $specifications = [];
            if ($request->has('MaSanPham')) {
                foreach ($request->input('MaSanPham') as $key => $value) {
                    $thongSo = [
                        'MaKho' => $warehouse->id,
                        'MaSanPham' => $request->input('MaSanPham')[$key],
                        'SoLuong' => $request->input('SoLuong')[$key],
                    ];
                    $specifications[] = $thongSo;
                }
            }
            ChiTietKhoModels::insert($specifications);

            DB::commit();
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, hoàn tác các thay đổi trước đó
            DB::rollback();
            throw $e;
        }

        return redirect()->route('Kho')->with('success', 'Thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $warehouse = KhoModels::with('sanpham', 'chitietkho')->findOrFail($id);
        return view('quanTri.Kho.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $warehouse = KhoModels::with('chitietKho')->findOrFail($id);
        $product = SanPhamModels::pluck('TenSanPham', 'id');
        return view('quanTri.Kho.edit', compact('warehouse', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $warehouse = KhoModels::findOrFail($id);
        DB::beginTransaction();
        try {
            $warehouse->update($request->all());
            $warehouse->save();

            $specifications = [];
            if ($request->has('MaSanPham')) {
                foreach ($request->input('MaSanPham') as $key => $value) {
                    $thongSo = [
                        'MaKho' => $warehouse->id,
                        'MaSanPham' => $request->input('MaSanPham')[$key],
                        'SoLuong' => $request->input('SoLuong')[$key],
                    ];
                    $specifications[] = $thongSo;
                }
            }
            ChiTietKhoModels::where('MaKho', $warehouse->id)->delete();
            ChiTietKhoModels::insert($specifications);
            DB::commit();
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, hoàn tác các thay đổi trước đó
            DB::rollback();
            throw $e;
        }
        return redirect()->route('Kho')->with('success', 'Sửa thành công.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warehousedetails = ChiTietKhoModels::where('MaKho', $id)->get();
        foreach ($warehousedetails as $item) {
            $item->delete();
        }
        $warehouse = KhoModels::findOrFail($id);
        $warehouse->delete();

        return redirect()->route('Kho')->with('success', 'Xóa thành công!');

    }
}
