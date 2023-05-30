<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NhaCungCapModels;

class NhaCungCapController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 5); // Lấy giá trị pageSize từ request, mặc định là 10
        $supplier = NhaCungCapModels::paginate($pageSize); // Phân trang với kích thước trang là $pageSize
        $pageIndex = $supplier->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $supplier->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $supplier->total(); // Lấy tổng số sản phẩm
    
        return view('quanTri.NhaCungCap.index', compact('supplier', 'pageIndex', 'pageSize', 'total'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quanTri.NhaCungCap.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $supplier = NhaCungCapModels::create($request->all());
        return redirect()->route('NhaCungCap')->with('success', 'Thêm thành công.');
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
        $supplier = NhaCungCapModels::findOrFail($id);
        return view('quanTri.NhaCungCap.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supplier = NhaCungCapModels::findOrFail($id);
        $input = $request->all();
        $supplier->update($input);
        return redirect()->route('NhaCungCap')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = NhaCungCapModels::findOrFail($id);
        $supplier->delete();
        return redirect()->route('NhaCungCap')->with('success', 'Xóa thành công.');
    }
}
