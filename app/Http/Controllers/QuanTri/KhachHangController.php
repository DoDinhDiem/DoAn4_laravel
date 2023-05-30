<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhachHangModels;

class KhachHangController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 5); // Lấy giá trị pageSize từ request, mặc định là 10
        $name = $request->input('name');
        $query = KhachHangModels::query();
        if ($name) {
            $query->filterByName($name);
        }
        $custumer = $query->paginate($pageSize); // Phân trang với kích thước trang là $pageSize
        $pageIndex = $custumer->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $custumer->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $custumer->total(); // Lấy tổng số sản phẩm
    
        return view('quanTri.KhachHang.index', compact('custumer', 'pageIndex', 'pageSize', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quanTri.KhachHang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        KhachHangModels::create($request->all());
        return redirect()->route('KhachHang')->with('success', 'Thêm thành công.');
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
        $custumer = KhachHangModels::findOrFail($id);
        return view('quanTri.KhachHang.edit', compact('custumer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $custumer = KhachHangModels::findOrFail($id);
        $input = $request->all();
        $custumer->update($input);
        return redirect()->route('KhachHang')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $custumer = KhachHangModels::findOrFail($id);
        $custumer->delete();
        return redirect()->route('KhachHang')->with('success', 'Xóa thành công.');
    }
}
