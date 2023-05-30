<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiSPModels;

class LoaiSPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 5); // Lấy giá trị pageSize từ request, mặc định là 10
        $category = LoaiSPModels::paginate($pageSize); // Phân trang với kích thước trang là $pageSize
    
        $pageIndex = $category->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $category->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $category->total(); // Lấy tổng số sản phẩm
    
        return view('quanTri.LoaiSP.index', compact('category', 'pageIndex', 'pageSize', 'total'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quanTri.LoaiSP.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $loaiSanPham = LoaiSPModels::create([
            'TenLoai' => $request->input('TenLoai'),
            'TrangThai' => $request->has('TrangThai')
        ]);
        return redirect()->route('LoaiSP')->with('success', 'Thêm thành công.');
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
        $category = LoaiSPModels::findOrFail($id);
        return view('quanTri.LoaiSP.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = LoaiSPModels::findOrFail($id);
        $input = $request->all();
        $category->update($input);
        return redirect()->route('LoaiSP')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = LoaiSPModels::findOrFail($id);
        $category->delete();
        return redirect()->route('LoaiSP')->with('success', 'Loại sản phẩm đã được xóa thành công.');
    }

}
