<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonXuatModels extends Model
{
    use HasFactory;
    protected $table = 'chitiethoadonxuat';
    protected $fillable = [
        'MaHoaDonXuat',
        'MaSanPham', 
        'SoLuong', 
        'GiaBan'
    ];
    public function hoadonxuat()
    {
        return $this->belongsTo(HoaDonXuatModels::class, 'MaHoaDonXuat', 'id');
    }
    public function sanpham()
    {
        return $this->belongsTo(SanPhamModels::class, 'MaSanPham', 'id');
    }
}
