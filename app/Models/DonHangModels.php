<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHangModels extends Model
{
    use HasFactory;
    protected $table = 'donhang';
    protected $fillable =[
        'MaKhachHang', 
        'NgayDat', 
        'TrangThaiDonHang',
        'TongTien'
    ];
    public function chitietdonhang()
    {
        return $this->hasMany(ChiTietDonHangModels::class, 'MaDonHang', 'id');
    }
    public function khachhang(){
        return $this->belongsTo(KhachHangModels::class, 'MaKhachHang', 'id');
    }
    public function sanpham()
    {
        return $this->hasManyThrough(
            SanPhamModels::class, // Tên lớp mà chúng ta muốn lấy
            ChiTietDonHangModels::class,
            // Tên lớp trung gian
            'MaDonHang',
            // Khóa ngoại của bảng trung gian đến bảng hiện tại
            'id',
            // Khóa chính của bảng hiện tại
            'id',
            // Khóa chính của bảng cần lấy
            'MaSanPham' // Khóa ngoại của bảng hiện tại đến bảng cần lấy
        );
    }
    public function scopeFilterByDate($query, $minDate, $maxDate)
    {
        if ($minDate && $maxDate) {
            $query->whereBetween('NgayDat', [$minDate, $maxDate]);
        } elseif ($minDate) {
            $query->where('NgayDat', '>=', $minDate);
        } elseif ($maxDate) {
            $query->where('NgayDat', '<=', $maxDate);
        }

        return $query;
    }
}
