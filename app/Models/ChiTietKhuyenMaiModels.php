<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietKhuyenMaiModels extends Model
{
    use HasFactory;
    protected $table = 'chitietkhuyenmai';
    protected $fillable = [
        'MaSanPham', 
        'NgayBatDau', 
        'NgayKetThuc', 
        'TrangThai'
    ];
    public function khuyenmai()
    {
        return $this->belongsTo(KhuyenMaiModels::class, 'MaKhuyenMai', 'id');
    }
    public function sanpham()
    {
        return $this->belongsTo(SanPhamModels::class, 'MaSanPham', 'id');
    }
}
