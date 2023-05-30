<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TinTucModels;
use App\Models\ChiTiettintucModels;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TinTucController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 5); // Lấy giá trị pageSize từ request, mặc định là 10
        $news = TinTucModels::with('user')->paginate($pageSize); // Phân trang với kích thước trang là $pageSize
        $pageIndex = $news->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $news->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $news->total(); // Lấy tổng số sản phẩm
        $user = User::pluck('name', 'id');

        return view('quanTri.TinTuc.index', compact('news','pageIndex', 'pageSize', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quanTri.TinTuc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
            $news = TinTucModels::create($request->all());
            $news->MaNhanVien = Auth::user()->id;
            if ($request->has('file_uploads')) {
                $file = $request->file_uploads;
                $ext = $request->file_uploads->extension();
                $fileName = 'news' . '-' . date('YmdHis.') . $ext;
                $file->move(public_path('uploads/news/'), $fileName);
                $news->Anh = $fileName;
            }
            $news->save();

            $newsdetail = ChiTiettintucModels::create($request->all());
            $newsdetail->MaTinTuc = $news->id;
            $newsdetail->save();


        
        return redirect()->route('TinTuc')->with('success', 'Thêm thành công.');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = TinTucModels::with('user')->findOrFail($id);
        $newsdetail = ChiTiettintucModels::where('MaTinTuc', $id)->firstOrFail();
        return view('quanTri.TinTuc.show', compact('news', 'newsdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = TinTucModels::findOrFail($id);
        $newsdetail = ChiTiettintucModels::where('MaTinTuc', $id)->firstOrFail();
        return view('quanTri.TinTuc.edit', compact('news', 'newsdetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = TinTucModels::findOrFail($id);
    
        if ($request->has('file_uploads')) {
            $file = $request->file_uploads;
            $ext = $request->file_uploads->extension();
            $fileName = 'news' . '-' . date('YmdHis.') . $ext;
            $file->move(public_path('uploads/news/'), $fileName);
            $news->Anh = $fileName;
        }
        
        $news->update($request->all());

        $newsdetail = ChiTiettintucModels::where('MaTinTuc', $id)->firstOrFail();
        $newsdetail->update($request->all());

    return redirect()->route('TinTuc')->with('success', 'Cập nhật thành công.');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $newsdetails = ChiTiettintucModels::where('MaTinTuc', $id)->get();
        $newsdetails->delete();
        $news = TinTucModels::findOrFail($id);
        $news->delete();

        return redirect()->route('TinTuc')->with('success', 'Xóa thành công!');

    }
}
