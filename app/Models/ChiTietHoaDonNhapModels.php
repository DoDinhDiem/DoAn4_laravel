<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonNhapModels extends Model
{
    use HasFactory;
    protected $table = 'chitiethoadonnhap';
    protected $fillable = [
        'MaSanPham', 
        'MaHoaDonNhap',
        'SoLuong', 
        'DonGiaNhap'
    ];
    public function hoadonnhap()
    {
        return $this->belongsTo(HoaDonNhapModels::class, 'MaHoaDonNhap', 'id');
    }
    public function sanpham()
    {
        return $this->belongsTo(SanPhamModels::class, 'MaSanPham', 'id');
    }
}
