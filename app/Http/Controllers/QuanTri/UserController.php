<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 5); // Lấy giá trị pageSize từ request, mặc định là 10
        $name = $request->input('name');
        $query = User::query();
        if ($name) {
            $query->filterByName($name);
        }
        $staff = $query->paginate($pageSize); // Phân trang với kích thước trang là $pageSize
        $pageIndex = $staff->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $staff->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $staff->total(); // Lấy tổng số sản phẩm
        foreach ($staff as $staffs) {

            $staffs->limited_pass = Str::limit($staffs->password, 10, '...');
        }

        return view('quanTri.User.index', compact('staff', 'pageIndex', 'pageSize', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quanTri.User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Email đã tồn tại trong cơ sở dữ liệu
            return redirect()->route('User.create')->with('message', 'Email này đã tồn tại.');
        } else {
            $staff = User::create($request->all());
            $staff->password = bcrypt($request->password);
            if ($request->has('file_uploads')) {
                $file = $request->file_uploads;
                $ext = $request->file_uploads->extension();
                $fileName = 'staff' . '-' . date('YmdHis.') . $ext;
                $file->move(public_path('uploads/staff/'), $fileName);
                $staff->AnhDaiDien = $fileName;
            }
            $staff->save();
            return redirect()->route('User')->with('success', 'Thêm thành công.');
        }

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
        $staff = User::findOrFail($id);
        return view('quanTri.User.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $staff = User::findOrFail($id);
        $staff->name = $request->name;
        $staff->NgaySinh = $request->NgaySinh;
        $staff->GioiTinh = $request->GioiTinh;

        if ($request->has('file_uploads')) {
            $file = $request->file_uploads;
            $ext = $request->file_uploads->extension();
            $fileName = 'staff' . '-' . date('YmdHis.') . $ext;
            $file->move(public_path('uploads/staff/'), $fileName);
            if ($staff->AnhDaiDien) {
                $oldPath = public_path('uploads/staff/') . $staff->AnhDaiDien;
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $staff->AnhDaiDien = $fileName;
        }
        $staff->DiaChi = $request->DiaChi;
        $staff->DienThoai = $request->DienThoai;
        $staff->password = bcrypt($request->password);
        $staff->role = $request->role;
        $staff->TrangThai = $request->TrangThai;
        $staff->save();

        return redirect()->route('User')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $staff = User::findOrFail($id);
    //     $staff->delete();
    //     return redirect()->route('User')->with('success', 'Xóa thành công.');
    // }
}