<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginAuthController extends Controller
{
    public function login()
    {
        return view('Login');
    }
    public function loginstore(Request $request)
    {
   
        if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]))
        {
            return redirect()->route('AdminHome')->with('message', 'Chào Admin');
        } 
        else {
            return redirect()->route('login')->with('message', 'Tài Khoản hoặc mật khẩu không chính xác');
        }
    }

    public function register()
    {
        return view('Signup');
    }
    public function registerstore(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Email đã tồn tại trong cơ sở dữ liệu
            return redirect()->route('Register')->with('message', 'Email này đã tồn tại.');
        } else {
            // dd($power);
            // Tạo người dùng mới
            $newUser = new User;
            $newUser->name = $request->name;
            $newUser->NgaySinh = $request->NgaySinh;
            $newUser->GioiTinh = $request->GioiTinh;
            $newUser->DiaChi = $request->DiaChi;
            $newUser->DienThoai = $request->DienThoai;
            if ($request->has('file_uploads')) {
                $file = $request->file_uploads;
                $ext = $request->file_uploads->extension();
                $fileName = 'staff' . '-' . date('YmdHis.') . $ext;
                $file->move(public_path('uploads/staff/'), $fileName);
                $newUser->AnhDaiDien = $fileName;
            }
            $newUser->role = 0;
            $newUser->TrangThai = 1;
            $newUser->email = $request->email;
            $newUser->password = bcrypt($request->password);

         
            $newUser->save();

            // dd($newUser);
            // Thông báo tạo người dùng thành công hoặc thực hiện các tác vụ khác
            return redirect()->route('Register')->with('message', 'Người dùng đã được tạo thành công.');
        }
    }
    public function logout()
    {
        if (Auth::logout()) {
            return view('Logout');
        } else {
            return view('Logout');
        }
    }
   
}
