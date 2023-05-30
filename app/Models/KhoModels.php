<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoModels extends Model
{
    use HasFactory;
    protected $table = 'kho';
    protected $fillable = [
        'TenKho', 
        'DiaChi',
    ];
    public function chitietkho()
    {
        return $this->hasMany(ChiTietKhoModels::class, 'MaKho', 'id');
    }
    public function sanpham()
    {
        return $this->hasManyThrough(
            SanPhamModels::class, // Tên lớp mà chúng ta muốn lấy
            ChiTietKhoModels::class,
            // Tên lớp trung gian
            'MaKho',
            // Khóa ngoại của bảng trung gian đến bảng hiện tại
            'id',
            // Khóa chính của bảng hiện tại
            'id',
            // Khóa chính của bảng cần lấy
            'MaSanPham' // Khóa ngoại của bảng hiện tại đến bảng cần lấy
        );
    }
}
