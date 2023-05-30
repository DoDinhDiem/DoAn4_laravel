<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHangModels extends Model
{
    use HasFactory;
    protected $table = 'chitietdonhang';
    protected $fillable = [
        'MaDonHang', 
        'MaSanPham', 
        'SoLuong', 
        'GiaMua'
    ];
    public function sanpham()
    {
        return $this->belongsTo(SanPhamModels::class, 'MaSanPham', 'id');
    }
    public function donhang()
    {
        return $this->belongsTo(DonHangModels::class, 'MaDonHang', 'id');
    }
}
