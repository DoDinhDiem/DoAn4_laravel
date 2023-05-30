<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonViTinhModels;

class DonViTinhController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 5);
        $unit = DonViTinhModels::paginate($pageSize);
        $pageIndex = $unit->firstItem();
        $pageSize = $unit->lastItem();
        $total = $unit->total();
    
        return view('quanTri.DonViTinh.index', compact('unit', 'pageIndex', 'pageSize', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quanTri.DonViTinh.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $unit = DonViTinhModels::create([
            'TenDonViTinh' => $request->input('TenDonViTinh'),
            'TrangThai' => $request->has('TrangThai')
        ]);
        return redirect()->route('DonViTinh')->with('success', 'Thêm thành công.');
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
        $unit = DonViTinhModels::findOrFail($id);
        return view('quanTri.DonViTinh.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $unit = DonViTinhModels::findOrFail($id);
        $input = $request->all();
        $unit->update($input);

        return redirect()->route('DonViTinh')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = DonViTinhModels::findOrFail($id);
        $unit->delete();
        return redirect()->route('DonViTinh')->with('success', 'Xóa thành công.');
    }
}
