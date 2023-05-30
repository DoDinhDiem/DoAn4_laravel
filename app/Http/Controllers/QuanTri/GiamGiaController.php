<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use App\Models\SanPhamModels;
use Illuminate\Http\Request;
use App\Models\GiamGiaModels;

class GiamGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 5); // Lấy giá trị pageSize từ request, mặc định là 10
        $discount = GiamGiaModels::with('sanphams')->paginate($pageSize); // Phân trang với kích thước trang là $pageSize
        $pageIndex = $discount->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $discount->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $discount->total(); // Lấy tổng số sản phẩm
    
        return view('quanTri.GiamGia.index', compact('discount', 'pageIndex', 'pageSize', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = SanPhamModels::pluck('TenSanPham', 'id');
        return view('quanTri.GiamGia.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        GiamGiaModels::create($request->all());
        return redirect()->route('GiamGia')->with('success', 'Thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = SanPhamModels::pluck('TenSanPham', 'id');
        $discount = GiamGiaModels::findOrFail($id);
        return view('quanTri.GiamGia.edit', compact('discount', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $discount = GiamGiaModels::findOrFail($id);
        $input = $request->all();
        $discount->update($input);
        return redirect()->route('GiamGia')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $discount = GiamGiaModels::findOrFail($id);
        $discount->delete();
        return redirect()->route('GiamGia')->with('success', 'Loại sản phẩm đã được xóa thành công.');
    }
}
