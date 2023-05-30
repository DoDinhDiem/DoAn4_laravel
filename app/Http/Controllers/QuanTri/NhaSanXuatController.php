<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NhaSanXuatModels;

class NhaSanXuatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 5); // Lấy giá trị pageSize từ request, mặc định là 10
        $producer = NhaSanXuatModels::paginate($pageSize); // Phân trang với kích thước trang là $pageSize
    
        $pageIndex = $producer->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $producer->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $producer->total(); // Lấy tổng số sản phẩm
    
        return view('quanTri.NhaSanXuat.index', compact('producer', 'pageIndex', 'pageSize', 'total'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quanTri.NhaSanXuat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producer = NhaSanXuatModels::create($request->all());
        return redirect()->route('NhaSanXuat')->with('success', 'Thêm thành công.');
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
        $producer = NhaSanXuatModels::findOrFail($id);
        return view('quanTri.NhaSanXuat.edit', compact('producer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producer = NhaSanXuatModels::findOrFail($id);
        $input = $request->all();
        $producer->update($input);

        return redirect()->route('NhaSanXuat')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producer = NhaSanXuatModels::findOrFail($id);
        $producer->delete();
        return redirect()->route('NhaSanXuat')->with('success', 'Xóa thành công.');
    }
}
