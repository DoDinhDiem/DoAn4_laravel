<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMaiModels extends Model
{
    use HasFactory;
    protected $table = 'khuyenmai';
    protected $fillable = [
        'TenKhuyenMai',
        'MoTa'
    ];
    public function chitietkhuyenmai()
    {
        return $this->hasMany(ChiTietKhuyenMaiModels::class, 'MaKhuyenMai', 'id');
    }
    public function sanpham()
    {
        return $this->hasManyThrough(
            SanPhamModels::class, // Tên lớp mà chúng ta muốn lấy
            ChiTietKhuyenMaiModels::class,
            // Tên lớp trung gian
            'MaKhuyenMai',
            // Khóa ngoại của bảng trung gian đến bảng hiện tại
            'id',
            // Khóa chính của bảng hiện tại
            'id',
            // Khóa chính của bảng cần lấy
            'MaSanPham' // Khóa ngoại của bảng hiện tại đến bảng cần lấy
        );
    }

}