<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SlideModels;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 5); // Lấy giá trị pageSize từ request, mặc định là 10
        $slide = SlideModels::paginate($pageSize); // Phân trang với kích thước trang là $pageSize
        $pageIndex = $slide->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $slide->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $slide->total(); // Lấy tổng số sản phẩm

        return view('quanTri.Slide.index', compact('slide', 'pageIndex', 'pageSize', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quanTri.Slide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slide = SlideModels::create($request->all());
        if ($request->has('file_uploads')) {
            $file = $request->file_uploads;
            $ext = $request->file_uploads->extension();
            $fileName = 'slide' . '-' . date('YmdHis.') . $ext;
            $file->move(public_path('uploads/slide/'), $fileName);
            $slide->Anh = $fileName;
        }
        $slide->save();
        return redirect()->route('Slide')->with('success', 'Thêm thành công.');
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
        $slide = SlideModels::findOrFail($id);
        return view('quanTri.Slide.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slide = SlideModels::findOrFail($id);

        if ($request->has('file_uploads')) {
            $file = $request->file_uploads;
            $ext = $request->file_uploads->extension();
            $fileName = 'slide' . '-' . date('YmdHis.') . $ext;
            $file->move(public_path('uploads/slide/'), $fileName);
            if ($slide->Anh) {
                $oldPath = public_path('uploads/slide/') . $slide->Anh;
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $slide->Anh = $fileName;
        }
        $slide->update($request->all());

        return redirect()->route('Slide')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slide = SlideModels::findOrFail($id);
        $slide->delete();
        return redirect()->route('Slide')->with('success', 'Xóa thành công.');
    }
}